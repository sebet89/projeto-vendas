<?php

function create_products_table($connection)
{
    $query = "CREATE TABLE IF NOT EXISTS products (
        id SERIAL PRIMARY KEY,
        product_name VARCHAR(255) NOT NULL,
        product_type_id INTEGER NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (product_type_id) REFERENCES product_types (id)
    )";

    return pg_query($connection, $query);
}
