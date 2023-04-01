<?php

function rollback_product_types_table($connection)
{
    $query = "DROP TABLE IF EXISTS product_types";
    return pg_query($connection, $query);
}
