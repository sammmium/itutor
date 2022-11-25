<?php

namespace src\models;

class Base
{
	protected $mysqli = null;

	protected array $availableColumns = [];

	public function connect(): void
	{
		$config = require __DIR__ . '/../config.php';
		$this->mysqli = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['name']);
		$this->execute("SET NAMES utf8");
	}

	public function disconnect(): void
	{
		$this->mysqli = null;
	}

	protected function get(string $query): array
	{
		$this->connect();
		$result = [];
		$queryResult = $this->execute($query);
		while ($row = mysqli_fetch_assoc($queryResult)) {
			$result[] = $row;
		}
		$this->disconnect();
		return $result;
	}

	protected function set(string $query): int
	{
		$this->connect();
		$this->execute($query);
		$last_insert_id = mysqli_insert_id($this->mysqli);
		$this->disconnect();
		return $last_insert_id;
	}

	protected function upd(string $query): void
	{
		$this->connect();
		$this->execute($query);
		$this->disconnect();
	}

	protected function delete(string $query): void
	{
		$this->connect();
		$this->execute($query);
		$this->disconnect();
	}

	protected function isAvailableColumn(string $column): bool
	{
		foreach ($this->availableColumns as $item) {
			if ($item === $column) {
				return true;
			}
		}
		return false;
	}

	protected function execute(string $query)
	{
		return mysqli_query($this->mysqli, $query);
	}

	protected function getTransformedDate(string $date, string $toLocale = 'en'): string
	{
		if (strpos($date, '.') !== false) {
			if ($toLocale == 'en') {
				list($d, $m, $y) = explode('.', $date);
				return $y . '-' . $m . '-' . $d;
			}
			return $date;
		}

		if ($toLocale == 'ru') {
			list($y, $m, $d) = explode('-', $date);
			return $d . '.' . $m . '.' . $y;
		}

		return $date;
	}

	protected function getPreparedConditions(array $filter = []): string
	{
		$result = '';
		$conditions = [];

		if (count($filter)) {
			foreach ($filter as $key => $value) {
				if (!is_null($value)) {
					$value = (strpos($key, 'date') !== false) ? $this->getTransformedDate($value) : $value;

					if (is_array($value)) {
						$conditions[] = $key . " in ('" . implode("', '", $value) ."')";
					} else {
						$conditions[] = $key . " = '" . $value ."'";
					}
				}
			}
		}

		if (count($conditions)) {
			$result = implode(' and ', $conditions);
		}

		return $result;
	}
}


