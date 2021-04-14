<?php
include_once('database.php');
// delete 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete_query = "DELETE FROM messages WHERE id_comment=$id";
    $result=mysqli_query($link,$delete_query) ;
    if(!$result){
        echo "erreur :" . mysqli_query($delete_query);
    }else{
        header("location:login.php");
    }

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

?>