<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Tampil Level</li>
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
               <h1>Tampilan Data level</h1>
<?php echo anchor('admin/formlevel','Tambah Level', array('class' =>'btn btn-danger' )) ?>
<br/>
<?php if($this->session->flashdata('info')){?>
  <div class="alert alert-danger" role="alert">
      <?php echo $this->session->flashdata('info') ?>
</div>
    <?php } ?>

  <table class="table table-responsive-sm table-hover table-outline mb-0">
  <thead class="thead-light">
    <tr><th>NO</th><th>Level</th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php
        if ($tlevel->num_rows() > 0) {
            $no=1;
            foreach($tlevel->result_object() as $ts){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $ts->nama_level; ?></td>
                <td>
                <?php echo anchor('Admin/hapuslevel/'.$ts->id_level,' HAPUS ',
                array( 'class' =>'btn btn-primary','onclick'=>'return confirm(\'apakah data mau dihapus\')')) ?> |
                <?php echo anchor('Admin/formeditlevel/'.$ts->id_level,' EDIT ',array('class' =>'btn btn-success' )) ?>
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
                <td colspan="3"  align="center">Data tidak ada</td>
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

