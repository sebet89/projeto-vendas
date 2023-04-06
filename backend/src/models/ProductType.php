<?php
class ProductType {
    public static function create($connection, $type_name, $tax_percentage) {
        $query = "INSERT INTO product_types (type_name, tax_percentage) VALUES ($1, $2) RETURNING id";
        $result = pg_query_params($connection, $query, array($type_name, $tax_percentage));

        if ($result) {
            $id = pg_fetch_result($result, 0, 'id');
            return array("status" => "success", "message" => "Tipo de produto adicionado com sucesso!", "id" => $id);
        } else {
            return array("status" => "error", "message" => "Erro ao adicionar o tipo de produto!");
        }
    }

    public static function all($connection) {
        $query = "SELECT * FROM product_types";
        $result = pg_query($connection, $query);

        $product_types = array();
        while ($row = pg_fetch_assoc($result)) {
            $product_types[] = $row;
        }
        return $product_types;
    }
}
