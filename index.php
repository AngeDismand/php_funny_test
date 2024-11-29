<?php
require_once 'connexion.php';

$recupCandidat = $bdd->prepare("SELECT * FROM cvs");
$recupCandidat->execute();
$data = $recupCandidat->fetchALL();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment|</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <script src="js/sweetalert.min.js "> </script>
    <?php include_once "head.php"; ?>
    <div class="row pt-4  m-auto">
        <p><a href="create.php">
                <button class="btn btn-primary">Add</button>
            </a>
        </p>
    </div>
    <div class="row pt-4  m-auto">
        <div class="table  table-responsive-md  m-auto ">
            <table class="table  table-striped">
                <thead class="thead-dark">
                    <tr style="color:#f2f2f2; background:#058;
                      
                      font-family: Arial, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                     ">
                        <th scope="col" class="text-center">Last name</th>
                        <th scope="col" class="text-center">First name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phone number</th>
                        <th scope="col" class="text-center">Degree</th>
                        <th scope="col" class="text-center">File</th>
                        <th scope="col" class="text-center">Settings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $one_data): ?>
                        <tr>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['last_name'] ?></td>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['first_name'] ?></td>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['email'] ?></td>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['phone_number'] ?></td>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['degree'] ?></td>
                            <td class="text-center" style="color:#000;"><?php echo $one_data['file_name'] ?><br>
                                <a href="download.php?&id=<?php echo $one_data['id'] ?>"
                                    class="btn btn-success mb-2">Download</a>
                            </td>
                            <td class="text-center">
                                <a href="update.php?id=<?php echo $one_data['id'] ?>" class="btn btn-primary mb-2 ">Edit
                                </a>


                                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?php echo $one_data['id']; ?>">Delete
                                </button>
                                <div class="modal fade" id="exampleModal<?php echo $one_data['id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure to delete this value?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete.php?&id=<?php echo $one_data['id'] ?>">
                                                    <button class="btn btn-success" type="button">Confirm</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </td>



                        </tr>


                    </tbody>


                <?php endforeach ?>
            </table>
            <?php

            include_once 'message_alerte.php';

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>

    </script>
</body>

</html>