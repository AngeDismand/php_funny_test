<?php 
require_once "connexion.php";
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $stat= $bdd->prepare("SELECT * FROM cvs WHERE id=$id");
    $stat->execute();
    $data=$stat->fetch();
    
    
    $file='cvs/'.$data['file_name'];
    
    if(file_exists($file)){
        header('Content-Description:  File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:'.filesize($file));
        readfile($file);
        exit;
       
    }

}
?>