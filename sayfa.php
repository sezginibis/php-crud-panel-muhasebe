<?php 
require_once 'header.php';
require_once 'sidebar.php'; 
?>


<div class="content-wrapper">
    <section class="content">
    <br>
    <div class="row">
          <div class="col-12">
            <div class="card">
<?php
if (@$_GET['ekle']=="ok") { ?>
<div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Kayıt ekleme işleminiz başarıyla tamamlandı.</div>
<?php } elseif (@$_GET['ekle']=="no") {?>
  <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Kayıt ekleme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
<?php } elseif (@$_GET['guncelle']=="ok") {?>
  <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Kayıt güncelleme işleminiz başarıyla tamamlandı.</div>
<?php } elseif (@$_GET['guncelle']=="no") {?>
  <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Kayıt güncelleme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
<?php } elseif (@$_GET['sil']=="ok") {?>
  <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Kayıt silme işleminiz başarıyla tamamlandı.</div>
<?php } elseif (@$_GET['sil']=="no") {?>
  <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Kayıt silme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
<?php } ?>
              <?php if ($_GET['sayfa']=="masraflar") { ?>
                <div class="card-header">
                <h3 class="card-title">Masraflar listesi</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=masraf_ekle"><button type="submit" class="btn btn-info">Masraf ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap the-table">
                  <thead>
                    <tr>
                      <th><p class="text-center">Başlık</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Tutar</p></th>
                      <th><p class="text-center">Kategori</p></th>
                      <th><p class="text-center">Tarih</p></th>
                      <th colspan="2"><p class="text-center">İşlemler</p></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$masraf=$baglan->prepare("SELECT * from masraflar");
$masraf->execute();
while ($masraf_cek=$masraf->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td class="align-middle"><?php echo $masraf_cek['masraf_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $masraf_cek['masraf_aciklama']; ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($masraf_cek['masraf_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo $masraf_cek['masraf_kategori'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($masraf_cek['masraf_zaman'])); ?></td>
                      <td class="align-middle"><a href="duzenle.php?sayfa=masraf_duzenle&id=<?php echo $masraf_cek['masraf_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                      <td class="align-middle">
                        <form action="islem.php" method="POST">
                        <button name="masraf_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $masraf_cek['masraf_id']; ?>">
                        </form>
                      </td>
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->   
              <?php } elseif($_GET['sayfa']=="odemeler") { ?>
                <div class="card-header">
                <h3 class="card-title">Ödemeler listesi</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=odeme_ekle"><button type="submit" class="btn btn-info">Ödeme ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap the-table">
                  <thead>
                    <tr>
                      <th><p class="text-center">Başlık</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Kime?</p></th>
                      <th><p class="text-center">Ödeme Tarihi</p></th>
                      <th><p class="text-center">Tutar</p></th>
                      <th><p class="text-center">Alınma</p></th>
                      <th colspan="2"><p class="text-center">İşlemler</p></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$odeme=$baglan->prepare("SELECT * FROM odemeler ORDER BY odeme_id DESC");
$odeme->execute();
while ($odeme_yap=$odeme->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td class="align-middle"><?php echo $odeme_yap['odeme_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $odeme_yap['odeme_aciklama']; ?></td>
                      <td class="align-middle"><?php echo $odeme_yap['odeme_kime'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($odeme_yap['odeme_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($odeme_yap['odeme_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($odeme_yap['para_alinan_zaman'])); ?></td>
                      <td class="align-middle"><a href="duzenle.php?sayfa=odeme_duzenle&id=<?php echo $odeme_yap['odeme_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                      <td class="align-middle">
                        <form action="islem.php" method="POST">
                        <button name="odeme_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $odeme_yap['odeme_id']; ?>">
                        </form>
                      </td>
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } elseif($_GET['sayfa']=="calisanlar") { ?>
                <div class="card-header">
                <h3 class="card-title">Çalışanlar listesi</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=calisan_ekle"><button type="submit" class="btn btn-info">Çalışan ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap the-table">
                  <thead>
                    <tr>
                      <th><p class="text-center">Adı Soyadı</p></th>
                      <th><p class="text-center">Doğum Tarihi</p></th>
                      <th><p class="text-center">Bölümü</p></th>
                      <th><p class="text-center">Maaşı</p></th>
                      <th><p class="text-center">İşe Başlama</p></th>
                      <th colspan="2"><p class="text-center">İşlemler</p></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$calisan=$baglan->prepare("SELECT * FROM calisanlar ORDER BY ise_baslama_tarihi ASC");
$calisan->execute();
while ($calisan_listele=$calisan->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td class="align-middle"><?php echo $calisan_listele['calisan_isim']; ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($calisan_listele['calisan_yas'])); ?></td>
                      <td class="align-middle"><?php echo $calisan_listele['calisan_bolum'] ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($calisan_listele['calisan_maas'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($calisan_listele['ise_baslama_tarihi'])); ?></td>
                      <td class="align-middle"><a href="duzenle.php?sayfa=calisan_duzenle&id=<?php echo $calisan_listele['calisan_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                      <td class="align-middle">
                        <form action="islem.php" method="POST">
                        <button name="calisan_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $calisan_listele['calisan_id']; ?>">
                        </form>
                      </td>
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } elseif($_GET['sayfa']=="alacaklar") { ?>
                <div class="card-header">
                <h3 class="card-title">Alacaklar listesi</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=alacak_ekle"><button type="submit" class="btn btn-info">Alacak ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap the-table">
                  <thead>
                    <tr>
                      <th><p class="text-center">Borçlu</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Ödeme zamanı</p></th>
                      <th><p class="text-center">Miktarı</p></th>
                      <th colspan="2"><p class="text-center">İşlemler</p></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$alacak=$baglan->prepare("SELECT * FROM alacaklar ORDER BY alacak_zaman DESC");
$alacak->execute();
while ($alacak_listele=$alacak->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td class="align-middle"><?php echo $alacak_listele['alacak_isim']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $alacak_listele['alacak_aciklama'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($alacak_listele['alacak_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($alacak_listele['alacak_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><a href="duzenle.php?sayfa=alacak_duzenle&id=<?php echo $alacak_listele['alacak_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                      <td class="align-middle">
                        <form action="islem.php" method="POST">
                        <button name="alacak_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $alacak_listele['alacak_id']; ?>">
                        </form>
                      </td>
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } elseif($_GET['sayfa']=="satislar") { ?>
                <div class="card-header">
                <h3 class="card-title">Satışlar listesi</h3>
                <div class="card-tools">
                <a href="ekle.php?sayfa=satis_ekle"><button type="submit" class="btn btn-info">Satış ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap the-table">
                  <thead>
                    <tr>
                      <th><p class="text-center">Satılan</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Satış zamanı</p></th>
                      <th><p class="text-center">Tutarı</p></th>
                      <th><p class="text-center">Satış türü</p></th>
                      <th colspan="2"><p class="text-center">İşlemler</p></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$satis=$baglan->prepare("SELECT * FROM satislar ORDER BY satis_zaman DESC");
$satis->execute();
while ($satis_listele=$satis->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td class="align-middle"><?php echo $satis_listele['satis_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $satis_listele['satis_aciklama'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($satis_listele['satis_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($satis_listele['satis_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo $satis_listele['satis_odeme']; ?></td>
                      <td class="align-middle"><a href="duzenle.php?sayfa=satis_duzenle&id=<?php echo $satis_listele['satis_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                      <td class="align-middle">
                        <form action="islem.php" method="POST">
                        <button name="satis_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $satis_listele['satis_id']; ?>">
                        </form>
                      </td>
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
              <?php }?>

            </div>
            <!-- /.card -->
          </div>
        </div>

    </section>
</div>

<?php 
require_once 'footer.php'; 
?>