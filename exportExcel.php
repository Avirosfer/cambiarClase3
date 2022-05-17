<?

include 'conexion.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST["oculto"]))
{
    $temporary_html_file = './tmp_html/' . time() . '.html';

    file_put_contents($temporary_html_file, $_POST["oculto"]);
    $reader = IOFactory::createReader('Html');
    $spreadsheet = $reader->load($temporary_html_file);

    $write= IOFactory::createWriter($spreadsheet, 'Xlsx');

    $filename = time() . '.xlsx';

    $writer->save($filename);

    header('Content-Type: application/x-www-form-urlencoded');

    header('Content-Transfer-Encoding: Binary');

    header("Content-disposition: attachment; filename=\"".$file_name."\"");

    readfile($filename);

    unlink($temporary_html_file);

    unlink($filename);

    exit;

}



?>