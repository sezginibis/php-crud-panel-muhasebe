<?php 
require_once 'header.php';
require_once 'sidebar.php'; 
?>


<div class="content-wrapper">
    <section class="content">
    <br>
    <div class="row">
    <div class="col-12">
            <?php if ($_GET['sayfa']=="masraf_ekle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yeni masraf ekle</h3>
                <div class="card-tools">
                <a href="sayfa.php?sayfa=masraflar"><button type="submit" class="btn btn-info">Masraflar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="masrafbaslik">Başlık</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Masrafın başlığı" id="masrafbaslik" required>
                  </div>
                  <div class="form-group">
                    <label for="masrafaciklama">Açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Masrafın açıklaması" id="masrafaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="masraftarih">Tarih</label>
                    <input type="date" class="form-control" name="zaman" id="masraftarih" required>
                  </div>
                  <div class="form-group">
                    <label for="masrafkategori">Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Masrafın kategorisi" id="masrafkategori" required>
                  </div>
                  <div class="form-group">
                    <label for="masraftutar">Tutarı</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Masrafın parasal miktarı" id="masraftutar" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="masraf_ekle">Masraf Ekle</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <?php } elseif($_GET['sayfa']=="odeme_ekle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yeni ödeme ekle</h3>
                <div class="card-tools">
                <a href="sayfa.php?sayfa=odemeler"><button type="submit" class="btn btn-info">Ödemeler listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="odemebaslik">Başlık</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Ödemenin başlığı" id="odemebaslik" required>
                  </div>
                  <div class="form-group">
                    <label for="odemeaciklama">Açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Ödemenin açıklaması" id="odemeaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="ödemekime">Ödemenin kime yapılacağı?</label>
                    <input type="text" class="form-control" name="kime" placeholder="Ödemenin kime yapılacağı" id="ödemekime" required>
                  </div>
                  <div class="form-group">
                    <label for="ödemetarihi">Ödemenin tarihi</label>
                    <input type="date" class="form-control" name="zaman" id="ödemetarihi" required>
                  </div>
                  <div class="form-group">
                    <label for="odemetutari">Ödeme tutarı</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Ödemenin parasal miktarı" id="odemetutari" required>
                  </div>
                  <div class="form-group">
                    <label for="odemealinmazamani">Borcun alındığı tarih</label>
                    <input type="date" class="form-control" name="alinma_zamani" id="odemealinmazamani" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="odeme_ekle">Ödeme Ekle</button>
                </div>
              </form>
            </div>
              <?php } elseif($_GET['sayfa']=="calisan_ekle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yeni çalışan ekle</h3>
                <div class="card-tools">
                <a href="sayfa.php?sayfa=calisanlar"><button type="submit" class="btn btn-info">Çalışanlar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="calisanisim">Adı Soyadı</label>
                    <input type="text" class="form-control" name="isim" placeholder="Çalışanın adı ve soyadı" id="calisanisim" required>
                  </div>
                  <div class="form-group">
                    <label for="calisandogumtarihi">Doğum tarihi</label>
                    <input type="date" class="form-control" name="dogum_tarihi" placeholder="Çalışanın doğum tarihi" id="calisandogumtarihi" required>
                  </div>
                  <div class="form-group">
                    <label for="calisanbolum">Çalıştığı bölüm</label>
                    <input type="text" class="form-control" name="bolum" placeholder="Çalışanın görev yaptığı bölüm" id="calisanbolum" required>
                  </div>
                  <div class="form-group">
                    <label for="calisanmaas">Aldığı maaş miktarı</label>
                    <input type="text" class="form-control" name="maas" id="calisanmaas" placeholder="Çalışanın aldığı maaşın parasal miktarı" required>
                  </div>
                  <div class="form-group">
                    <label for="isebaslama">İşe başlama tarihi</label>
                    <input type="date" class="form-control" name="is_basi" placeholder="Ödemenin parasal miktarı" id="isebaslama" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="calisan_ekle">Çalışan Ekle</button>
                </div>
              </form>
            </div>
            <?php } elseif($_GET['sayfa']=="alacak_ekle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yeni alacak ekle</h3>
                <div class="card-tools">
                <a href="sayfa.php?sayfa=alacaklar"><button type="submit" class="btn btn-info">Alacak listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="alacakliisim">Alınacak kişi/firma</label>
                    <input type="text" class="form-control" name="isim" placeholder="Alınacak firma ya da ad, soyad bilgileri" id="alacakliisim" required>
                  </div>
                  <div class="form-group">
                    <label for="alacakliaciklama">Alacak için açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Alınacak için açıklama" id="alacakliaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="alacakzaman">Vadesi</label>
                    <input type="date" class="form-control" name="zaman" placeholder="Alacak için verilen zaman" id="alacakzaman" required>
                  </div>
                  <div class="form-group">
                    <label for="alacaktutar">Alınacak miktar</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Alacağın miktarı" id="alacaktutar" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="alacak_ekle">Alacak Ekle</button>
                </div>
              </form>
            </div>
            <?php } elseif($_GET['sayfa']=="satis_ekle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Yeni satış ekle</h3>
                <div class="card-tools">
                <a href="sayfa.php?sayfa=satislar"><button type="submit" class="btn btn-info">Satışlar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="satisbaslik">Satılan</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Satışı yapılan ürün veya satış yapılan firma ya da kişi bilgileri" id="satisbaslik" required>
                  </div>
                  <div class="form-group">
                    <label for="satisaciklama">Satış için açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Satışa yapılan mal/hizmet için açıklama" id="satisaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="satiszaman">Satış tarihi</label>
                    <input type="date" class="form-control" name="zaman" placeholder="Satışın yapıldığı zaman" id="satiszaman" required>
                  </div>
                  <div class="form-group">
                    <label for="satistutar">Satışın tutarı</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Yapılan satışın parasal miktarı" id="satistutar" required>
                  </div>
                  <div class="form-group">
                    <label for="satisturu">Satış türü</label>
                    <input type="text" class="form-control" name="turu" placeholder="Satışın ne şekilde yapıldığına dair bilgi" id="satisturu" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="satis_ekle">Satış Ekle</button>
                </div>
              </form>
            </div>
              <?php }?>
        </div>
    </div>
    </section>
</div>

<?php 
require_once 'footer.php'; 
?>