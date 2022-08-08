<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Form Edit User</li>
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
<?php echo form_open('Admin/edituser'); ?>
<?php echo form_hidden('id_user',$edituser->id_user); ?>
<h2>Form Edit user</h2>
<?php if(validation_errors()){ ?>
  <div class="alert alert-info" role="alert">
    <?php echo validation_errors(); ?>
</div>
  <?php } ?>
  <div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Nama User</label>
  <?php echo form_input('nama_user',$edituser->nama_user, array('class'=>'form-control', 'placeholder'=>'Isi Nama user')); ?></td>
    </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Username</label>
                  <?php echo form_input('username',$edituser->username, array('class'=>'form-control', 'placeholder'=>'Isi Username')); ?></td>
                  </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Password*)</label>
                  <?php echo form_password('password','', array('class'=>'form-control', 'placeholder'=>'Isi Passwrod')); ?>   </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name">Level</label>
                  <?php 

echo form_dropdown('level', $combo,$edituser->id_level,array('class'=>'form-control')); ?></td>
   </div>
  </div>
</div>
<div class="row">
        <div class="col-sm-12">
              <div class="form-group">
                  <label for="name"></label>
    <?php echo form_submit('btnedit','EDIT',array('class' =>'btn btn-danger'));?>
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

