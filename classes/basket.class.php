<?php
class Basket {
	protected $Conn;
	public function __construct($Conn) {
		$this->Conn = $Conn;
	}

	public function isInBasket($car_id) {
		$query = "SELECT * FROM car_basket WHERE user_id = :user_id AND car_id = :car_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id'],
			"car_id" => $car_id
		]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function toggleInBasket($car_id){
		$isInBasket = $this->isInBasket($car_id);
		if($isInBasket) {
			// Is already in basket - so remove.
			$query = "DELETE FROM car_basket WHERE basket_id = :basket_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute([
				"basket_id" => $isInBasket['basket_id']
			]);
			return false; // Return false for "removed"

		} else {
			// Is not in basket - so add
			$query = "INSERT INTO car_basket (user_id, car_id) VALUES (:user_id, :car_id)";
			$stmt = $this->Conn->prepare($query);
			
			return $stmt->execute(array(
				"user_id" => $_SESSION['user_data']['user_id'],
				"car_id" => $car_id
			));
			return true; // Return false for "added"
		}
	}
	public function getBasketForUser(){
		$query = "SELECT * FROM car_basket LEFT JOIN cars ON car_basket.car_id = cars.car_id WHERE car_basket.user_id = :user_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id']
		]);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	private function clearBasket(){
		$query = "DELETE FROM car_basket WHERE user_id = :user_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id']
		]);
		return true;
	}

	private function removeCarsFromStock(){
		$carsInBasket = $this->getBasketForUser();
		// take cars out of stock
		$carsToSell = 0;
		$data = [];
		$query = "UPDATE cars SET active = 0 WHERE";
		foreach($carsInBasket as $index => $car) {
			if ($index == 0) {
			$query .= " car_id = :car_id".$index."";
			} else {
				$query .= " OR car_id = :car_id".$index."";
			}
			$data['car_id'.$index.''] = $car['car_id'];
		}
		$query .=';';
		$stmt = $this->Conn->prepare($query);


		$stmt->execute($data);
		return true;
	}

	public function checkoutForUser(){
		//get cars in basket
		$stockRemoved = $this->removeCarsFromStock();
		//empty basket
		$basketCleared = $this->clearBasket();
	}

}
