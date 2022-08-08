<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Form Edit Level</li>
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
<?php echo form_open('Admin/editlevel'); ?>
<?php echo form_hidden('id_level',$editlevel->id_level); ?>
<h2>Form Edit Level</h2>

<?php if(validation_errors()){ ?>
    <?php echo validation_errors(); ?>
  <?php } ?>
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">Nama Level</label>
<td> <?php echo form_input('nama_level',$editlevel->nama_level, array('class'=>'form-control', 'placeholder'=>'Isi Nama Level')); ?>
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
