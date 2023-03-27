<?php

require_once 'config.php';

$products = [];

$products[] = [
              'product_name' => 'VIRTUAL SERVERS',
              'price' => 5,
              'product_image' => file_get_contents("https://i.imgur.com/VEIKbp0.png")
              ];

$products[] = [
              'product_name' => 'MANAGED KUBERNETES',
              'price' => 30,
              'product_image' => file_get_contents("https://i.imgur.com/cCc9Gw9.png")
              ];

$products[] = [
              'product_name' => 'MySQL DATABASES',
              'price' => 15,
              'product_image' => file_get_contents("https://i.imgur.com/UYcHkKD.png" )
              ];

$sql = "INSERT INTO products(product_name, price, product_image) VALUES (:product_name, :price, :product_image)";

foreach ($products as $product) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
}

echo "Records inserted successfully";
?>
