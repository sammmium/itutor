<?php

namespace src\models;

require_once 'Base.php';

class Balances extends Base
{
	private string $table = 'balances';

	protected array $availableColumns = [
		'current_value',
		'currency_id',
		'contact_id'
	];

	/**
	 * @param array $data
	 * @return int
	 */
	public function store(array $data): int
	{
		$columns = [];
		$values = [];
		foreach ($data as $key => $value) {
			if ($this->isAvailableColumn($key)) {
				$columns[] = $key;
				$values[] = ($key === 'current_value') ? ($value * 100) : $value;
			}
		}
		$query = "insert into " . $this->table . "(" . implode(', ', $columns) . ")  values('" . implode("', '", $values) . "');";
		return $this->set($query);
	}

	/**
	 * @param array $data
	 * @return void
	 */
	public function update(array $data): void
	{
		$values = [];
		$contact_id = $data['contact_id'];
		unset($data['contact_id']);
		foreach ($data as $key => $value) {
			if ($this->isAvailableColumn($key)) {
				$values[] = ($key === 'current_value')
					? "$key = '" . ($value * 100) . "'"
					: "$key = '" . $value . "'";
			}
		}
		$query = "update " . $this->table . " set " . implode(', ', $values) . " where contact_id = '$contact_id';";
		$this->upd($query);
	}
}
