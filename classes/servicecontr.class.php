<?php

class ServiceContr extends Service {
	public function createService($comp, $loc, $service, $email, $pwd) {
		$this->setService($comp, $loc, $service, $email, $pwd); 
	} 
	
	
}