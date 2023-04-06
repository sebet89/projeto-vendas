<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../src/models/Sale.php";

class SaleTest extends TestCase
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
        $lastProductId = $this->getLastProductId($this->connection);

        if ($lastProductId === null) {
            $this->markTestSkipped('Não há produtos disponíveis no banco de dados para testar a criação da venda.');
        }

        $sale_items = [
            [
                "id" => $lastProductId,
                "quantity" => 2,
                "product_price" => 100,
                "tax" => 0.1,
            ],
        ];

        $response = Sale::create($this->connection, $sale_items);
        $this->assertEquals("success", $response["status"]);
    }

    public function testAll()
    {
        $sales = Sale::all($this->connection);
        $this->assertIsArray($sales);
    }

    private function getLastProductId($connection) {
        $query = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
        $result = pg_query($connection, $query);
    
        if ($result) {
            $row = pg_fetch_assoc($result);
            return $row['id'];
        } else {
            return null;
        }
    }
}
