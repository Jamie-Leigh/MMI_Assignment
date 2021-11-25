<?php
class Filter {
	protected $Conn;
	public function __construct($Conn) {
		$this->Conn = $Conn;
	}

	public function generateParams($filters){
        $params = '';
        if($filters['filter']) {
          if($filters['min-price']) {
            $params .= "&min-price=".$filters['min-price'];
          }
          if($filters['max-price']) {
            $params .= "&max-price=".$filters['max-price'];
          }
          if($filters['min-mileage']) {
            $params .= "&min-mileage=".$filters['min-mileage'];
          }
          if($filters['max-mileage']) {
            $params .= "&max-mileage=".$filters['max-mileage'];
          }
          if($filters['fuel-type']) {
            $params .= "&fuel-type=".$filters['fuel-type'];
          }
          if($filters['trans-type']) {
            $params .= "&trans-type=".$filters['trans-type'];
          }
        }
          return $params;
	}
}