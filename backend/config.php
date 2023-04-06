<?php

$host = "localhost";
$user = "postgres";
$pass = "postgres";
$db = "mercado";

$connection = pg_connect("host={$host} dbname={$db} user={$user} password={$pass}") or die("Erro na conexão: " . pg_last_error());

return $connection;
