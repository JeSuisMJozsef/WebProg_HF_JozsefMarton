<?php
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $url = "https://fakestoreapi.com/products/$id";
        $headers = array(
            "Content-Type: application/json",
        );
        $editedProduct = array(
            "title" => "$title",
            "price" => "$price",
            "category" => "$category",
            "image" => "$image"
        );
        $body = json_encode($editedProduct);
        
        
        $cURLCon = curl_init($url);
        
        curl_setopt($cURLCon, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($cURLCon, CURLOPT_POSTFIELDS, $body);
        curl_setopt($cURLCon, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLCon, CURLOPT_HTTPHEADER, $headers);
        
        
        $apiResponse = curl_exec($cURLCon);
        curl_close($cURLCon);
        $response = json_decode($apiResponse, true);;
        echo "<h3>Successfully edited the product:</h3>";
        echo "Title: ".$response['title']."<br> Price: ".$response['price']."<br>";
    } else {
        $id = $_GET['id'];
        $url = "https://fakestoreapi.com/products/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response_json, true);
    }
    echo "<a href='index.php'><h2>Back to list page</h2></a>";
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <label>Product name:<br>
        <input type="Text" name="title" value="<?php echo $response['title']; ?>">
    </label><br>
    <label>Price:<br>
        <input type="Text" name="price" value="<?php echo $response['price']; ?>">
    </label><br>
    <label>Category:<br>
        <input type="Text" name="category" value="<?php echo $response['category']; ?>">
    </label><br>
    <label>Image url:<br>
        <input type="Text" name="image" value="<?php echo $response['image']; ?>">
    </label><br>
    <input type="hidden" name="id" value=<?php echo isset($_GET['id']) ?? $_GET['id']; ?>><br>
    <input type="Submit" name="submit" value="Submit">
</form>





