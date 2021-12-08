<?php
    $url = 'https://fakestoreapi.com/users';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json,true);


?>


<form method="get" action="result.php">
    <label>User Id:<br>
        <input type="number" min="1" max="<?php echo count($response)?>" name="userId">
    </label><br>
    <input type="Submit" name="submit" value="Get carts sum">
</form>
