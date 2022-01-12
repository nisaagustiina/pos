<?php
if($this->session->has_userdata('save')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i><?=$this->session->flashdata('save')?>
    </div>
<?php } ?>
 <!-- <?php if($this->session->has_userdata('del')){ ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i><?=$this->session->flashdata('del')?>
    </div>
<?php } ?> -->
<?php if($this->session->has_userdata('err')){ ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-warning"></i><?=strip_tags(str_replace('</p>','',$this->session->flashdata('err')))?>
    </div>
<?php } ?>