<section class="content-header">
      <h1>
        Items
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Items</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Barcode Generator <i class="fa fa-barcode"></i></h3>
                <div class="pull-right">
                <a href="<?= site_url('item/barcode_print/'.$row->id_item)?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Print</a>
                <a href="<?= site_url('item')?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> Back</a>

                </div>
            </div>
            <div class="box-body">
                <?php
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,'.base64_encode($generator->getBarcode($row->barcode,$generator::TYPE_CODE_128)).'" style="width:200px">';
                ?>
                <br>
                <?=$row->barcode?>
                <br><br>
                
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
            </div>
            <div class="box-body">
            <?php
               $qrCode = new Endroid\QrCode\QrCode($row->barcode);
               $qrCode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');
            ?> 
            <img src="<?=base_url('uploads/qr-code/item-'.$row->barcode.'.png')?>" style="width:200px">
            <br>
            <?=$row->barcode?>
            </div>
        </div>
    </section>