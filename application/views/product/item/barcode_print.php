<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?=$row->barcode?></title>
</head>
<body>
    <?php   
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
         echo '<img src="data:image/png;base64,'.base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)).'" style="width:300px">';
    ?>
    <br>
    <?=$row->barcode?><br><br>
    <img src="uploads/qr-code/item-<?=$row->barcode?>.png" style="width:250px">

</body>
</html>