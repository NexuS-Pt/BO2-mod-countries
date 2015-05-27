<?php

class country {

	protected $id;
	protected $iso2;
	protected $iso3;
	protected $short_name;
	protected $long_name;
	protected $numcode;
	protected $un_member;
	protected $calling_code;
	protected $cctld;
	protected $email;
	protected $status;

	public function __construct() {}

	public function setId($i) {
		$this->id = $i;
	}

	public function setIso2($i) {
		$this->iso2 = $i;
	}

	public function setIso3($i) {
		$this->iso3 = $i;
	}

	public function setShortName($s) {
		$this->short_name = $s;
	}

	public function setLongName($l) {
		$this->long_name = $l;
	}

	public function setNumCode($n) {
		$this->numcode = $n;
	}

	public function setUnMember($u) {
		$this->un_member = $u;
	}

	public function setCallingCode($n) {
		$this->calling_code = $c;
	}

	public function setCctld($c) {
		$this->cctld = $c;
	}

	public function setEmail($e) {
		$this->email = $e;
	}

	public function setStatus($s) {
		$this->status = (bool)$s;
	}

	public function insert() {
		global $configuration, $mysqli;

		$query = sprintf(
			"INSERT INTO %s_countries (iso2, iso3, short_name, long_name, numcode, un_member, calling_code, cctld, email, status) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			$configuration['mysql-prefix'],
			$this->iso2,
			$this->iso3,
			$this->short_name,
			$this->long_name,
			$this->numcode,
			$this->un_member,
			$this->calling_code,
			$this->cctld,
			$this->email,
			$this->status
		);

		$toReturn = $mysqli->query($query);

		$this->id = $mysqli->insert_id;

		return $toReturn;
	}

	public function update() {
		global $configuration, $mysqli;

		print $query = sprintf(
			"UPDATE %s_countries SET iso2 = '%s', iso3 = '%s', short_name = '%s', long_name = '%s', numcode = '%s', un_member = '%s', calling_code = '%s', cctld = '%s', email = '%s', status = '%s' WHERE id = '%s'",
				$configuration['mysql-prefix'], $this->iso2, $this->iso3, $this->short_name, $this->long_name, $this->numcode, $this->un_member, $this->calling_mode, $this->cctld, $this->email, $this->status, $this->id
		);

		return $mysqli->query($query);
	}

	public function delete() {
		global $configuration, $mysqli;

		$query = sprintf(
			"DELETE FROM %s_countries WHERE id = '%s'",
			$configuration['mysql-prefix'], $this->id
		);

		return $mysqli->query($query);
	}

	public function returnObject() {
		return [
			"iso2" => $this->iso2,
			"iso3" => $this->iso3,
			"short_name" => $this->short_name,
			"long_name" => $this->long_name,
			"numcode" => $this->numcode,
			"un_member" => $this->un_member,
			"calling_code" => $this->calling_code,
			"cctld" => $this->cctld,
			"email" => $this->email,
			"status" => $this->status
		];
	}

	public function returnOneCountry() {
		global $configuration, $mysqli;

		$query = sprintf(
			"SELECT * FROM %s_countries WHERE id = '%s' LIMIT 1",
			$configuration['mysql-prefix'], $this->id
		);
		$source = $mysqli->query($query);

		return $source->fetch_assoc();
	}

	public function existCountryByName() {
		global $configuration, $mysqli;

		$query = sprintf(
			"SELECT * FROM %s_countries WHERE short_name = '%s' LIMIT 1",
			$configuration['mysql-prefix'], $this->username
		);
		$source = $mysqli->query($query);

		return $source->num_rows;
	}

	public function returnAllCountries() {
		global $configuration, $mysqli;

		$query = sprintf(
			"SELECT * FROM %s_countries WHERE true",
			$configuration['mysql-prefix']
		);
		$source = $mysqli->query($query);

		$toReturn = [];
		$i = 0;

		while ($data = $source->fetch_assoc()) {
			$toReturn[$i] = $data;
			$i++;
		}

		return $toReturn;
	}
}
