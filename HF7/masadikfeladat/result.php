<?php
if (isset($_GET['submit'])){
    $id=$_GET['userId'];
    $url = "https://fakestoreapi.com/carts/user/$id";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json,true);
    
    $total=0;
    foreach ($response as $item){
        foreach ($item['products'] as $product){
            $prodId=$product['productId'];
            $url = "https://fakestoreapi.com/products/$prodId";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $res_json = curl_exec($ch);
            curl_close($ch);
            $res=json_decode($res_json,true);
            $price=$res['price'];
            $quant=$product['quantity'];
            $total+=$price*$quant;
        }
    }
    
    echo "Total value of all carts:".$total;
}