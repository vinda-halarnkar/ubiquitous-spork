<?php

use Ubiquitous_Spork\Constant;

require_once __DIR__ . '/vendor/autoload.php';

header("Content-Type: application/pdf");

$linksArr = Constant::$linksArr;
$storeLocation = Constant::$storeLocation;

echo '\nScript Started '.date('Y-m-d H:i:s');

$epdf = new \setasign\Fpdi\Fpdi();

echo '\nLoop Started '.date('Y-m-d H:i:s');

foreach ($linksArr as $key => $pdfLink)
{

    $tempLocation  = 'temp_'.$key.'.pdf';

    echo $key.'Before file download '.date('Y-m-d H:i:s');;
    /* get the contents of pdf file */
    $result = file_put_contents($tempLocation, file_get_contents($pdfLink));
    echo $key.'After '.date('Y-m-d H:i:s');;

//    $pages_count = $epdf->setSourceFile($tempLocation);
    $pages_count = $epdf->setSourceFile(\setasign\Fpdi\PdfParser\StreamReader::createByString($pdfLink));
    /* add all pages */
    echo $key.'Before Loop '.date('Y-m-d H:i:s');;
    for($i = 1; $i <= $pages_count; $i++)
    {
        $pageId = $epdf->importPage($i, setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
        $epdf->AddPage();
        $epdf->useImportedPage($pageId,0, 0 , null, null, true);
    }
    echo $key.'After Loop '.date('Y-m-d H:i:s');;
    unlink($tempLocation);
die();
}
$epdf->Output('F', $storeLocation);

$date_end = date('Y-m-d H:i:s');

$timeFirst  = strtotime($date_start);
$timeSecond = strtotime($date_end);
$differenceInSeconds = $timeSecond - $timeFirst;

echo 'File generated in '.$differenceInSeconds.' seconds';

die();

?>


