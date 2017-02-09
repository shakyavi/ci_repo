<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 2/9/2017
 * Time: 10:42 AM
 */
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'helpers/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
function to_pdf($html, $filename, $stream = TRUE) {

    $dompdf = new Dompdf();

    $dompdf->load_html($html);

    $dompdf->render();

    if ($stream) {

        $dompdf->stream($filename . '.pdf');

    }

    else {

        $CI =& get_instance();

        $CI->load->helper('file');

        write_file('./uploads/temp/' . $filename . '.pdf', $dompdf->output());

    }

}

?>
