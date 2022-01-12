<section class="content-header">
      <h1>
        Customers
        <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customers</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Customers</h3>
                <div class="pull-right">
                    <a href="<?= site_url('customer/add')?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th class="text-center">Action <i class="fa fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $data) {
                        ?>
                        <tr>
                        <td style="width:5%"><?= $no++?></td>
                        <td><?= $data->nama?></td>
                        <td><?= $data->jenis_kelamin?></td>
                        <td><?= $data->no_telp?></td>
                        <td><?= $data->alamat?></td>
                        <td class="text-center">
                            <a href="<?= site_url('customer/edit/'.$data->id_customer)?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                            <a href="<?= site_url('customer/del/'.$data->id_customer)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function({
            $('#tabel2').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?=site_url('pelanggan/get_json')?>",
                    "type": "POST"
                },
                "column": [
                    {"data":"no",width:40"},
                    {"data":"nama",width:150"},
                    {"data":"jenis_kelamin",width:70"},
                    {"data":"no_telp",width:120"},
                    {"data":"alamat",width:150"},
                    {"data":"action",width:100"},
                ],
                "columnDefs":  [
                    {"targets":[0,5],"orderable":false},
                    {"targets":[2,1],"className":"text-center"}
                ]
            })
        }))
    </script>