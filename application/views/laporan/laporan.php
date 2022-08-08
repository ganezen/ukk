<?php $this->load->view('template/header'); ?>
 <!-- AWAL MAIN-->
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Laporan</li>
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
               <h1>Laporan</h1>
  <table class="table table-responsive-sm table-hover table-outline mb-0">
  <thead class="thead-light">
    <tr><th>NO</th><th>No Order</th><th> Nama User</th><th>Tanggal</th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php
        if ($tlaporan->num_rows() > 0) {
            $no=1;
            foreach($tlaporan->result_object() as $tl){
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tl->id_orders; ?></td>
                <td><?php echo $tl->nama_user; ?></td>
                <td><?php echo longdate_indo($tl->tanggal); ?></td>
                <td>
                <?php echo anchor('Admin/laporantransaksi/'.$tl->id_orders,' CETAK ',
                array( 'class' =>'btn btn-primary','onclick'=>'return confirm(\'apakah data mau di cetak\')')) ?>
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

