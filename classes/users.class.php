<?php

class Users extends Dbh {
	protected function getUser($email) {
		$sql = "SELECT * FROM users WHERE email = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);

		$results = $stmt->fetchAll();
		return $results;
	}

	protected function setUser($first_name, $last_name, $email, $hashedPwd) {
		$sql = "INSERT INTO users(first_name, last_name, email, pwd) VALUES(?, ?, ?, ?,)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$first_name, $last_name, $email, $hashedPwd]);

	}



}
