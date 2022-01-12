<section class="content-header">
      <h1>
        Stock Out
        <small>Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Stock Out</a></li>
      </ol>
    </section>

    <section class="content">
    <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Stock Out</h3>
                <div class="pull-right">
                    <a href="<?= site_url('stock/out/add')?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Stock</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Info</th>
                        <th>Tanggal</th>
                        <th class="text-center">Action <i class="fa fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row as $data) {
                        ?>
                        <tr>
                        <td style="width:5%"><?= $no++?></td>
                        <td><?= $data->barcode?></td>
                        <td><?= $data->nama_barang?></td>
                        <td><?= $data->qty?></td>
                        <td><?= $data->detail?></td>
                        <td><?= indo_date($data->date)?></td>
                        <td class="text-center">
                            <a id="detail_barang" class="btn btn-default btn-xs"
                            data-toggle="modal" data-target="#modal-detail" 
                            data-barcode="<?=$data->barcode?>"
                            data-nama_barang="<?=$data->nama_barang?>"
                            data-detail="<?=$data->detail?>"
                            data-qty="<?=$data->qty?>"
                            data-date="<?=indo_date($data->date)?>"><i class="fa fa-eye"></i> Detail</a>
                            <a href="<?= site_url('stock/out/del/'.$data->id_stock.'/'.$data->id_item)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Stock Out Detail</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="tabel">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <td><span id="barcode"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td><span id="nama_barang"></span></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><span id="detail"></span></td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td><span id="qty"></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><span id="date"></span></td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click','#detail_barang',function(){
                var barcode = $(this).data('barcode');
                var nama_barang = $(this).data('nama_barang');
                var detail = $(this).data('detail');
                var nama_supplier = $(this).data('nama_supplier');
                var qty = $(this).data('qty');
                var date = $(this).data('date');
                $('#barcode').text(barcode);
                $('#nama_barang').text(nama_barang);
                $('#detail').text(detail);
                $('#nama_supplier').text(nama_supplier);
                $('#qty').text(qty);
                $('#date').text(date);
            })
        })
    </script>