<?php

class ItemsView extends Items {
	
	public function displayItems($company_id) {
		$results = $this->getItems($company_id);
	return $results;
	}
	public function showServiceCheckinData($company_id) {
		$results = $this->getServiceCheckinData($company_id);
	return $results; 
	}
	}
		