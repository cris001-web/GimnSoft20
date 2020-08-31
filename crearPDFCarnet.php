<?php
require __DIR__.'/vendor/autoload.php';

use Dompdf\Dompdf;


$id=$_GET['id'];

function file_get_contents_curl($url) {
  $ch = curl_init();

  curl_multi_setopt($ch, CURLOPT_HEADER, 0 );
  curl_multi_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_multi_setopt($ch, CURLOPT_URL, $url);

  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$html= file_get_contents("http://localhost/gimnsoft/vistas/vistaCarnet.php?id=".$id);
$pdf = new DOMPDF(array('enable_remote' => true));
$paper_size = array(0,0,450,550);
$pdf->set_paper($paper_size);
$pdf->load_html(utf8_decode($html));
$pdf->render();
$pdf->stream('Carnet.pdf');
?>