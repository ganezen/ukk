<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Transaksi</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <a class="btn" href="#">
                <i class="icon-speech"></i>
              </a>
            </div>
          </li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-6">
                <div class="row">
            <!-- Awal Tempat transksi-->
            <?php
            foreach($tmasakan->result_object() as $tm){
            ?>
               <!-- Awal Tempat Masak--> 
         <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                  <div class="brand-card-header bg-twitter">
                    <div class="chart-wrapper text-center">
                      <h4><?php echo $tm->nama_masakan; ?></h4><p align="center">
                      <?php 
                        $options = array(
                            'pesan'         => 'pesan',
                            'langsung'      => 'langsung',
                        );
                        echo form_dropdown('status_masakan', $options,  $tm->status_masakan, array('class' =>' col-sm-9 form-control')); ?>
                        </p>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value"><?php echo 'Rp '.number_format($tm->harga) ?></div>
                      <div class="text-uppercase text-muted small">Harga</div>
                    </div>
                    <div>

                    <button class="tambah_beli btn btn-success" 
                    data-idmasakan="<?php echo $tm->id_masakan;?>" 
                    data-namamasakan="<?php echo $tm->nama_masakan;?>" 
                    data-hargamasakan="<?php echo $tm->harga;?>"
                    data-statusmasakan="<?php echo $tm->status_masakan;?>"
                    >Beli</button>

                    </div>
                  </div>
                </div>
              </div>
              <!-- Akhir Tempat Masak-->
              <?php
            } 
            ?>
            </div>
                </div> 
                <div class="col-sm-6">
                   <!-- Awal Keranjang-->
                   <?php echo form_open('Admin/simpantransaksi'); ?>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                  <div class="row">
                <div class="col-sm-12">
                <?php if($this->session->flashdata('info')){?>
  <div class="alert alert-warning" role="alert">
      <?php echo $this->session->flashdata('info') ?>
</div>
    <?php } ?>
                <!-- Invoice-->
              <div class="form-group">
                  <label for="name"><b>No Orders</b></label>
                  <?php echo form_input('no_orders',$orders, array('class'=>'form-control', 'placeholder'=>'Order','readOnly'=>'readOnly')); ?>
              </div>
            <!-- /Invoice-->
            <!-- No Meja-->
            <div class="form-group">
                  <label for="name"><b>No Meja</b></label>
                  <input type="number" name="no_meja" value="0" class="quantity form-control">
              </div>
            <!-- /No Meja-->
            <!-- Keterangan-->
            <div class="form-group">
                  <label for="name"><b>Keterangan</b></label>
                  <?php echo form_input('keterangan','-', array('class'=>'form-control', 'placeholder'=>'Isi Keterangan')); ?>
              </div>
            <!-- /keterangan-->
            <!-- Status Order-->
            <div class="form-group">
                  <label for="name"><b>Status Order</b></label>
                  
                  <?php 
                  $options = array(
                    'cash'         => 'Cash',
                    'kredit'           => 'Kredit',
                    );
                  echo form_dropdown('status_order',$options,'cash', array('class'=>'form-control', 'placeholder'=>'Isi Keterangan')); ?>
              </div>
            <!-- /status Order-->
            <!--id_user-->
            <?php echo form_hidden('id_user',$this->session->userdata('id_user')); ?>
                    <i class="fa fa-align-justify"></i> <h4>Table Keranjang</h4></div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>Nama Masakan</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Status </th>
                          <th>Sub Total</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="tampil_keranjang">
                        
                      </tbody>
                    </table>
                    <?php echo form_submit('btnsimpan','SIMPAN',array('class' =>'btn btn-danger'));?>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
              <!-- Akhir Keranjang--> 
            <!-- Akhir Tempat transaksi--> 
            </div>  
              </div>
          </div>
        </div>
      </main>
        <!-- AKHIR MAIN-->
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-2.2.3.min.js');?>">
</script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.tambah_beli').click(function(){
			var masakan_id    = $(this).data("idmasakan");
			var masakan_nama  = $(this).data("namamasakan");
      var masakan_harga = $(this).data("hargamasakan");
     var status_masakan = $(this).data("statusmasakan");
			$.ajax({
				url : "<?php echo base_url();?>index.php/admin/simpan_keranjang",
				method : "POST",
				data : {id_masakan: masakan_id, nama_masakan: masakan_nama, harga_masakan: masakan_harga, status_masakan:status_masakan},
				success: function(data){
					$('#tampil_keranjang').html(data);
				}
			});
    });

    // panggil data tampil keranjang
    $('#tampil_keranjang').load("<?php echo base_url();?>index.php/admin/load_keranjang");
    $(document).on('click','.hapus_cart',function(){
			var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
			$.ajax({
				url : "<?php echo base_url();?>index.php/admin/hapus_cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#tampil_keranjang').html(data);
				}
			});
		});

  });
</script>