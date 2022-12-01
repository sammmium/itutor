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
				cn.parent_name as parent_name,
				sc.subject_date as subject_date,
				sc.subject_time as subject_time,
				sc.is_done as is_done,
				sc.work_description as work_description,
				sc.subject_note as subject_note
			from " . $this->table . " as sc
			left join contacts as cn on sc.contact_id = cn.id
			where " . $this->getPreparedConditions($filter) . " 
			order by sc.subject_time asc;";

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

		return $result;
	}

	public function createLesson(array $data): int
	{
		$columns = [];
		$values = [];
		foreach ($data as $key => $value) {
			if ($this->isAvailableColumn($key)) {
				$columns[] = $key;
				$values[] = ($key == 'subject_date') ? $this->getTransformedDate($value) : $value;
			}
		}
		$columns[] = 'is_done';
		$values[] = 0;
		$query = "insert into " . $this->table . "(" . implode(', ', $columns) . ")  values('" . implode("', '", $values) . "');";
		return $this->set($query);
	}

	public function update(array $data): void
	{
		$values = [];
		$id = $data['id'];
		unset($data['id']);
		foreach ($data as $key => $value) {
			if ($this->isAvailableColumn($key)) {
				$values[] = "$key = '" . $value . "'";
			}
		}
		$query = "update " . $this->table . " set " . implode(', ', $values) . " where id = '$id';";
		$this->upd($query);
	}

	public function delete(array $data): void
	{
		$query = "delete from " . $this->table . " where id = '" . $data['id'] . "';";
		$this->del($query);
	}
}
