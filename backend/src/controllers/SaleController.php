<?php
require_once __DIR__ . "/../models/Sale.php";

class SaleController {
    public function index($connection) {
        return Sale::all($connection);
    }

    public function store($connection, $sale_items) {
        return Sale::create($connection, $sale_items);
    }
}
