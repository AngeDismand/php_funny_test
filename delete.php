<?php
/*Supression*/
require_once "connexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $recupCandidat = $bdd->prepare("SELECT * FROM cvs WHERE id = $id");
    $recupCandidat->execute();
    $data = $recupCandidat->fetch();
    $file = "cvs/" . $data['file_name'];
    if (file_exists($file)) {
        unlink($file);
        $stat = $bdd->query("DELETE  FROM   cvs WHERE id=$id");
        header('Location:index.php?reg_err=delete');
    }
}
?>