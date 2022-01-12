<section class="content-header">
      <h1>
        Sales
        <small>Penjualan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaction</a></li>
        <li><a href="#">Sales</a></li>
      </ol>
    </section>

    <section class="content">
    
        <div class="row">
            
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;width:30%">
                                    <label for="user">Kasir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" name="user" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="customer">Customer</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="customer" id="customer" class="form-control">
                                            <option value="">Umum</option>
                                            <?php foreach ($customer as $key => $i) {?>
                                               <option value="<?=$i->id_customer?>"><?=$i->nama?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width=30%">
                                    <label for="barcode">Barcode</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" name="" id="id_item">
                                        <input type="hidden" name="" id="harga">
                                        <input type="hidden" name="" id="stok">
                                        <input type="text" id="barcode" class="form-control" autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="qty">Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" id="qty"  value="1" min="1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="button" id="add_cart" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div> 
        </div>
        </div>
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <div align="right">
                            <h4>Invoice <b><span id="invoice"><?=$invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th width="10%">Diskon</th>
                                    <th width="15%">Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="cart_table">
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada Barang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width=30%">
                                    <label for="sub_total">Subtotal</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="sub_total" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="diskon">Diskon</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" id="diskon"  value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="grand_total">Grand Total</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" id="grand_total" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div>
            </div>
        </div>
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width=30%">
                                    <label for="cash">Cash</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="cash" value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="change">Change</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="" id="change" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div>
            </div>
        </div>
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="note">Note</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea name="" id="note" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div>
            </div>
        </div>
            <div class="col-lg-3">
                <div>
                    <button id="cancel_payment" class="btn btn-flat btn-warning"><i class="fa  fa-refresh"></i> Cancel</button><br><br>
                    <button id="process_payment" class="btn btn-flat btn-lg btn-success"><i class="fa  fa-paper-plane-o"></i> Process Payment</button>
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