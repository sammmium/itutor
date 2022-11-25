<?php

namespace src\models;

require_once 'Base.php';
include __DIR__ .'/../models/Contacts.php';

class Schedules extends Base
{
	private string $table = 'subjects';

	protected array $availableColumns = [
		'contact_id',
		'subject_date',
		'subject_time',
		'is_done',
		'work_description',
		'subject_note'
	];

	public function getData(array $filter): array
	{
		$result = [];
		$result['events'] = [];

		// подготовка списка занятий на выбранную дату
		$query = "select
				sc.id as schedule_id,
				sc.contact_id as contact_id,
				cn.pupil as pupil,
				sc.subject_date as subject_date,
				sc.subject_time as subject_time,
				sc.is_done as is_done,
				sc.work_description as work_description,
				sc.subject_note as subject_note
			from " . $this->table . " as sc
			left join contacts as cn on sc.contact_id = cn.id
			where " . $this->getPreparedConditions($filter);

		$events = $this->get($query);

		$result['contacts'] = [];

		if (count($events)) {
			$result['events'] = $events;

			$contactIdList = [];
			foreach ($events as $event) {
				$contactIdList[] = $event['contact_id'];
			}

			if (count($contactIdList)) {
				// подготовка списка клиентов, занятия с которыми запланированы на выбранную дату
				$contactModel = new Contacts();
				$result['contacts'] = $contactModel->getContactList(['contact_id' => $contactIdList]);
			}
		}

//		var_dump($result);exit;

		return $result;
	}
}
