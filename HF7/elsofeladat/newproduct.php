<?php
    if (isset($_POST['submit'])){
        $title=$_POST['title'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        $image=$_POST['image'];
    
        $url = 'https://fakestoreapi.com/products';
        $headers=array(
            "Content-Type: application/json",
        );
        $newProduct = array(
            "title" => "$title",
            "price" => "$price",
            "category" => "$category",
            "image" =>"$image"
        );
        $body=json_encode($newProduct);


        $cURLCon = curl_init($url);
        curl_setopt($cURLCon, CURLOPT_POSTFIELDS, $body);
        curl_setopt($cURLCon, CURLOPT_POST, 1);
        curl_setopt($cURLCon, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLCon, CURLOPT_HTTPHEADER, $headers);
    
    
        $apiResponse = curl_exec($cURLCon);
        curl_close($cURLCon);
        $jsonArrayResponse = json_decode($apiResponse, true);
        echo "<h3>Successfully added the new product:</h3>";
        echo "Title: ".$jsonArrayResponse['title']."<br> Price: ".$jsonArrayResponse['price']."<br>";
    
        
    }
    echo "<a href='index.php'><h2>Back to list page</h2></a>";
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <label>Product name:<br>
        <input type="Text" name="title" >
    </label><br>
    <label>Price:<br>
        <input type="Text" name="price" >
    </label><br>
    <label>Category:<br>
        <input type="Text" name="category" >
    </label><br>
    <label>Image url:<br>
        <input type="Text" name="image" >
    </label><br><br>
    <input type="Submit" name="submit" value="Add">
</form>




