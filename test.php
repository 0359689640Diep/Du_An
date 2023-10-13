<?php 
    $conn = new mysqli("localhost", "root", "", "thu");
    if(!$conn->connect_error){
        $query = $conn->query("Insert into thu1 values (null, 'diep')");
        if($query){
            $LastId = mysqli_insert_id($conn);
            echo $LastId;
        }
    }
?>