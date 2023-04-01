<?php
class Product {
    public static function create($connection, $product_name, $product_type_id, $product_price) {
        $query = "INSERT INTO products (product_name, product_type_id, product_price) VALUES ($1, $2, $3)";
        $result = pg_query_params($connection, $query, array($product_name, $product_type_id, $product_price));

        if ($result) {
            return array("status" => "success", "message" => "Produto adicionado com sucesso!");
        } else {
            return array("status" => "error", "message" => "Erro ao adicionar o produto!");
        }
    }

    public static function all($connection) {
        $query = "SELECT p.*, pt.type_name as product_type_name, pt.tax_percentage as tax FROM products p INNER JOIN product_types pt ON pt.id = p.product_type_id";
        $result = pg_query($connection, $query);

        $products = array();
        while ($row = pg_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    }
}
