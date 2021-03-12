<?php

include_once('database.php');
include('index.php');
if(isset($_POST['envoyer']) && isset($_POST['message']) && isset($_POST['utilisateur'])){
$username = $_POST['utilisateur'];
$cmt= $_POST['message'];
$query_one= "INSERT INTO messages(utilisateur,contenu_message) VALUES ('$username','$cmt')";
$result = mysqli_query($link,$query_one);
if(!$result){
    echo "erreur :" . mysqli_query($query_one);
}
}
// si le message est envoyé correctement
    // récupérer les données dans des variables
    // si les valeurs récupéré sont vides
        //se redériger ver la page index avec le message d'erreur sauvgarde dans un query string
    // si non afficher préparer la requête d'insertion
    // vérifier qu'elle s'execute correctement
    // s'il y a une erreur afficher le message puis arrêter le programme avec la "die"
    // si non se redériger à la page index qui devera insérer le message nouvellement inséré

   ?>