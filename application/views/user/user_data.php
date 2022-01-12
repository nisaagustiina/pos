    <section class="content-header">
      <h1>
        Users
        <small>Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Users</h3>
                <div class="pull-right">
                    <a href="<?= site_url('user/add')?>" class="btn btn-success btn-xs"><i class="fa fa-user-plus"></i> Create</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="tabel" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Level</th>
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
                        <td><?= $data->username?></td>
                        <td><?= $data->nama?></td>
                        <td><?= $data->alamat?></td>
                        <td><?= $data->level?></td>
                        <td class="text-center">
                        <form action="<?=site_url('user/del')?>" method="post">
                            <a href="<?= site_url('user/edit/'.$data->id_user)?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                            <input type="hidden" value="<?=$data->id_user?>" name="id_user">
                            <button onclick="return confirm('Apakah yakin akan menghapus data ini?')" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></td>
                        </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>