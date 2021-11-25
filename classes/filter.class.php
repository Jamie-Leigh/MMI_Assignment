<?php
class Filter {
	protected $Conn;
	public function __construct($Conn) {
		$this->Conn = $Conn;
	}

	public function generateParams($filters){
        if($filters['filter']) {
          if($filters['min_price']) {
            $params['price']['min_price'] = $filters['min_price'];
          }
          if($filters['max_price']) {
            $params['price']['max_price'] = $filters['max_price'];
          }
          if($filters['min_mileage']) {
            $params['mileage']['min_mileage'] = $filters['min_mileage'];
          }
          if($filters['max_mileage']) {
            $params['mileage']['max_mileage'] = $filters['max_mileage'];
          }
          if($filters['fuel_type']) {
            $params['fuel_type'] = $filters['fuel_type'];
          }
          if($filters['transmission_type']) {
            $params['transmission_type'] = $filters['transmission_type'];
          }
        }
          return $params;
	}
}