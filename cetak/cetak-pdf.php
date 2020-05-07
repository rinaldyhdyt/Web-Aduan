<?php
// menyertakan autoloader
require_once("dompdf/dompdf_config.inc.php");

// menggunakan class dompdf
include "../koneksi.php";
$waktu = gmdate("dmYhisa", time()+60*60*7);
$sql = mysql_query("SELECT * FROM tanggapan join pengaduan");

$html = 
"<html> <body>" .
	"<div>".
		"<h4 style='font-size: 25px; font-family: arial;color: #333;font-weight: bolder; opacity: 0.8; margin: 13.5px 0 0 22px;'>Pengaduan</h4>".
	"</div>".
	"<hr/>";
$html .= "<table style='margin-top: 10px;' border='1' cellpadding='5' cellspacing='0' width='100%'>" .
	"<thead>" .
		"<tr>".
			"<th>ID Tanggapan</th>".
			"<th>ID Petugas</th>".
			"<th>ID Pengaduan</th>".
			"<th>Tanggal Aduan</th>".
			"<th>Laporan</th>".
			"<th>Tanggapan</th>".
			"<th>Foto</th>".
			"<th>Status</th>".
		"</tr>".
	"</thead>" .
	"<tbody>" ;
while($row = mysql_fetch_array($sql)){
	$html .= 
	"<tr>" .
		"<td>" . $row['id_tanggapan'] . "</td>" .
		"<td>" . $row['id_petugas'] . "</td>" .
		"<td>" . $row['id_pengaduan'] . "</td>" .
		"<td>" . $row['tgl_pengaduan'] . "</td>" .
		"<td>" . $row['isi_laporan'] . "</td>" .
		"<td>" . $row['tanggapan'] . "</td>" .
		"<td>" . '<img src="../foto_aduan/'.$row['foto'].'" width="50px"/>' . "</td>" .
		"<td>" . $row['status'] . "</td>" .
	"</tr>";
}
$html .= "</tbody> </table> </body>" .
"</html>";

$dompdf = new DOMPDF();
$dompdf->load_html($html);

// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Laporan Pengaduan " . $waktu . ".pdf");