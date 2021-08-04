<?php
class Signup {
	protected $first; 
	protected $last;
	protected $mid;
	protected $dob;
	protected $email;
	protected $pwd;

	public function __construct(string $first, string $last, string $mid, date $dob, string $email, string $pwd) {
		$this->$first = $first;
		$this->$last = $last;
		$this->$mid = $mid;
		$this->$dob = $dob;
		$this->$email = $email;
		$this->$pwd = $pwd;
	}
	
	
}