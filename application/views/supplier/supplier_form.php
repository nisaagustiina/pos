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
                <h3 class="box-title"><?=ucfirst($page)?> Supplier</h3>
                <div class="pull-right">
                    <a href="<?= site_url('supplier')?>" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?= site_url('supplier/process')?>" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="<?= $row->id_supplier?>" >
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama*</label>
                                <div class="col-sm-5">
                                <input type="text" name="nama"  class="form-control" id="nama" value="<?= $row->nama?>" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="col-sm-3 control-label">No. Telp*</label>
                                <div class="col-sm-5">
                                <input type="text" name="no_telp"  class="form-control" id="no_telp" value="<?= $row->no_telp?>" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat*</label>
                                <div class="col-sm-5">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" required><?= $row->alamat?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="col-sm-3 control-label">Deskripsi</label>
                                <div class="col-sm-5">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3" ><?= $row->deskripsi?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="level" class="col-sm-3 control-label"></label>
                            <div class="col-sm-5"> 
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-xs"><i class="fa fa-paper-plane"></i> Save</button>  
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