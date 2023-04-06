<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/models/Product.php";

class ProductTest extends TestCase
{
    private $connection;

    protected function setUp(): void
    {
            
        $host = "localhost";
        $user = "postgres";
        $pass = "postgres";
        $db = "mercado";

        $this->connection  = pg_connect("host={$host} dbname={$db} user={$user} password={$pass}") or die("Erro na conexão: " . pg_last_error());

        // Create a new product type for testing
        $this->product_type_id = ProductType::create($this->connection, "Test Type Unit", 10)["id"];
    }

    public function testCreate()
    {
        $response = Product::create($this->connection, "Produto 1", $this->product_type_id, 100);
        $this->assertEquals("success", $response["status"]);
    }

    public function testAll()
    {
        $products = Product::all($this->connection);
        $this->assertIsArray($products);
    }
}
