<?php

require_once __DIR__ . '/vendor/autoload.php';

use Spatie\Async\Pool;

$linksArr = [
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD107312205540085000-1731220554008500.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/404-9012833-0137142_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-5056321-1155509_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-4455185-5905913_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-5506700-5794751_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-4536622-4767528_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-9149230-0170747_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-9633108-6061921_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539270821-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539288415-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19807895696-SLP1140616899.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19807845682-SLP1140616862.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19807815705-SLP1140616841.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD207311672227236000-2731167222723602.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD507311505021513000-5731150502151300.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-6599938-0889938_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/404-7625042-4821125_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539129367-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539114325-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-0303287-1511553_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-2326605-6486768_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-5395774-3458768_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD507311467562657000-5731146756265700.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-9537812-3735564_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-6492784-8589133_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-0857298-7415525_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539053587-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2539010985-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538984393-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538958727-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD607311237362051000-6731123736205100.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19805275520-SLP1140421224.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19805014659-SLP1140406657.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19803429605-SLP1140286741.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-7456146-3809129_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538921681-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538853123-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-9284133-0781116_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19801906394-SLP1140178106.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-5670213-6464363_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/171-0998013-5440314_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-3428884-0889148_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/403-3179019-2162765_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-2892189-3625157_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD107310867834425001-1731086783442500.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/402-9459255-6661948_shippinglabel.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538638382-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538630871-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538512662-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538508341-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/flipkartShippingLabel_OD107310694756347000-1731069475634700.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19799680099-SLP1140008175.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19799407603-SLP1139999699.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19798917481-SLP1139967832.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19798845649-SLP1139957984.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19799239237-SLP1139987041.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19798716880-SLP1139950403.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19787010456-SLP1139961489.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19797915979-SLP1139887878.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538385725-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538361501-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538330738-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/ebayShippinglabel_2538321921-15242.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/SnapDealLabel_19798049434-SLP1139897601.pdf',
            'https://btesimages.s3.amazonaws.com/PdfLabelFiles/jabong_161010359170961_ship_label_path.pdf'
        ];

$storeLocation = 'Final.pdf';
$date_start = date('Y-m-d H:i:s');
echo '\nScript Started '.date('Y-m-d H:i:s');

global $epdf;

$epdf = new \setasign\Fpdi\Fpdi();

echo '\nLoop Started '.date('Y-m-d H:i:s');

$pool = Pool::create();
$pdf = null;
foreach ($linksArr as $key => $pdfLink) {

    $pool[] = async(function () use ($pdfLink, $key) {

        $tempLocation  = 'temp_'.$key.'.pdf';
        file_put_contents($tempLocation, file_get_contents($pdfLink));
        return $tempLocation;
    })->then(function ($tempLocation) use (&$epdf) {

        /* @var \setasign\Fpdi\Fpdi $epdf */
        $pages_count = $epdf->setSourceFile($tempLocation);
        for($i = 1; $i <= $pages_count; $i++)
        {
            $pageId = $epdf->importPage($i, setasign\Fpdi\PdfReader\PageBoundaries::MEDIA_BOX);
            $epdf->AddPage();
            $epdf->useImportedPage($pageId,0, 0 , null, null, true);
        }
        unlink($tempLocation);
    });
}
await($pool);

$epdf->Output('F', $storeLocation);

$date_end = date('Y-m-d H:i:s');

$timeFirst  = strtotime($date_start);
$timeSecond = strtotime($date_end);
$differenceInSeconds = $timeSecond - $timeFirst;

echo 'File generated in '.$differenceInSeconds.' seconds';
?>


