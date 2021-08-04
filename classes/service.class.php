<?php
class Service extends Dbh {
		protected function getService($comp, $loc) {
		$sql = "SELECT * FROM services WHERE comp_name = ? AND imm_loc = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$comp, $loc]);
		
		$results = $stmt->fetchAll();
		return $results;}	
			
		protected function getServiceCheckinData($company_id) {
		$sql = "SELECT * FROM services WHERE company_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$company_id]);
		
		$results = $stmt->fetchAll();
		return $results;	
	}
		protected function setService($comp, $loc, $service, $email, $pwd) {
		$sql = "INSERT INTO services(comp_name, imm_loc, service, email, pwd) VALUES(?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$comp, $loc, $service, $email, $pwd]);
		
	}
}