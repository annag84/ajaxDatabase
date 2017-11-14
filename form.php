<?php 

    $formdata = explode('&', $_POST['data']);
     parse_str( $_POST['data'], $values);

     // connecting to database

     $server =  'localhost' ;
     $username = 'anna';
     $password = 'annagrzesko';
     $dbname = 'signup';

     $connection = mysqli_connect($server,$username,$password,$dbname);

     if (!$connection){
         echo "problem connecting";
     } 
     else {
         echo "connected successfully, ";
     }

    $encryptedPassword = password_hash($values['password'],PASSWORD_DEFAULT); 

    $sql = "Insert into userinfo (firstname,lastname,email,password,phone,city,gender)
            VALUES('" 
            .$values['firstname'] . "', '" 
            .$values['lastname']  . "', '" 
            .$values['email']     . "', '" 
            .$encryptedPassword  . "', '" 
            .$values['phone']  . "', '" 
            .$values['city'] . "', '"
            .$values['gender']    . "') ;";

    $query = mysqli_query($connection, $sql);
    if ($query){
        echo "1 row inserted";
    } else {
        echo "mysql_query error - cound't insert to the signup table";
    }
?>
