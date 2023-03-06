<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM pagos WHERE idpagos ='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Estudiante eliminado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Estudiante no eliminado";
        header("Location: listaAlum.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $id = mysqli_real_escape_string($con, $_POST['idpagos']);

    $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
    $fecha = strtoupper(mysqli_real_escape_string($con, $_POST['fecha']));
    $curso = strtoupper(mysqli_real_escape_string($con, $_POST['curso']));
    $reservado = strtoupper(mysqli_real_escape_string($con, $_POST['reservado']));
    
    $query = "UPDATE pagos SET `Cantidad`='$cantidad',`Fecha`='$fecha',`Curso`='$curso',`reservado`='$reservado'
    
    WHERE idpagos='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Pago actualizado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Pago no actualizado";
        header("Location: listaAlum.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $nom = strtoupper(mysqli_real_escape_string($con, $_POST['nombre']));
    $fecha = strtoupper(mysqli_real_escape_string($con, $_POST['fecha']));
    $curso = strtoupper(mysqli_real_escape_string($con, $_POST['curso']));
    $sexo = strtoupper(mysqli_real_escape_string($con, $_POST['sexo']));
    $edad = strtoupper(mysqli_real_escape_string($con, $_POST['edad']));
    $padre = strtoupper(mysqli_real_escape_string($con, $_POST['padre']));

    $query = "INSERT INTO pagos (`Cantidad`, `Fecha`, `Curso`, `reservado`, `Comentario`, `idpadre`) VALUES 
    ('$nom', '$fecha','$curso','$sexo', '$edad','$padre')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Estudiante creado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Estudiante no creado";
        header("Location: register.php");
        exit(0);
    }
}

if (isset($_POST['save_father'])) {

    $nomp = strtoupper(mysqli_real_escape_string($con, $_POST['nombre_p']));
    $aepep = strtoupper(mysqli_real_escape_string($con, $_POST['p_ape_p']));
    $sapep = strtoupper(mysqli_real_escape_string($con, $_POST['m_ape_p']));
    $direccionp = strtoupper(mysqli_real_escape_string($con, $_POST['direccion_p']));
    $telefonop = strtoupper(mysqli_real_escape_string($con, $_POST['telefono_p']));

    $query = "INSERT INTO padres( `Nombre`, `ApellidoP`, `ApellidoM`, `Direccion`, `Telefono`) VALUES 
    ('$nomp','$aepep','$sapep','$direccionp','$telefonop')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Alumno registrado con éxito";
        header("Location: listaAlum.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Padre no creado";
        header("Location: registpadres.php");
        exit(0);
    }

}

?>