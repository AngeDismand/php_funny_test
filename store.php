<?php
require_once 'connexion.php';
function number(){
    $num=rand(0,1000);
    return $num;
  }
  function numberOther(){
    $num=rand(0,2000);
    return $num;
  }
    /* Add candidat*/
    if(isset($_POST['send'])){
        if(!empty($_POST['last_name'] ) AND !empty($_POST['first_name'] ) AND !empty($_POST['email']) 
        AND !empty($_POST['phone_number'] )AND !empty($_POST['degree'] )AND isset($_FILES['file_name'])
         AND !empty($_FILES['file_name']['name'])){
            $filename=$_FILES['file_name']['name'];
            $taillemax = 2097152;
            $extensionValides = array('pdf','doc');
            $last_name = htmlspecialchars($_POST['last_name']);
            $first_name = htmlspecialchars($_POST['first_name']);
            $email = htmlspecialchars($_POST['email']);  
            $phone_number = htmlspecialchars($_POST['phone_number']); 
            $degree = htmlspecialchars($_POST['degree']);
            $edit_num=number().numberOther();
            if($_FILES['file_name']['size']<= $taillemax)
             {
                $extensionUpload = strtolower(substr(strrchr($_FILES['file_name']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionValides))
                {
                   $path = "cvs/"."CV"."_".$last_name."_".$first_name.$edit_num.".".$extensionUpload;
                   $result=move_uploaded_file($_FILES['file_name']['tmp_name'],$path); 
                   if($result)
                   {
                    $file_name="CV"."_".$last_name."_".$first_name.$edit_num.".".$extensionUpload;
                    $insert = $bdd->prepare('INSERT INTO cvs( last_name,first_name,email,phone_number,degree,file_name)
                     VALUES(?, ?,?,?,?,?)');
                    $insert->execute(array( $last_name, $first_name,$email,$phone_number,$degree,$file_name));
                    header('Location:index.php?reg_err=success');
                    }else header('Location:create.php?reg_err=invalid_tail');
                } else header('Location:create.php?reg_err=invalid_extension');
            }else header('Location:create.php?reg_err=invalid_tail');
        }
    }
?>