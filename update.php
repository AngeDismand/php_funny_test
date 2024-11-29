<?php
require_once 'connexion.php';
$id = $_GET['id'];
$recupCandidat = $bdd->prepare("SELECT * FROM cvs WHERE id = $id");
$recupCandidat->execute();
$data = $recupCandidat->fetch();
function number()
{
    $num = rand(0, 1000);
    return $num;
}
function numberOther()
{
    $num = rand(0, 2000);
    return $num;
}

if (isset($_POST['send'])) {
    if (
        !empty($_POST['last_name']) and !empty($_POST['first_name']) and !empty($_POST['email'])
        and !empty($_POST['phone_number']) and !empty($_POST['degree']) and isset($_FILES['file_name'])
        and !empty($_FILES['file_name']['name'])
    ) {
        $filename = $_FILES['file_name']['name'];
        $taillemax = 2097152;
        $extensionValides = array('pdf', 'doc');
        $edit_num = number() . numberOther();
        $last_name = htmlspecialchars($_POST['last_name']);
        $first_name = htmlspecialchars($_POST['first_name']);
        $email = htmlspecialchars($_POST['email']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $degree = htmlspecialchars($_POST['degree']);
        if ($_FILES['file_name']['size'] <= $taillemax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['file_name']['name'], '.'), 1));
            if (in_array($extensionUpload, $extensionValides)) {
                $chemin = "cvs/" . "CV" . "_" . $last_name . "_" . $first_name . $edit_num . "." . $extensionUpload;
                $result = move_uploaded_file($_FILES['file_name']['tmp_name'], $chemin);
                if ($result) {
                    $file = "cvs/" . $data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                        $path = "CV" . "_" . $last_name . "_" . $first_name . $edit_num . "." . $extensionUpload;
                        $updateCandidat = $bdd->query("UPDATE cvs SET  last_name='$last_name', first_name='$first_name', email='$email',
                                           phone_number='$phone_number', degree='$degree', 
                                           file_name='$path' WHERE id=$id ");

                        header('Location:index.php?reg_err=edit');
                    }
                } else
                    header('Location:create.php?reg_err=invalid_tail');
            } else
                header('Location:create.php?reg_err=invalid_extension');
        } else
            header('Location:create.php?reg_err=invalid_tail');
    } else
        header('Location:index.php?reg_err=already');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment|</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <script src="js/sweetalert.min.js "> </script>
    <?php include_once "head.php"; ?>
    <div class="container" style=" background:#fff;border-radius:5px;box-shadow:0 .5rem 1.5rem rgba(0,0,0, .1);">
        <br>
        <h6 align="center" style="font-size: 17px;
    font-weight: 900;
    ">Update</h6><br>
        <form class="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Last name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="last_name" id=""
                            value="<?php echo $data['last_name'] ?>" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">First name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="first_name"
                            value="<?php echo $data['first_name'] ?>" id="" autofocus required>
                    </div>
                </div>
            </div><br>

            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Email:</label>
                    <div class="col-9">
                        <input type="email" class="form-control shadow-none" name="email" id=""
                            value="<?php echo $data['email'] ?>" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Phone number:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="phone_number" id=""
                            value="<?php echo $data['phone_number'] ?>" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Degree:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="degree" id=""
                            value="<?php echo $data['degree'] ?>" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">File:</label>
                    <div class="col-9">
                        <input type="file" accept=".pdf,.doc" class="form-control shadow-none" name="file_name" id=""
                            autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <div class="col-3">
                        <a href="index.php">
                            <p class="btn btn-danger"><i class="fa fa-arrow-left"> Cancel</i></p>
                        </a>
                    </div>
                    <?php

                    include_once 'message_alerte.php';

                    ?>
                    <div class="col-9">
                        <button type="submit" class="btn btn-success" name="send"><i class="fa fa-floppy-o">
                                Save</i></button>

                    </div>
                </div>
            </div><br>
        </form>


</body>

</html>