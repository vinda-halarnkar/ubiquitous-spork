<?php

use setasign\Fpdi\PdfReader\PageBoundaries;
use Smalot\PdfParser\Parser;

require_once __DIR__ . '/vendor/autoload.php';
header("Content-Type: application/pdf");

$storeLocation = 'Final.pdf';
$tempLocation  = 'temp.pdf';
$tempLocation2  = 'temp.pdf';
$linksArr = [
                'https://btesimages.s3.amazonaws.com/PdfLabelFiles/404-9012833-0137142_shippinglabel.pdf',
                'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD107312205540085000-1731220554008500.pdf',
            ];

$j=1;
global $ordY;
global $ordX;
$ordY = $ordX= 10;
$epdf = new \setasign\Fpdi\Fpdi();
foreach ($linksArr as $key => $pdfLink)
{
    $tempLocation  = 'temp_'.$key.'.pdf';

    /* get the contents of pdf file */
    $content = null;
    $content = file_get_contents($pdfLink);
    file_put_contents($tempLocation, $content);

    $pages_count = $epdf->setSourceFile($tempLocation);

    /* add all pages */
    for($i = 1; $i <= $pages_count; $i++)
    {
        $ordY = $ordY * $j;
        $pageId = $epdf->importPage($i, setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
        $epdf->AddPage();
        $epdf->useImportedPage($pageId,0, $ordY, null, null, true);
        $j++;
    }
    unlink($tempLocation);    
}

$epdf->Output('F', $storeLocation);

die();

?>


