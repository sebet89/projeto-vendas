<?php
require_once __DIR__ . "/../models/ProductType.php";

class ProductTypeController {
    public function index($connection) {
        return ProductType::all($connection);
    }

    public function store($connection, $type_name, $tax_percentage) {
        return ProductType::create($connection, $type_name, $tax_percentage);
    }
}
