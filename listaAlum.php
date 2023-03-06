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
        <title>Alumnos</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include('header.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <br>
                        <?php include('message.php'); ?>
                        <a href="recibo.php">Recibo</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista De Estudiantes
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr></th>
                                            <th scope="col">Nombre Alumno</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Comentarios</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">Nombre Alumno</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Comentarios</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $query = "SELECT * FROM pagos a INNER JOIN padres p  ON a.idpadre = p.id";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                        <tr>
                                             <td><?= $student['Nombre']." ".$student['ApellidoM']; ?></td>
                                            <td><?= $student['Cantidad']; ?></td>
                                            <td><?= $student['Fecha']; ?></td>
                                            <td><?= $student['Curso']; ?></td>
                                            <td><?= $student['reservado']; ?></td>
                                            <td>
                                                <a href="datosAlum.php?id=<?= $student['idpagos']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                                <a href="editAlum.php?id=<?= $student['idpagos']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                                                <a href="recibo.php?id=<?= $student['idpagos']; ?>" >PDF</span></a>
                                                <form action="code.php" method="POST" class="dvalue="<?=$student['idpagos'];?>"-inline">
                                                    <button type="submit" name="delete_student"  class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }?>
                                    </tbody>
                                </table>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="register.php" class="btn btn-primary" type="button"><i class="fa-solid fa-address-book"></i> Agregar Pago</a>
                                    <a href="excel.php" class="btn btn-success" type="button"><i class="fa-solid fa-download"> </i> Generar Excel</a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/tabla.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>