<?php

$host = "localhost";
$user = "postgres";
$pass = "postgres";
$db = "mercado";

$connection = pg_connect("host={$host} dbname={$db} user={$user} password={$pass}");
