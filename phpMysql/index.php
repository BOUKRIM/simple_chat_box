<?php
    include_once('database.php');
    session_start();

    if(isset($_POST['envoyer']) && !empty($_POST['message']) ){

        $cmt= $_POST['message'];
        $name= $_SESSION['name'];
        $query_one= "INSERT INTO messages(cmt_user,msg) VALUES ('$name','$cmt')";
        $result = mysqli_query($link,$query_one);
        if(!$result){
            echo "erreur :" . mysqli_query($query_one);
        }        
        }

        $query = "SELECT * FROM messages ORDER BY date ";
        $results = mysqli_query($link, $query);
    //selectionner les message dans la base de donnée
    
    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
    
        $update = true;
    
        $select_id_query = "SELECT * FROM messages WHERE id_comment=$id";
        $result = mysqli_query($link,$select_id_query);
        if($result->num_rows){
            $row = $result->fetch_array();
            $cmt = $row['msg'];
            
        }
    }
    // $query = "SELECT * FROM `messages` ORDER BY `temps` ASC  ";

    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat box</title>
    <link rel="stylesheet"  href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <div >
            <form  action="logout.php" method="post">
                <button type="submit" name="logout" class="logout">log out</button> <br><br>
            </form>
            
        </div>
        <div class="titleBar container">
        <h1>Welcome <?php echo $_SESSION['name'] ?></h1>
        
        </div>
        <div class="messages container">
            <ul>
                <?php foreach ($results as $row) : ?>

                    <li class="message"><span> <?php echo $row["date"];  ?> - </span><?php echo $row["cmt_user"];  ?>  : <?php echo $row["msg"];  ?> 
                     
                    
                    <a href="edit.php?edit=<?php echo $row['id_comment']; ?>" class="btn btn-success">Edit</a>

                    <a href="delete.php?delete=<?php echo $row['id_comment']; ?>" class="btn btn-danger">Delete</a>
                    
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class=" container">
            <form class="comment" action="traitement.php" method="post">  
            <input type="text" name="message" id="message" placeholder="Saisir votre message">
                <button type="submit"  class="envoyer" name="envoyer" value="Envoyer">Envoyer</button>
            </form>
        </div>
    </main>

</body>
</html>