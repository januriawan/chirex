<title>Keterangan - Chirexs 1.0</title>
<h2 class='text text-primary'>Keterangan</h2>
<hr>
<div class="row">

  <?php
  $hasil = mysqli_query($conn,"SELECT * FROM post ORDER BY kode_post");
  while ($r = mysqli_fetch_array($hasil)) {
      ?>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-right">
        <div class="card text-center">
          <img class="card-img-top img-bordered-sm" src="<?php echo 'gambar/' . $r['gambar']; ?>" alt="" width="100%" height="200">
          <div class="card-block">
            <h4 class="card-title"><h3 class="bg-keterangan"><?php echo $r['nama_post']; ?></h3>
              <a class="btn bg-maroon btn-flat margin" href="#" data-toggle="modal" data-target="#modal<?php echo $r['kode_post']; ?>"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Detail</a>
              <a class="btn bg-olive btn-flat margin" href="#" data-toggle="modal" data-target="#modaltindakan<?php echo $r['kode_post']; ?>"><i class="fa fa-quote-right" aria-hidden="true"></i> Saran</a>
          </div>
        </div>
        <hr>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modal<?php echo $r['kode_post'];?>" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header detail-ket">
              <button type="button" class="close" data-dismiss="modal" style="opacity: .99;color: #fff;">&times;</button>
              <h4 class="modal-title text text-ket"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Detail Untuk <?php echo $r[nama_post]; ?></h4>
            </div>
            <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
              <p><?php echo $r[det_post]; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="modaltindakan<?php echo $r['kode_post'];?>" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header saran-ket">
              <button type="button" class="close" data-dismiss="modal" style="opacity: .99;color: #fff;">&times;</button>
              <h4 class="modal-title text text-ket"><i class="fa fa-quote-right" aria-hidden="true"></i> Saran Untuk <?php echo $r[nama_post]; ?></h4>
            </div>
            <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
              <p><?php echo $r[srn_post]; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>



  <?php } ?>



</div>
