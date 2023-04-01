<?php

function create_product_types_table($connection)
{
    $query = "CREATE TABLE IF NOT EXISTS product_types (
        id SERIAL PRIMARY KEY,
        type_name VARCHAR(255) NOT NULL,
        tax_percentage DECIMAL(5, 2) NOT NULL
    )";

    return pg_query($connection, $query);
}
