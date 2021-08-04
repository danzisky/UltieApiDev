<?php

class ItemsContr extends Items {
	public function createItem($company_id, $item_name, $item_price, $item_availability) {
		$this->setItem($company_id, $item_name, $item_price, $item_availability); 
	} 
	
	
}