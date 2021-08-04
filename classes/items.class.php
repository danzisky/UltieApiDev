<?php

class Items extends Dbh {
	protected function getItems($company_id) {
		$sql = "SELECT * FROM items WHERE company_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($company_id);
		
		$results = $stmt->fetchAll();
		return $results;	
	}
	
		protected function setItem($company_id, $item_name, $item_price, $item_availability) {
		$sql = "INSERT INTO items(company_id, item_name, item_price, availability) VALUES(?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute($company_id, $item_name, $item_price, $item_availability]);
		
	}
	
		protected function updateItem($company_id, $item_name, $item_price, $item_availability) {
		$sql = "UPDATE items SET name = ? WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute('$value', $key);
		
	}


	
	
}