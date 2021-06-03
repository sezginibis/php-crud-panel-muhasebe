<?php 
require_once 'header.php';
require_once 'sidebar.php'; 
?>


<div class="content-wrapper">
    <section class="content">
    <div class="row">
    <div class="card-body">
    <?php
if (@$_GET['giris']=="ok") { ?>
<div class="alert alert-success alert-dismissible" role="alert" auto-close="3000"><p class="text-center">Sisteme başarıyla giriş yaptınız.</p></div>
<?php } ?>

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><a href="sayfa.php?sayfa=masraflar"><i class="fas fa-minus-square"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="sayfa.php?sayfa=masraflar">Masraflar</a></span>
                <span class="info-box-number">
                    <?php 
                    $sql = "SELECT count(*) FROM masraflar WHERE masraf_id = masraf_id"; 
                    $result = $baglan->prepare($sql); 
                    $result->execute([$sql]); 
                    $number_of_rows = $result->fetchColumn(); 
                    ?>
                    <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><a href="sayfa.php?sayfa=odemeler"><i class="fas fa-minus-square"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="sayfa.php?sayfa=odemeler">Ödemeler</a></span>
                <span class="info-box-number">
                        <?php 
                        $sql = "SELECT count(*) FROM odemeler WHERE odeme_id = odeme_id"; 
                        $result = $baglan->prepare($sql); 
                        $result->execute([$sql]); 
                        $number_of_rows = $result->fetchColumn(); 
                        ?>
                        <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><a href="sayfa.php?sayfa=calisanlar"><i class="fas fa-user-plus"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="sayfa.php?sayfa=calisanlar">Çalışanlar</a></span>
                <span class="info-box-number">
                        <?php 
                        $sql = "SELECT count(*) FROM calisanlar WHERE calisan_id = calisan_id"; 
                        $result = $baglan->prepare($sql); 
                        $result->execute([$sql]); 
                        $number_of_rows = $result->fetchColumn(); 
                        ?>
                        <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><a href="sayfa.php?sayfa=satislar"><i class="fas fa-plus-square"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="sayfa.php?sayfa=satislar">Satışlar</a></span>
                <span class="info-box-number">
                    <?php 
                    $sql = "SELECT count(*) FROM satislar WHERE satis_id = satis_id"; 
                    $result = $baglan->prepare($sql); 
                    $result->execute([$sql]); 
                    $number_of_rows = $result->fetchColumn(); 
                    ?>
                    <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><a href="sayfa.php?sayfa=alacaklar"><i class="fas fa-plus-square"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="sayfa.php?sayfa=alacaklar">Alacaklar</a></span>
                <span class="info-box-number">
                        <?php 
                        $sql = "SELECT count(*) FROM alacaklar WHERE alacak_id = alacak_id"; 
                        $result = $baglan->prepare($sql); 
                        $result->execute([$sql]); 
                        $number_of_rows = $result->fetchColumn(); 
                        ?>
                        <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><a href="nakit.php"><i class="fas fa-money-check-alt"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="nakit.php">Nakit Akışı</a></span>
                <span class="info-box-number">
                        <?php 
                        $sql = "SELECT count(*) FROM nakit WHERE nakit_id = nakit_id"; 
                        $result = $baglan->prepare($sql); 
                        $result->execute([$sql]); 
                        $number_of_rows = $result->fetchColumn(); 
                        ?>
                        <?php echo $number_of_rows; ?> kayıt
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    </div>
    </section>
</div>

<?php 
require_once 'footer.php'; 
?>