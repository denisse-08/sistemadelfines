<?php
ob_start();
require('dbcon.php');
require('datosAlum.php');
$html= ob_get_clean();
require 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options-> set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadhtml($html);
$dompdf->setPaper("letter");
$dompdf->render();
$dompdf->stream("lista.pdf",array('Attachment'=>false) );
?>
