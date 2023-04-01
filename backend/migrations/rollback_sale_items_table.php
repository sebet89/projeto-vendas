<?php

function rollback_sale_items_table($connection)
{
    $query = "DROP TABLE IF EXISTS sale_items";
    return pg_query($connection, $query);
}
