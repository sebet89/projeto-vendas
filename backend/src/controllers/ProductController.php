<?php
require_once __DIR__ . "/../models/Product.php";

class ProductController {
    public function index($connection) {
        return Product::all($connection);
    }

    public function store($connection, $product_name, $product_type_id, $product_price) {
        return Product::create($connection, $product_name, $product_type_id, $product_price);
    }
}
