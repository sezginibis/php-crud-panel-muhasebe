<?php 
require_once 'header.php';
require_once 'sidebar.php'; 

$masraf=$baglan->prepare("SELECT * from masraflar WHERE masraf_id=:masraf_id");
$masraf->execute(array(
    'masraf_id'=>$_GET['id']
));
$masraf_cek=$masraf->fetch(PDO::FETCH_ASSOC);

$odeme=$baglan->prepare("SELECT * from odemeler WHERE odeme_id=:odeme_id");
$odeme->execute(array(
    'odeme_id'=>$_GET['id']
));
$odeme_yap=$odeme->fetch(PDO::FETCH_ASSOC);

$calisan=$baglan->prepare("SELECT * from calisanlar WHERE calisan_id=:calisan_id");
$calisan->execute(array(
    'calisan_id'=>$_GET['id']
));
$calisan_listele=$calisan->fetch(PDO::FETCH_ASSOC);

$alacak=$baglan->prepare("SELECT * from alacaklar WHERE alacak_id=:alacak_id");
$alacak->execute(array(
    'alacak_id'=>$_GET['id']
));
$alacak_listele=$alacak->fetch(PDO::FETCH_ASSOC);

$satis=$baglan->prepare("SELECT * from satislar WHERE satis_id=:satis_id");
$satis->execute(array(
    'satis_id'=>$_GET['id']
));
$satis_listele=$satis->fetch(PDO::FETCH_ASSOC);

$nakit=$baglan->prepare("SELECT * from nakit WHERE nakit_id=:nakit_id");
$nakit->execute(array(
    'nakit_id'=>$_GET['id']
));
$nakit_listele=$nakit->fetch(PDO::FETCH_ASSOC);
?>


