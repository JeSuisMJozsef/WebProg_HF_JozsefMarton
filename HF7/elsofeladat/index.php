<?php
    $url = 'https://fakestoreapi.com/products';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json,true);
    echo "<h2><a href='newproduct.php'> New Product</a></h2>";
    echo "<table border= 1>";
    foreach ($response as $item){
        echo "<tr >";
        echo "<td>".$item['id']."</td>";
        echo "<td>".$item['title']."</td>";
        echo "<td>".$item['price']."</td>";
        echo "<td>".$item['category']."</td>";
        echo "<td><img src=".$item['image']." width='150'></td>";
        echo "<td><a href=\"editproduct.php?id=".$item['id']."\">Edit</a></td>";
        echo "<td><a href=\"deleteproduct.php?id=".$item['id']."\">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
