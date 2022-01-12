    <section class="content-header">
      <h1>
        Suppliers
        <small>Pemasok Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Suppliers</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Suppliers</h3>
                <div class="pull-right">
                    <a href="<?= site_url('supplier/add')?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
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
                        <td><?= $data->no_telp?></td>
                        <td><?= $data->alamat?></td>
                        <td><?= $data->deskripsi?></td>
                        <td class="text-center">
                            <a href="<?= site_url('supplier/edit/'.$data->id_supplier)?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                            <!-- <a href="<?= site_url('supplier/del/'.$data->id_supplier)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td> -->
                            <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= site_url('supplier/del/'.$data->id_supplier)?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalDelete">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Yakin akan menghapus data ini</h4>
                </div>
                <div class="modal-footer">
                    <form id="formDelete" method="post" action="">
                        <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>