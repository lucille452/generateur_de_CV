<?php

use Dompdf\Dompdf;

require_once '../dompdf/autoload.inc.php';

if (isset($_POST['modele1'])) {
    modelToPdf(1);
} else if (isset($_POST['modele2'])) {
    modelToPdf(2);
} else if (isset($_POST['modele3'])) {
    modelToPdf(3);
}

function modelToPdf($model)
{
    $dompdf = new Dompdf();

    ob_start();

    include "../Front/Models/model$model.php";
    $html = ob_get_clean();

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('cv.pdf');
}
?>