<?php

class ServiceView extends Service {
	
	public function showService($comp, $loc) {
		$results = $this->getService($comp, $loc);
	return $results;
	}
	public function showServiceCheckinData($company_id) {
		$results = $this->getServiceCheckinData($company_id);
	return $results; 
	}
	}
		