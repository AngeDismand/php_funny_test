<?php
require_once 'connexion.php';

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
        <h6 align="center" style="font-size: 17px;color:#058;
    font-weight: 900;
    ">New candidat</h6><br>
        <form class="" method="POST" action="store.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Last name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="last_name" id="" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">First name(s):</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="first_name" id="" autofocus required>
                    </div>
                </div>
            </div><br>

            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Email:</label>
                    <div class="col-9">
                        <input type="email" class="form-control shadow-none" name="email" id="" autofocus required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Phone number:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="phone_number" id="" autofocus
                            required>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row ">
                    <label class="col-3">Degree:</label>
                    <div class="col-9">
                        <input type="text" class="form-control shadow-none" name="degree" id="" autofocus required>
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
                                Add</i></button>

                    </div>
                </div>
            </div><br>
        </form>
    </div>

</body>

</html>