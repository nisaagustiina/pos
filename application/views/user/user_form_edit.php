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
                <h3 class="box-title">Edit User</h3>
                <div class="pull-right">
                    <a href="<?= site_url('user')?>" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <!-- <?= validation_errors() ?> -->
                        <form action="" method="post" class="form-horizontal">
                            <input type="hidden" name="id_user" value="<?=$row->id_user?>" id="">
                            <div class="form-group <?=form_error('nama') ? 'has-error' : null?>">
                                <label for="nama" class="col-sm-3 control-label">Nama*</label>
                                <div class="col-sm-5">
                                <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $row->nama?>" class="form-control" id="nama" >
                                <?=form_error('nama')?>
                                </div>
                            </div>
                            <div class="form-group <?=form_error('user') ? 'has-error' : null?>">
                                <label for="user" class="col-sm-3 control-label">Username*</label>
                                <div class="col-sm-5">
                                <input type="text" name="user" value="<?=$this->input->post('user') ?? $row->username?>" class="form-control" id="user" >
                                <?=form_error('user')?>
                                </div>
                            </div>
                            <div class="form-group <?=form_error('pass') ? 'has-error' : null?>">
                                <label for="pass" class="col-sm-3 control-label">Password</small></label>
                                <div class="col-sm-5"><small>(Biarkan kosong jika tidak diganti)
                                <input type="password" name="pass" value="<?=$this->input->post('pass')?>" class="form-control" id="pass" >
                                <?=form_error('pass')?>
                                </div>
                            </div>
                            <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
                                <label for="passconf" class="col-sm-3 control-label">Konfirmasi Password</label>
                                <div class="col-sm-5">
                                <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control" id="passconf" >
                                <?=form_error('passconf')?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-5">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2"><?=$this->input->post('alamat') ?? $row->alamat?></textarea>
                                </div>
                            </div>
                            <div class="form-group <?=form_error('level') ? 'has-error' : null?>">
                                <label for="level" class="col-sm-3 control-label">Level*</label>
                                <div class="col-sm-5">
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $level = $this->input->post('level') ?? $row->level ?>
                                    <option value="1" <?= $level == 1 ? 'selected' : null?>>Admin</option>
                                    <option value="2" <?= $level == 2 ? 'selected' : null?>>Kasir</option>
                                </select>
                                <?=form_error('level')?>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="level" class="col-sm-3 control-label"></label>
                            <div class="col-sm-5"> 
                                <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-paper-plane"></i> Save</button>  
                                <button type="reset" class="btn btn-default btn-xs"> Reset</button>
                            </div>
                            <div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>