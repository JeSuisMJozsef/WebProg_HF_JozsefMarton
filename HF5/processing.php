<?php
    $requireds=false;
    
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $email=$_POST['email'];
    if (!$fname||!$lname||!$email||!isset($_POST['attend'])||empty($_FILES['abstract']['name'])||!isset($_POST['terms'])){
        echo '<h3>'."Must to fill the following fields".'</h3>';
        if (!$fname){
            echo "First name ".'<br>';
        }
        if (!$lname){
            echo "Last name ".'<br>';
        }
        if (!$email){
            echo "Email".'<br>';
        }
        if (!isset($_POST['attend'])){
            echo "Min one event".'<br>';
        }
        if (empty($_FILES['abstract']['name'])){
            echo "Uploading an abstract".'<br>';
            
        }
        if (!isset($_POST['terms'])){
            echo "Terms and conditions".'<br>';
        }
    }
    elseif ($_FILES['abstract']['error']!=0){
        die("Uploading error!");
    }
    elseif ($_FILES['abstract']['size']>3145728 ){
        die("Error!!! Max upload size is 3mb!");
    }
    elseif ($_FILES['abstract']['type']!="application/pdf"){
        die("Just pdf format is allowed!");
    }
    else{
        echo '<h4>First name: </h4><p>'.$fname.'</p>';
        echo '<h4>Last name: </h4><p>'.$lname.'</p>';
        echo '<h4>Email: </h4><p>'.$email.'</p>';
        echo '<h4>Events: </h4>';
        foreach ($_POST['attend'] as $a){
            echo '<p>'.$a.'</p>';
        }
        if ($_POST['tshirt']!='P'){
;            echo '<h4>Selected thirt size: </h4><p>'.$_POST['tshirt'].'</p>';
        }
        else{
            echo '<h4>Thirt size is unselected</h4>';
        }
        echo '<h4>Your abstract name:</h4><p>'.$_FILES['abstract']['name'].'</p>';
        
    }

   