<div class="content-wrapper">
    <section class="content">
    <br>
    <div class="row">
    <div class="col-12">
            <?php if ($_GET['sayfa']=="masraf_duzenle") { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $masraf_cek['masraf_baslik']; ?></b> başlıklı masrafı düzenliyorsunuz...</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=masraf_ekle"><button type="submit" class="btn btn-info">Masraf ekle</button></a> <a href="sayfa.php?sayfa=masraflar"><button type="submit" class="btn btn-info">Masraflar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="masrafbaslik">Başlık</label>
                    <input type="text" class="form-control" name="baslik" value="<?php echo $masraf_cek['masraf_baslik']; ?>" alt="Masrafın başlığı" id="masrafbaslik">
                  </div>
                  <div class="form-group">
                    <label for="masrafaciklama">Açıklama</label>
                    <input type="text" class="form-control" name="aciklama" value="<?php echo $masraf_cek['masraf_aciklama']; ?>" alt="Masrafın açıklaması" id="masrafaciklama">
                  </div>
                  <div class="form-group">
                    <label for="masraftarih">Tarih</label>
                    <input type="date" class="form-control" name="zaman" value="<?php echo $masraf_cek['masraf_zaman']; ?>" id="masraftarih">
                  </div>
                  <div class="form-group">
                    <label for="masrafkategori">Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?php echo $masraf_cek['masraf_kategori']; ?>" alt="Masrafın kategorisi" id="masrafkategori">
                  </div>
                  <div class="form-group">
                    <label for="masraftutari">Tutarı</label>
                    <input type="text" class="form-control" name="tutar" value="<?php echo $masraf_cek['masraf_tutar']; ?>" alt="Masrafın parasal miktarı" id="masraftutari">
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $masraf_cek['masraf_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="masraf_duzenle">Değişiklikleri kaydet</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <?php } elseif($_GET['sayfa']=="odeme_duzenle") { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $odeme_yap['odeme_baslik']; ?></b> başlıklı ve <?php echo date("d.m.Y", strtotime($odeme_yap['odeme_zaman'])); ?> tarihli ödemeyi düzenliyorsunuz...</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=odeme_ekle"><button type="submit" class="btn btn-info">Ödeme ekle</button></a> <a href="sayfa.php?sayfa=odemeler"><button type="submit" class="btn btn-info">Ödemeler listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="odemebaslik">Başlık</label>
                    <input type="text" class="form-control" name="baslik" value="<?php echo $odeme_yap['odeme_baslik']; ?>" alt="Ödemenin başlığı" id="odemebaslik">
                  </div>
                  <div class="form-group">
                    <label for="odemeaciklama">Açıklama</label>
                    <input type="text" class="form-control" name="aciklama" value="<?php echo $odeme_yap['odeme_aciklama']; ?>" alt="Ödemenin açıklaması" id="odemeaciklama">
                  </div>
                  <div class="form-group">
                    <label for="odemekime">Ödemenin kime yapılacağı?</label>
                    <input type="text" class="form-control" name="kime" value="<?php echo $odeme_yap['odeme_kime']; ?>" alt="Ödemenin kime yapılacağının açıklaması" id="odemekime">
                  </div>
                  <div class="form-group">
                    <label for="odemezaman">Ödemenin tarihi</label>
                    <input type="date" class="form-control" name="zaman" value="<?php echo $odeme_yap['odeme_zaman']; ?>" id="odemezaman">
                  </div>
                  <div class="form-group">
                    <label for="odemetutar">Ödeme tutarı</label>
                    <input type="text" class="form-control" name="tutar" value="<?php echo $odeme_yap['odeme_tutar']; ?>" alt="Masrafın parasal miktarı" id="odemetutar">
                  </div>
                  <div class="form-group">
                    <label for="odemealinmazamani">Borcun alındığı tarih</label>
                    <input type="date" class="form-control" name="alinma_zamani" value="<?php echo $odeme_yap['para_alinan_zaman']; ?>" id="odemealinmazamani">
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $odeme_yap['odeme_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="odeme_duzenle">Değişiklikleri kaydet</button>
                </div>
              </form>
            </div>
              <?php } elseif($_GET['sayfa']=="calisan_duzenle") { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $calisan_listele['calisan_isim']; ?></b> isimli çalışanın bilgilerini düzenliyorsunuz...</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=calisan_ekle"><button type="submit" class="btn btn-info">Çalışan ekle</button></a> <a href="sayfa.php?sayfa=calisanlar"><button type="submit" class="btn btn-info">Çalışanlar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="calisanisim">Adı Soyadı</label>
                    <input type="text" class="form-control" name="isim" placeholder="Çalışanın adı ve soyadı" value="<?php echo $calisan_listele['calisan_isim']; ?>" id="calisanisim" required>
                  </div>
                  <div class="form-group">
                    <label for="calisandogumtarihi">Doğum tarihi</label>
                    <input type="date" class="form-control" name="dogum_tarihi" placeholder="Çalışanın doğum tarihi" value="<?php echo $calisan_listele['calisan_yas']; ?>" id="calisandogumtarihi" required>
                  </div>
                  <div class="form-group">
                    <label for="calisanbolum">Çalıştığı bölüm</label>
                    <input type="text" class="form-control" name="bolum" placeholder="Çalışanın görev yaptığı bölüm" value="<?php echo $calisan_listele['calisan_bolum']; ?>"id="calisanbolum" required>
                  </div>
                  <div class="form-group">
                    <label for="calisanmaas">Aldığı maaş miktarı</label>
                    <input type="text" class="form-control" name="maas" id="calisanmaas" value="<?php echo $calisan_listele['calisan_maas']; ?>" placeholder="Çalışanın aldığı maaşın parasal miktarı" required>
                  </div>
                  <div class="form-group">
                    <label for="isebaslama">İşe başlama tarihi</label>
                    <input type="date" class="form-control" name="is_basi" placeholder="Ödemenin parasal miktarı" value="<?php echo $calisan_listele['ise_baslama_tarihi']; ?>" id="isebaslama" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $calisan_listele['calisan_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="calisan_duzenle">Değişiklikleri kaydet</button>
                </div>
              </form>
            </div>
            <?php } elseif($_GET['sayfa']=="alacak_duzenle") { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $alacak_listele['alacak_isim']; ?></b> isimli <?php echo date("d.m.Y", strtotime($alacak_listele['alacak_zaman'])); ?> tarihli alacağın bilgilerini düzenliyorsunuz...</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=alacak_ekle"><button type="submit" class="btn btn-info">Alacak ekle</button></a> <a href="sayfa.php?sayfa=alacaklar"><button type="submit" class="btn btn-info">Alacaklar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="alacakliisim">Alınacak kişi/firma</label>
                    <input type="text" class="form-control" name="isim" placeholder="Alınacak firma ya da ad, soyad bilgileri" id="alacakliisim" value="<?php echo $alacak_listele['alacak_isim']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="alacakliaciklama">Alacak için açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Alınacak için açıklama" id="alacakliaciklama" value="<?php echo $alacak_listele['alacak_aciklama']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="alacakzaman">Vadesi</label>
                    <input type="date" class="form-control" name="zaman" placeholder="Alacak için verilen zaman" id="alacakzaman" value="<?php echo $alacak_listele['alacak_zaman']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="alacaktutar">Alınacak miktar</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Alacağın miktarı" id="alacaktutar" value="<?php echo $alacak_listele['alacak_tutar']; ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $alacak_listele['alacak_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="alacak_duzenle">Değişiklikleri kaydet</button>
                </div>
              </form>
            </div>
            <?php } elseif($_GET['sayfa']=="satis_duzenle") { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $satis_listele['satis_baslik']; ?></b> isimli <?php echo date("d.m.Y", strtotime($satis_listele['satis_zaman'])); ?> tarihli satışın bilgilerini düzenliyorsunuz...</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=satis_ekle"><button type="submit" class="btn btn-info">Satış ekle</button></a> <a href="sayfa.php?sayfa=satislar"><button type="submit" class="btn btn-info">Satışlar listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="satisbaslik">Satılan</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Satışı yapılan ürün veya satış yapılan firma ya da kişi bilgileri" value="<?php echo $satis_listele['satis_baslik']; ?>" id="satisbaslik" required>
                  </div>
                  <div class="form-group">
                    <label for="satisaciklama">Satış için açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Satışa yapılan mal/hizmet için açıklama" value="<?php echo $satis_listele['satis_aciklama']; ?>" id="satisaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="satiszaman">Satış tarihi</label>
                    <input type="date" class="form-control" name="zaman" placeholder="Satışın yapıldığı zaman" id="satiszaman" value="<?php echo $satis_listele['satis_zaman']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="satistutar">Satışın tutarı</label>
                    <input type="text" class="form-control" name="tutar" placeholder="Yapılan satışın parasal miktarı" value="<?php echo $satis_listele['satis_tutar']; ?>" id="satistutar" required>
                  </div>
                  <div class="form-group">
                    <label for="satisturu">Satış türü</label>
                    <input type="text" class="form-control" name="turu" placeholder="Satışın ne şekilde yapıldığına dair bilgi" value="<?php echo $satis_listele['satis_odeme']; ?>" id="satisturu" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $satis_listele['satis_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="satis_duzenle">Değişiklikleri kaydet</button>
                </div>
              </form>
            </div>
            <?php } elseif($_GET['sayfa']=="nakit_duzenle") { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b><?php echo $nakit_listele['nakit_baslik']; ?></b> isimli <?php echo date("d.m.Y", strtotime($nakit_listele['nakit_zaman'])); ?> tarihli nakit giriş-çıkış bilgilerini düzenliyorsunuz...</h3>
                <div class="card-tools">
                 <a href="nakit.php"><button type="submit" class="btn btn-info">Nakit giriş-çıkış listesi</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="nakitbaslik">Nakit giriş-çıkış başlığı</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Alınan paranın başlık bilgileri" value="<?php echo $nakit_listele['nakit_baslik']; ?>" id="nakitbaslik" required>
                  </div>
                  <div class="form-group">
                    <label for="nakitaciklama">Nakit giriş-çıkış için açıklama</label>
                    <input type="text" class="form-control" name="aciklama" placeholder="Satışa yapılan mal/hizmet için açıklama" value="<?php echo $nakit_listele['nakit_aciklama']; ?>" id="nakitaciklama" required>
                  </div>
                  <div class="form-group">
                    <label for="nakitgirismiktari">Nakit giriş miktarı</label>
                    <input type="text" class="form-control" name="gelen_tutar" placeholder="Girişi yapılmış nakit tutarı" id="nakitgirismiktari" value="<?php echo $nakit_listele['nakit_gelen_tutar']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="nakitcikismiktari">Nakit çıkış tutarı</label>
                    <input type="text" class="form-control" name="cikan_tutar" placeholder="Çıkışı yapılmış nakit tutarı" value="<?php echo $nakit_listele['nakit_cikan_tutar']; ?>" id="nakitcikismiktari" required>
                  </div>
                  <div class="form-group">
                    <label for="nakitgiriscikistarihi">Nakit giriş-çıkışın tarihi</label>
                    <input type="date" class="form-control" name="giris_cikis_tarihi" placeholder="Nakit giriş-çıkışının yapıldığı tarih" value="<?php echo $nakit_listele['nakit_zaman']; ?>" id="nakitgiriscikistarihi" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <input type="hidden" name="id" value="<?php echo $nakit_listele['nakit_id']; ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="nakit_duzenle">Değişiklikleri kaydet</button>
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