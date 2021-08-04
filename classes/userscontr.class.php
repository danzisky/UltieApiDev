<?php

class UsersContr extends Users {
	public function createUser($first_name, $last_name, $email, $hashedPwd) {
		$this->setUser($first_name, $last_name, $email, $hashedPwd);
	}
}
