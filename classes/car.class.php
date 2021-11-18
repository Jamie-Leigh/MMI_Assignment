<?php
class Car {
    protected $Conn;
    public function __construct($Conn){
        $this->Conn = $Conn;
    }
    public function getAllActiveCars(){
        $query = "SELECT * FROM cars WHERE active = 1";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllFilteredActiveCars($car_filters) {
        $query = "SELECT * FROM cars WHERE active = 1";
        $data = [];
        if ($car_filters->mileage->max_mileage) {
            $query .= " AND mileage <= :max_mileage";
            $data['max_mileage'] = $car_filters->mileage->max_mileage;
        }
        if ($car_filters->mileage->min_mileage) {
            $query .= " AND mileage >= :min_mileage";
            $data['min_mileage'] = $car_filters->mileage->min_mileage;
        }
        if ($car_filters->price->max_price) {
            $query .= " AND cost_per_day <= :max_price";
            $data['max_price'] = $car_filters->price->max_price;
        }
        if ($car_filters->price->min_price) {
            $query .= " AND cost_per_day >= :min_price";
            $data['min_price'] = $car_filters->price->min_price;
        }
        if ($car_filters->fuel_type) {
            $query .= " AND fuel_type = :fuel_type";
            $data['fuel_type'] = $car_filters->fuel_type;
        }
        if ($car_filters->transmission_type) {
            $query .= " AND transmission_type = :transmission_type";
            $data['transmission_type'] = $car_filters->transmission_type;
        }
        $query .= ";";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute($data);
        $car_data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $car_data;
    }

    public function searchCars($query_string) {
        $query = "SELECT * FROM cars WHERE active = 1 AND make LIKE :query_string;";
        $stmt = $this->Conn->prepare($query);
        $data = [
            // "query_string" => "%".$query_string."%",
            "query_string" => "%".$query_string."%"
        ];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}