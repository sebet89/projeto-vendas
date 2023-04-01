<?php

function create_sales_table($connection)
{
    $query = "CREATE TABLE IF NOT EXISTS sales (
        id SERIAL PRIMARY KEY,
        sale_date TIMESTAMP NOT NULL
    )";

    return pg_query($connection, $query);
}
