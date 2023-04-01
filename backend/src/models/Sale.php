<?php
class Sale {
    public static function create($connection, $sale_items) {
        $query = "INSERT INTO sales (sale_date) VALUES (NOW()) RETURNING id";
        $result = pg_query($connection, $query);

        if ($result) {
            $sale_id = pg_fetch_result($result, 0, 'id');
            foreach ($sale_items as $item) {
                $product_id = $item["id"];
                $quantity = $item["quantity"];
                $price = $item["product_price"];
                $tax = $item["tax"];

                $query = "INSERT INTO sale_items (sale_id, product_id, quantity, price, tax) VALUES ($1, $2, $3, $4, $5)";
                $result = pg_query_params($connection, $query, array($sale_id, $product_id, $quantity, $price, $tax));

                if (!$result) {
                    return array("status" => "error", "message" => "Erro ao adicionar item de venda!");
                }
            }
            return array("status" => "success", "message" => "Venda adicionada com sucesso!");
        } else {
            return array("status" => "error", "message" => "Erro ao adicionar venda!");
        }
    }

    public static function all($connection) {
        $query = "
            SELECT
                sales.id AS sale_id,
                sales.sale_date,
                COALESCE(
                    json_agg(
                        json_build_object(
                            'product_id', sale_items.product_id,
                            'quantity', sale_items.quantity,
                            'price', sale_items.price,
                            'tax', sale_items.tax
                        ) 
                        ORDER BY sale_items.product_id
                    ) FILTER (WHERE sale_items.product_id IS NOT NULL),
                    '[]'
                ) AS items,
                SUM(sale_items.price * sale_items.quantity) AS total,
                SUM(sale_items.tax * sale_items.quantity) AS total_taxes
            FROM
                sales
                JOIN sale_items ON sales.id = sale_items.sale_id
            GROUP BY
                sales.id,
                sales.sale_date
        ";
        $result = pg_query($connection, $query);
    
        $sales = array();
        while ($row = pg_fetch_assoc($result)) {
            $row['items'] = json_decode($row['items']);
            $sales[] = $row;
        }
        return $sales;
    }
    
    
}
