
<?php
require_once '../../model/dompdf/autoload.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;

$id = $_GET['id'];


    $w_fields = "*";
$w_tbl = "rad_result";
$w_joins = "LEFT JOIN all_items_tbl ON all_items_tbl.id = rad_result.inv LEFT JOIN patient_data ON
patient_data.prn = rad_result.prn";
$w_criteria = "WHERE rad_result.id = '{$id}' ";
$result_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($test_details);

$pdf_result = $result_details[0]['result'];
$pattern = "/<table class=\"table-1\">/i";

$new_pdf1 =  preg_replace($pattern, "<table class='table table-striped'>", $pdf_result);

$pattern2 = "/<td>/i";
$new_pdf2 =  preg_replace($pattern2, "<td style='border:solid gray 1px'>", $new_pdf1);
//$sample_types = $obj->selects("rad_sample_type");
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$load_result = "<link rel='stylesheet' href='../../assets/css/bootstrap/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
<div class='table-responsive' id='result' style='border:0'>
Patient Name : {$result_details[0]['sname']} {$result_details[0]['fname']} {$result_details[0]['oname']}<br/>
Investigation Name : {$result_details[0]['itemname']}<br/>


{$new_pdf2}

</div>";



    $dompdf->loadHtml($load_result);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to Browser
    $dompdf->stream("document.pdf", array("Attachment" => false));
    
    exit(0);
    ?>

    <script>
    
    $('table').addClass('table table-striped');
    $('td').css('border','solid 1px black');

    </script>

