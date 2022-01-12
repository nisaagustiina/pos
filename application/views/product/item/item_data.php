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
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Items</h3>
                <div class="pull-right">
                    <a href="<?= site_url('item/add')?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Image</th>
                        <th class="text-center">Action <i class="fa fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php
                        $no = 1;
                        foreach ($row->result() as $data) {
                        ?>
                        <tr>
                        <td style="width:5%"><?= $no++?></td>
                        <td><?= $data->barcode?><br>
                        <a href="<?= site_url('item/barcode_qrcode/'.$data->id_item)?>" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i> <i class="fa fa-qrcode"></i></a>
                        </td>
                        <td><?= $data->nama?></td>
                        <td><?= $data->nama_category?></td>
                        <td><?= $data->nama_unit?></td>
                        <td><?= $data->harga?></td>
                        <td><?= $data->stok?></td>
                        <td>
                            <?php if($data->image != null) { ?>
                            <img src="<?=base_url('uploads/product/').$data->image?>" style="width:100px" alt="">
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= site_url('item/edit/'.$data->id_item)?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                            <a href="<?= site_url('item/del/'.$data->id_item)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('#tabel1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?=site_url('item/get_ajax')?>",
                    "type": "POST"
                },
                "columnDefs":[
                    {
                    "targets": [5,6],
                    "className": 'text-right'
                    },
                    {
                    "targets": [0,7,-1],
                    "orderable": false,
                    },
                ],
                "order":  []
            })
        })
    </script>