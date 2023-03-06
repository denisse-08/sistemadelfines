<?php
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
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                    <?php include('message.php'); ?>
                    <?php include('pdf.php'); ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><a href="index.php" class="btn btn-danger float-end"><i class="fa-solid fa-backward"></i></a>Recibo de Pago</h3></div>
                                    <div class="card-body">
                                    <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM pagos a INNER JOIN padres p  ON a.idpadre = p.id  WHERE idpagos='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                        <form>
                                        <div class="form mb-3">
                                                <label>Nombre</label>
                                                <p class="form-control">
                                                    <?=$student['Nombre']." ".$student['ApellidoP']." ".$student['ApellidoM'];?>
                                                </p>
                                            </div>
                                            <div class="form mb-3">
                                                <label>Telefono</label>
                                                <p class="form-control">
                                                    <?=$student['Telefono'];?>
                                                </p>
                                            </div>
                                            <div class="form mb-3">
                                                <label>Direccion</label>
                                                <p class="form-control">
                                                    <?=$student['Direccion'];?>
                                                </p>
                                            </div>
                                        <div class="form mb-3">
                                                <label>Cantidad</label>
                                                <p class="form-control">
                                                    <?=$student['Cantidad'];?>
                                                </p>
                                            </div>
                                            <div class="form mb-3">
                                                <label for="inputFirstName">Fecha</label>
                                                <p class="form-control">
                                                    <?=$student['Fecha'];?>
                                                </p>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form mb-3 mb-md-0">
                                                        <label for="inputPassword">Curso</label>
                                                        <p class="form-control">
                                                            <?=$student['Curso'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form mb-3 mb-md-0">
                                                        <label for="inputPassword">Comentario</label>
                                                        <p class="form-control">
                                                            <?=$student['reservado'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                           <a href="recibo.php">Recibo</a>
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
                </main>
            </div>
        </div>
        <br><br>
</html>

