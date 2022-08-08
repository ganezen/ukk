<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Tampil Masakan</li>
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
<h1>Tampilan Data Masakan</h1>
<?php echo anchor('admin/formmasakan','Tambah Masakan', array('class' =>'btn btn-danger' )) ?>
<br/>
<?php if($this->session->flashdata('info')){?>
  <div class="alert alert-info" role="alert">
      <?php echo $this->session->flashdata('info') ?>
</div>
    <?php } ?>

<table class="table table-responsive-sm table-hover table-outline mb-0">
  <thead class="thead-light">
    <tr><th>NO</th><th>Nama Masakan</th><th>Harga</th><th>status Masakan</th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php
        if ($tmasakan->num_rows() > 0) {
            $no=1;
            foreach($tmasakan->result_object() as $tm){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tm->nama_masakan; ?></td>
                <td><?php echo $tm->harga; ?></td>
                <td><?php echo $tm->status_masakan; ?></td>
                <td>
                <?php echo anchor('Admin/hapusmasakan/'.$tm->id_masakan,' HAPUS ',
                array('class' =>'btn btn-primary', 'onclick'=>'return confirm(\'apakah data mau dihapus\')')) ?> |
                <?php echo anchor('Admin/formeditmasakan/'.$tm->id_masakan,' EDIT ',array('class' =>'btn btn-success' )) ?>
                </td>
            </tr>
            <?php
            $no++;
            } 
            ?>
            </tbody>
        <?php 
        } else {
           ?>
            <tr>
            <tbody>
                <td colspan="5" align="center">Data tidak ada</td>
            </tbody>
            </tr>
           <?php 
        }   
    ?>
</table>
<!-- AKHIR KODING-->
   
</div>
        </div>
      </main>
        <!-- AKHIR MAIN-->
<?php $this->load->view('template/footer'); ?>
