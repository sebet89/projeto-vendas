<?php

function rollback_sales_table($connection)
{
    $query = "DROP TABLE IF EXISTS sales";
    return pg_query($connection, $query);
}
