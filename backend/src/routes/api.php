<?php
require_once __DIR__ . "/../controllers/ProductController.php";
require_once __DIR__ . "/../controllers/ProductTypeController.php";
require_once __DIR__ . "/../controllers/SaleController.php";

function handle_request($request_method, $action, $connection, $post_data = null) {
    $productController = new ProductController();
    $productTypeController = new ProductTypeController();
    $saleController = new SaleController();

    switch ($action) {
        case "listProducts":
            if ($request_method == 'GET') {
                return $productController->index($connection);
            }
            break;
        case "addProduct":
            if ($request_method == 'POST') {
                return $productController->store($connection, $post_data["name"], $post_data["product_type_id"], $post_data["price"]);
            }
            break;
        case "listProductTypes":
            if ($request_method == 'GET') {
                return $productTypeController->index($connection);
            }
            break;
        case "addProductType":
            if ($request_method == 'POST') {
                return $productTypeController->store($connection, $post_data["name"], $post_data["tax_percentage"]);
            }
            break;
        case "listSales":
            if ($request_method == 'GET') {
                return $saleController->index($connection);
            }
            break;
        case "addSale":
            if ($request_method == 'POST') {
                return $saleController->store($connection, $post_data["sale_items"]);
            }
            break;
        default:
            return array("status" => "error", "message" => "Ação inválida!");
    }

    // Se o método HTTP não for permitido para a ação solicitada, retorne uma mensagem de erro
    return array("status" => "error", "message" => "Método HTTP não permitido para esta ação!");
}


