<?php

function rollback_products_table($connection)
{
    $query = "DROP TABLE IF EXISTS products";
    return pg_query($connection, $query);
}
