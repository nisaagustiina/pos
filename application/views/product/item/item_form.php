<section class="content-header">
      <h1>
        Items
        <small>Item Barang</small>
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
                <h3 class="box-title"><?=ucfirst($page)?> Item</h3>
                <div class="pull-right">
                    <a href="<?= site_url('item')?>" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <?php echo form_open_multipart('item/process')?>
                            <input type="hidden" name="id" value="<?= $row->id_item?>" >
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode"  class="form-control" id="barcode" value="<?= $row->barcode?>" required >
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" name="nama"  class="form-control" id="nama" value="<?= $row->nama?>" required >
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="category" id="" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach($category->result() as $data) { ?>
                                        <option value="<?=$data->id_category?>" <?=$data->id_category == $row->id_category ? "selected" : null ?>><?=$data->nama?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Satuan</label>
                                <?= form_dropdown('unit',$unit,$selectedunit,['class'=>'form-control','required' => 'required'])?>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga"  class="form-control" id="harga" value="<?= $row->harga?>" required >
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <?php if($page == 'edit') {
                                    if($row->image!=null){ ?>
                                        <div style="margin-bottom:5px">
                                        <img src="<?=base_url('uploads/product/').$row->image?>" style="width:80px" alt="">
                                        </div>
                                    <?php }
                                } ?>
                                <input type="file" name="image"  class="form-control" id="image" >
                                <small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
                            </div>
                            <div class="form-group">
                            <label for="level"></label>
                             
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-xs"><i class="fa fa-paper-plane"></i> Save</button>  
                                <button type="reset" class="btn btn-default btn-xs"> Reset</button>
                            
                            <div>
                            </div>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </section>