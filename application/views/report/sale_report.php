<section class="content-header">
      <h1>
        Sales Report
        <small>Laporan Penjualan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li><a href="#">Sale</a></li>
      </ol>
    </section>

    <section class="content">
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Penjualan</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Grand Total</th>
                        <th class="text-center">Action <i class="fa fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // $this->uri->segment(3) ?  $this->uri->segment(3)+1:1;
                        foreach ($row->result() as $data) {
                        ?>
                        <tr>
                        <td style="width:5%"><?= $no++?></td>
                        <td><?= $data->invoice?></td>
                        <td><?= indo_date($data->date)?></td>
                        <td><?= $data->nama_customer?></td>
                        <td><?= format_rp($data->total_harga)?></td>
                        <td><?= format_rp($data->diskon)?></td>
                        <td><?= format_rp($data->final_harga)?></td>
                        <td class="text-center">
                            <a href="" class="btn btn-default btn-xs"><i class="fa fa-print"></i> Print</a>
                            <a href="<?= site_url('sale/edit/'.$data->id_sale)?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                            <a href="<?= site_url('sale/del/'.$data->id_sale)?>" onclick="return confirm('Apakah yakin akan menghapus data ini?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <?= $pagination?>
            </ul>
        </div> -->
    </section>
    <!-- <script>
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
    </script> -->

    