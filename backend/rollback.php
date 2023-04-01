<?php

require_once __DIR__ . "/config.php";

require_once __DIR__ . "/migrations/rollback_sale_items_table.php";
require_once __DIR__ . "/migrations/rollback_sales_table.php";
require_once __DIR__ . "/migrations/rollback_products_table.php";
require_once __DIR__ . "/migrations/rollback_product_types_table.php";

if (rollback_sale_items_table($connection) &&
    rollback_sales_table($connection) &&
    rollback_products_table($connection) &&
    rollback_product_types_table($connection)
) {
    echo "Rollbacks executados com sucesso!" . PHP_EOL;
} else {
    echo "Erro ao executar rollbacks!" . PHP_EOL;
}

pg_close($connection);
