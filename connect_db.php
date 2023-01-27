<?php
function connect():PDO{
	//データベース接続関数
	$dbHost = "localhost";
	$dbName = "xs810371_256ch";
	$dbUser = "xs810371_256";
	$dbPassword = "f7695c44";
	$dsn = "mysql:host={$dbHost};dbname={$dbName};charser=utf8";
	$pdo = new PDO($dsn, $dbUser, $dbPassword);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
}