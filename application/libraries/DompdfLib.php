<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class DompdfLib
{

    public function generar_pdf($html, $filename = '', $stream = true, $paper = 'letter', $orientation = "portrait")
    {
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        $font = $dompdf->getFontMetrics()->getFont("Arial", "normal");
        $dompdf->getCanvas()->page_text(16, 770, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0, 0, 0));

        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => false));
        } else {
            $dompdf->stream($filename . ".pdf", array("Attachment" => true));
            //$dompdf->stream();
            //$dompdf->output();
        }
    }
}
