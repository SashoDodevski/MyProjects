<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . "./database/db.php";

$sql = "SELECT * FROM `books` 
        LEFT JOIN authors ON books.author_id = authors.id
        LEFT JOIN book_categories ON books.book_category_id = book_categories.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type:application/json"); 
$jsonobject = json_encode($books); 
echo $jsonobject; 

?>