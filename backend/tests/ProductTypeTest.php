<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/models/ProductType.php";

class ProductTypeTest extends TestCase
{
    private $connection;

    protected function setUp(): void
    {
        $host = "localhost";
        $user = "postgres";
        $pass = "postgres";
        $db = "mercado";

        $this->connection  = pg_connect("host={$host} dbname={$db} user={$user} password={$pass}") or die("Erro na conexão: " . pg_last_error());
    }

    public function testCreate()
    {
        $response = ProductType::create($this->connection, "Tipo 1", 0.1);
        $this->assertEquals("success", $response["status"]);
    }

    public function testAll()
    {
        $productTypes = ProductType::all($this->connection);
        $this->assertIsArray($productTypes);
    }
}
