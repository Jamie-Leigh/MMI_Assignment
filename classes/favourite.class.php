<?php
class Favourite {
	protected $Conn;
	public function __construct($Conn) {
		$this->Conn = $Conn;
	}

	public function isFavourite($car_id){
		$query = "SELECT * FROM car_favourites WHERE user_id = :user_id AND car_id = :car_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id'],
			"car_id" => $car_id
		]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function toggleFavourite($car_id){
		$is_favourite = $this->isFavourite($car_id);
		
		if($is_favourite) {
		// Is already favourite - so remove.
		$query = "DELETE FROM car_favourites WHERE favourite_id = :favourite_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"favourite_id" => $is_favourite['favourite_id']
		]);
		return false; // Return false for "removed"

		} else {
		// Is not favourite - so add
		$query = "INSERT INTO car_favourites (user_id, car_id) VALUES (:user_id, :car_id)";
		$stmt = $this->Conn->prepare($query);
		
		return $stmt->execute(array(
			"user_id" => $_SESSION['user_data']['user_id'],
			"car_id" => $car_id
		));
		return true; // Return false for "added"
		}
	}
	public function getAllFavouritesForUser(){
		$query = "SELECT * FROM car_favourites LEFT JOIN cars ON car_favourites.car_id = cars.car_id WHERE car_favourites.user_id = :user_id";
		$stmt = $this->Conn->prepare($query);
		$stmt->execute([
			"user_id" => $_SESSION['user_data']['user_id']
		]);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
}