<?php

namespace src\models;

require_once 'Base.php';

class Memo extends Base
{
	private string $table = 'memo';

	protected array $availableColumns = [
		'memo_key',
		'memo_value'
	];
}
