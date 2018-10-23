<?php
 ob_start();
//  Ler PDF

//$file = './path/to/the.pdf';
//$file_pdf = 'cotodeboi.pdf';
if (empty($_GET['file'])) {
    die('Falta o registo de informação do file');
}
$file_pdf = $_GET['file'];
$path = '../pdf/';
$file = $path.$file_pdf;
$filename = $file_pdf; /* Note: Always use .pdf at the end. */
echo "File = $file </p>";
if (file_exists($file)) {
//    echo "O arquivo $filename existe $_GET['file']";
} else {
    die('Falta o file registado');;
}
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
echo "$filename";

@readfile($file);  // File com o Path
?>
