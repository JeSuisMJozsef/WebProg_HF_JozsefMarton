<?php
    $id = $_GET['id'];
    $url = "https://fakestoreapi.com/products/$id";
    $headers = array(
        "Content-Type: application/json",
    );
    $cURLCon = curl_init($url);
    curl_setopt($cURLCon, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($cURLCon, CURLOPT_HTTPHEADER, $headers);
    $apiResponse = curl_exec($cURLCon);
    curl_close($cURLCon);
    $resp = json_decode($apiResponse);
    echo $resp==1?"Success":"Something went wrong";
    echo "<a href='index.php'><h2>Back to list page</h2></a>";







