<section class="content-header">
      <h1>
        Stock Out
        <small>Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Stock Out</a></li>
        <li><a href="#">Add Stock</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Add Stock</h3>
                <div class="pull-right">
                    <a href="<?= site_url('stock/out')?>" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <form action="<?= site_url('stock/process')?>" method="post"">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" name="date"  class="form-control" id="date" value="<?= date('Y-m-d')?>" required>
                            </div>
                            <div>
                            <label for="barcode">Barcode</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <input type="hidden" name="id_item" id="id_item"  >
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" name="nama"  class="form-control" id="nama" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                    <label for="unit">Satuan</label>
                                    <input type="text" name="unit" value="-"  class="form-control" id="unit" readonly>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" value="-"  class="form-control" id="stok" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail">Info</label>
                                <input type="text" name="detail"  class="form-control" id="detail" placeholder="Rusak/Kembali">
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" name="qty"  class="form-control" id="qty" required>
                            </div>
                            <button type="submit" name="out_add" class="btn btn-success btn-xs"><i class="fa fa-paper-plane"></i> Save</button>  
                            <button type="reset" class="btn btn-default btn-xs"> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Select Product</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="tabel">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($item as $i){
                            ?>
                            <tr>
                                <td><?=$i->barcode?></td>
                                <td><?=$i->nama?></td>
                                <td><?=$i->nama_unit?></td>
                                <td><?=format_rp($i->harga)?></td>
                                <td><?=$i->stok?></td>
                                <td>
                                    <button class="btn btn-info btn-xs" id="select" 
                                    data-id_item="<?=$i->id_item?>"
                                    data-barcode="<?=$i->barcode?>"
                                    data-nama="<?=$i->nama?>"
                                    data-unit="<?=$i->nama_unit?>"
                                    data-stok="<?=$i->stok?>">
                                    <i class="fa fa-check"> Select</i> 
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click','#select',function(){
                var id_item = $(this).data('id_item');
                var barcode = $(this).data('barcode');
                var nama = $(this).data('nama');
                var unit = $(this).data('unit');
                var stok = $(this).data('stok');
                $('#id_item').val(id_item);
                $('#barcode').val(barcode);
                $('#nama').val(nama);
                $('#unit').val(unit);
                $('#stok').val(stok);
                $('#modal-item').modal('hide');
            })
        })
    </script>