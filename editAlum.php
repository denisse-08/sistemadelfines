<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro de alumno</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-warning">                
                    <div class="container">
                    <?php include('message.php'); ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">                          
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><a href="index.php" class="btn btn-danger float-end"><i class="fa-solid fa-backward"></i></a>Modicar Datos</h3></div>
                                    <div class="card-body">
                                    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM pagos WHERE idpagos='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                        <form action="code.php" method="POST">
                                        <input type="hidden" name="student_id" value="<?= $student['idpagos']
                                        ?>">
                                        
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputFirstName" value="<?=$student['Cantidad'];?>"  type="number" name="cantidad" placeholder=""/>
                                                <label for="inputFirstName"> Cantidad</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputFirstName" type="date" name="fecha" value="<?=$student['Fecha'];?>" />
                                                <label for="inputFirstName"> Fecha</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="curso" value="<?=$student['Curso'];?>" placeholder="" />
                                                        <label for="inputFirstName">Curso</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="reservado" value="<?=$student['reservado'];?>" placeholder="" />
                                                        <label for="inputLastName">Comentario</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" name="update_student" class="btn btn-primary">Modificar Pagos</button></div>
                                            </div>

                                        </form>
                                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <br><br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/scripts.js"></script> -->
    </body>
</html>