<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Form Edit Masakan</li>
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
               <!-- AWALAN KODING-->
<?php echo form_open('Admin/editmasakan'); ?>
<?php echo form_hidden('id_masakan',$editmasakan->id_masakan); ?>
<h2>Form Edit masakan</h2>
<?php if(validation_errors()){ ?>
    <?php echo validation_errors(); ?>
  <?php } ?>
  <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">Nama Masakan</label>
                           <?php echo form_input('nama_masakan',$editmasakan->nama_masakan, array('class'=>'form-control', 'placeholder'=>'Isi Nama masakan')); ?>
</div>
                    </div>
                         </div>
<div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">Harga Masakan</label>
<?php echo form_input('harga_masakan',$editmasakan->harga, array('class'=>'form-control', 'placeholder'=>'Isi Harga masakan')); ?>
</div>
                    </div>
                         </div>
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">Status Pesan</label>
                          <?php 
$options = array(
    'pesan'         => 'pesan',
    'langsung'           => 'langsung',
);
echo form_dropdown('status_masakan', $options, $editmasakan->status_masakan); ?>
                </div>
                    </div>
                         </div>
                <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name"></label>
    <?php echo form_submit('btedit','EDIT',array('class' =>'btn btn-danger'));?>
                </div>
                    </div>
                         </div>
<?php echo form_close(); ?>
<!-- AKHIR KODING-->
   
</div>
        </div>
      </main>
        <!-- AKHIR MAIN-->
<?php $this->load->view('template/footer'); ?>

