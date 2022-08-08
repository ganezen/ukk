<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Form User</li>
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
<?php echo form_open('Admin/simpanuser'); ?>
<h2>Form user</h2>
<?php if(validation_errors()){ ?>
    <?php echo validation_errors(); ?>
  <?php } ?>
    <div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Nama User</label>
  <?php echo form_input('nama_user','', array('class'=>'form-control', 'placeholder'=>'Isi Nama user')); ?></td>
    </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Username</label>
                  <?php echo form_input('username','', array('class'=>'form-control', 'placeholder'=>'Isi Username')); ?></td>
                  </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Password</label>
                  <?php echo form_password('password','', array('class'=>'form-control', 'placeholder'=>'Isi Passwrod')); ?>   </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Level</label>
                  <?php 

echo form_dropdown('level', $combo, ' ',array('class'=>'form-control')); ?></td>
   </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name"></label>
    <?php echo form_submit('btnsimpan','SIMPAN',array('class' =>'btn btn-danger'));?>
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

