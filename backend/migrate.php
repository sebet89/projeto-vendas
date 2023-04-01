<?php

require_once __DIR__ . "/config.php";

require_once __DIR__ . "/migrations/create_product_types_table.php";
require_once __DIR__ . "/migrations/create_products_table.php";
require_once __DIR__ . "/migrations/create_sales_table.php";
require_once __DIR__ . "/migrations/create_sale_items_table.php";

if (create_product_types_table($connection) &&
    create_products_table($connection) &&
    create_sales_table($connection) &&
    create_sale_items_table($connection)
) {
    echo "Migrações executadas com sucesso!" . PHP_EOL;
} else {
    echo "Erro ao executar migrações!" . PHP_EOL;
}

pg_close($connection);
