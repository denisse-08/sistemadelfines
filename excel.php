<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename= padron_becas.pdf");
require 'dbcon.php';
?>

<table class="table table-warning table-bordered table-striped" border="1">
    <caption>PADRON DE BECAS</caption>
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Nombre</th>
            <th>Nombre Completo</th>
            <th>Curp</th>
            <th>Status</th>
            <th>Semestre</th>
            <th>Grupo</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Lugar Nacimiento</th>
            <th>Telefono</th>
            <th>Nombre Tutor</th>
            <th>Telefono Tutor</th>
            <th>Localidad</th>
            <th>Calle</th>
            <th>Num</th>
            <th>Colonia</th>
            <th>Municipio</th>
            <th>Codigo Postal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM pagos";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $student)
                {
                    ?>
        <tr>
            <td><?= $student['idpagos']; ?></td>
            <td><?= $student['Cantidad']; ?></td>
            <td><?= $student['Telefono']; ?></td>
            <td><?= $student['reservado']; ?></td>
            <td><?= $student['Comentario']; ?></td>
            <td><?= $student['curp']; ?></td>
            <td><?= $student['status']; ?></td>
            
        </tr>
                        <?php
                    }
                }
            ?>                                
    </tbody>
</table>