<?php
include_once('database.php');
// delete 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete_query = "DELETE FROM messages WHERE id_comment=$id";
    $result=mysqli_query($link,$delete_query) ;
    if(!$result){
        echo "erreur :" . mysqli_query($delete_query);
    }


    header("location: index.php");
}

?>