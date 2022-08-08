<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Tampil User</li>
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
<h1>Tampilan Data user</h1>
<?php echo anchor('admin/formuser','Tambah user', array('class' =>'btn btn-danger' )) ?>
<br/>
<?php if($this->session->flashdata('info')){?>
  <div class="alert alert-info" role="alert">
      <?php echo $this->session->flashdata('info') ?>
</div>
    <?php } ?>
  <table class="table table-responsive-sm table-hover table-outline mb-0">
  <thead class="thead-light">
    <tr><th>NO</th><th>Nama user</th><th>Username</th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php
        if ($tuser->num_rows() > 0) {
            $no=1;
            foreach($tuser->result_object() as $tm){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tm->nama_user; ?></td>
                <td><?php echo $tm->username; ?></td>
                <td>
                <?php echo anchor('Admin/hapususer/'.$tm->id_user,' HAPUS ',
                array( 'class' =>'btn btn-primary','onclick'=>'return confirm(\'apakah data mau dihapus\')')) ?> |
                <?php echo anchor('Admin/formedituser/'.$tm->id_user,' EDIT ',array('class' =>'btn btn-success' )) ?>
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
            <tbody>
            <tr>
                <td colspan="5"  align="center">Data tidak ada</td>
            </tr>
            </tbody>
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
