<?php

use Dompdf\Dompdf;

require_once '../dompdf/autoload.inc.php';

if (isset($_POST['submit'])) {
    $dompdf = new Dompdf();
    ob_start();

    include "../Front/Templates/modele1.php";
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4');
    $dompdf->render();
    $dompdf->stream('cv.pdf');
}
?>