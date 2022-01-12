<section class="content-header">
      <h1>
        Categories
        <small>Kategori Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Categories</a></li>
      </ol>
    </section>

    <section class="content">
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Categories</h3>
                <div class="pull-right">
                    <a href="<?= site_url('category/add')?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
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
                        <td class="text-center">
                            <a href="<?= site_url('category/edit/'.$data->id_category)?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                            <a href="<?= site_url('category/del/'.$data->id_category)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>