<?php

namespace src\Controllers;

use src\models\Contacts;
use src\models\Schedules;

require_once 'MainController.php';
include __DIR__ . '/../models/Schedules.php';

class SchedulesController extends MainController
{
	protected array $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function index(): array
	{
		$content = [];
		$content['selected_contact'] = null;
		$content['selected_date'] = date('d.m.Y');

		$filter = [
			'contact_id' => $content['selected_contact'],
			'subject_date' => $content['selected_date']
		];

		$model = new Schedules();
		$content += $model->getData($filter);

		$model = new Contacts();
		$content['contact_list'] = $model->getContactList();

//		var_dump($content['contact_list']);exit;

		return $this->getContent($content);
	}

	public function select_date(): array
	{
		$content = [];
		$content['selected_date'] = $_POST['datepicker_value'];

		$filter = [
			'contact_id' => $content['selected_contact'],
			'subject_date' => $content['selected_date']
		];

		$model = new Schedules();
		$content += $model->getData($filter);

		$model = new Contacts();
		$content['contact_list'] = $model->getContactList();

		return $this->getContent($content);
	}
}
