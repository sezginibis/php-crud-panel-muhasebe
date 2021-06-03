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

          <form action="" method="POST">
            <div class="alert alert-info" role="alert">
              Listelemek istediğiniz zaman aralığını aşağıdan seçin ve filtrele butonuna basın.
            </div>
            <div class="col-12">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label id="yazi1" for="baslangic-tarihi" class="col-form-label">Başlangıç tarihini seçin</label>
                    <input name="baslama_tarihi" class="form-control" type="date" id="baslangic-tarihi">
                  </div>
                  <div class="col">
                    <label id="yazi2" for="bitis-tarihi" class="col-form-label">Bitiş tarihini seçin</label>
                    <input name="bitis_tarihi" class="form-control" type="date" id="bitis-tarihi">
                  </div>
                  <div class="col">
                    <label class="col-form-label" for="filtrele"></label>
                    <button name="satis_filtrele" type="submit" class="btn btn-outline-info btn-block align-middle p-3" id="filtrele">Filtrele </button>
                  </div>
                </div>
              </div>
          </form>
        </div>

        <?php $baslama_tarihi = $_POST['baslama_tarihi'];
        $bitis_tarihi = $_POST['bitis_tarihi'];
        ?>
        <?php if ($_GET['rapor'] == "nakit") { ?>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>
                    <p class="text-center">Başlık</p>
                  </th>
                  <th>
                    <p class="text-center">Açıklama</p>
                  </th>
                  <th>
                    <p class="text-center">Gelen Tutar</p>
                  </th>
                  <th>
                    <p class="text-center">Çıkan Tutar</p>
                  </th>
                  <th>
                    <p class="text-center">Tarih</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nakit = $baglan->prepare("SELECT * FROM nakit WHERE nakit_zaman BETWEEN ? and ?");
                $nakit->execute(array($baslama_tarihi, $bitis_tarihi));
                while ($nakit_islem = $nakit->fetch(PDO::FETCH_ASSOC)) {
                  $toplam_girdi += $nakit_islem['nakit_gelen_tutar'];
                  $toplam_cikti += $nakit_islem['nakit_cikan_tutar'];
                  $toplam_say = $nakit->rowCount();
                ?>
                  <tr>
                    <td class="align-middle"><?php echo $nakit_islem['nakit_baslik']; ?></td>
                    <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $nakit_islem['nakit_aciklama']; ?></td>
                    <td class="align-middle">
                      <p class="text-right"><?php echo number_format($nakit_islem['nakit_gelen_tutar'], 2, ",", "."); ?> ₺</p>
                    </td>
                    <td class="align-middle">
                      <p class="text-right"><?php echo number_format($nakit_islem['nakit_cikan_tutar'], 2, ",", "."); ?> ₺</p>
                    </td>
                    <td class="align-middle"><?php echo date("d.m.Y", strtotime($nakit_islem['nakit_zaman'])); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <p> <small> Bulunan kayıt sayısı: <b><?php echo $toplam_say; ?> </b></small></p>
            <p class="text-center">Toplam giriş: <?php echo number_format($toplam_girdi, 2, ",", "."); ?> ₺ | Toplam çıkış: <?php echo number_format($toplam_cikti, 2, ",", "."); ?> ₺</p>
          </div>
        <?php }
        if ($_GET['rapor'] == "masraf") { ?>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>
                    <p class="text-center">Başlık</p>
                  </th>
                  <th>
                    <p class="text-center">Açıklama</p>
                  </th>
                  <th>
                    <p class="text-center">Tutar</p>
                  </th>
                  <th>
                    <p class="text-center">Kategori</p>
                  </th>
                  <th>
                    <p class="text-center">Tarih</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $masraf = $baglan->prepare("SELECT * FROM masraflar WHERE masraf_zaman BETWEEN ? and ?");
                $masraf->execute(array($baslama_tarihi, $bitis_tarihi));
                while ($masraf_cek = $masraf->fetch(PDO::FETCH_ASSOC)) {
                  $toplam_tutar += $masraf_cek['masraf_tutar'];
                  $toplam_say = $masraf->rowCount();
                ?>
                  <tr>
                  <td class="align-middle"><?php echo $masraf_cek['masraf_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $masraf_cek['masraf_aciklama']; ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($masraf_cek['masraf_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo $masraf_cek['masraf_kategori'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($masraf_cek['masraf_zaman'])); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <p> <small> Bulunan kayıt sayısı: <b><?php echo $toplam_say; ?> </b></small></p>
            <p class="text-center">Toplam tutar: <?php echo number_format($toplam_tutar, 2, ",", "."); ?> ₺ </p>
          </div>
        <?php }
        if ($_GET['rapor'] == "odeme") { ?>
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                      <th><p class="text-center">Başlık</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Kime?</p></th>
                      <th><p class="text-center">Ödeme Tarihi</p></th>
                      <th><p class="text-center">Tutar</p></th>
                      <th><p class="text-center">Alınma</p></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $odeme=$baglan->prepare("SELECT * FROM odemeler WHERE odeme_zaman BETWEEN ? and ?");
                $odeme->execute(array($baslama_tarihi, $bitis_tarihi));
                while ($odeme_yap = $odeme->fetch(PDO::FETCH_ASSOC)) {
                  $toplam_tutar += $odeme_yap['odeme_tutar'];
                  $toplam_say = $odeme->rowCount();
                ?>
                  <tr>
                  <td class="align-middle"><?php echo $odeme_yap['odeme_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $odeme_yap['odeme_aciklama']; ?></td>
                      <td class="align-middle"><?php echo $odeme_yap['odeme_kime'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($odeme_yap['odeme_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($odeme_yap['odeme_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($odeme_yap['para_alinan_zaman'])); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <p> <small> Bulunan kayıt sayısı: <b><?php echo $toplam_say; ?> </b></small></p>
            <p class="text-center">Toplam tutar: <?php echo number_format($toplam_tutar, 2, ",", "."); ?> ₺ </p>
          </div>
        <?php }
        if ($_GET['rapor'] == "alacak") { ?>
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                      <th><p class="text-center">Borçlu</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Ödeme zamanı</p></th>
                      <th><p class="text-center">Miktarı</p></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $alacak=$baglan->prepare("SELECT * FROM alacaklar WHERE alacak_zaman BETWEEN ? and ?");
                $alacak->execute(array($baslama_tarihi, $bitis_tarihi));
                while ($alacak_listele = $alacak->fetch(PDO::FETCH_ASSOC)) {
                  $toplam_tutar += $alacak_listele['alacak_tutar'];
                  $toplam_say = $alacak->rowCount();
                ?>
                  <tr>
                    <td class="align-middle"><?php echo $alacak_listele['alacak_isim']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $alacak_listele['alacak_aciklama'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($alacak_listele['alacak_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($alacak_listele['alacak_tutar'],2,",","."); ?> ₺</p></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <p> <small> Bulunan kayıt sayısı: <b><?php echo $toplam_say; ?> </b></small></p>
            <p class="text-center">Toplam tutar: <?php echo number_format($toplam_tutar, 2, ",", "."); ?> ₺ </p>
          </div>
        <?php }
        if ($_GET['rapor'] == "satis") { ?>
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                      <th><p class="text-center">Satılan</p></th>
                      <th><p class="text-center">Açıklama</p></th>
                      <th><p class="text-center">Satış zamanı</p></th>
                      <th><p class="text-center">Tutarı</p></th>
                      <th><p class="text-center">Satış türü</p></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $satis=$baglan->prepare("SELECT * FROM satislar WHERE satis_zaman BETWEEN ? and ?");
                $satis->execute(array($baslama_tarihi, $bitis_tarihi));
                while ($satis_listele = $satis->fetch(PDO::FETCH_ASSOC)) {
                  $toplam_tutar += $satis_listele['satis_tutar'];
                  $toplam_say = $satis->rowCount();
                ?>
                  <tr>
                      <td class="align-middle"><?php echo $satis_listele['satis_baslik']; ?></td>
                      <td class="align-middle" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $satis_listele['satis_aciklama'] ?></td>
                      <td class="align-middle"><?php echo date("d.m.Y", strtotime($satis_listele['satis_zaman'])); ?></td>
                      <td class="align-middle"><p class="text-right"><?php echo number_format($satis_listele['satis_tutar'],2,",","."); ?> ₺</p></td>
                      <td class="align-middle"><?php echo $satis_listele['satis_odeme']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <p> <small> Bulunan kayıt sayısı: <b><?php echo $toplam_say; ?> </b></small></p>
            <p class="text-center">Toplam tutar: <?php echo number_format($toplam_tutar, 2, ",", "."); ?> ₺ </p>
          </div>
        <?php } ?>
      </div>
    </div>
</div>
</div>
</section>
</div>

<?php
require_once 'footer.php';
?>