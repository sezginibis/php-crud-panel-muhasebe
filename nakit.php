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
          if (@$_GET['giris'] == "ok") { ?>
            <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Para girişi ekleme işleminiz başarıyla tamamlandı.</div>
          <?php } elseif (@$_GET['giris'] == "no") { ?>
            <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Para girişi ekleme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
          <?php } elseif (@$_GET['cikis'] == "ok") { ?>
            <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Para çıkışı güncelleme işleminiz başarıyla tamamlandı.</div>
          <?php } elseif (@$_GET['cikis'] == "no") { ?>
            <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Para çıkışı güncelleme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
          <?php } elseif (@$_GET['guncelle'] == "ok") { ?>
            <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Para giriş-çıkışı güncelleme işleminiz başarıyla tamamlandı.</div>
          <?php } elseif (@$_GET['guncelle'] == "no") { ?>
            <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Para giriş-çıkışı güncelleme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
          <?php } elseif (@$_GET['sil'] == "ok") { ?>
            <div class="alert alert-success alert-dismissible" role="alert" auto-close="3000">Kayıt silme işleminiz başarıyla tamamlandı.</div>
          <?php } elseif (@$_GET['sil'] == "no") { ?>
            <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Kayıt silme işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden eklemeyi deneyin.</div>
          <?php } ?>

          <div class="modal fade" id="paragirisi" tabindex="-1" role="dialog" aria-labelledby="paragirisietiketi" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="paragirisietiketi">Para girişi ekle</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="islem.php" method="POST">
                    <div class="form-group">
                      <label for="nakitgirisbaslik" class="col-form-label">Başlık</label>
                      <input type="text" class="form-control" name="baslik" id="nakitgirisbaslik" placeholder="Para girişi için bir başlık yazın" required>
                    </div>
                    <div class="form-group">
                      <label for="nakitgirisaciklama" class="col-form-label">Açıklama</label>
                      <textarea class="form-control" name="aciklama" id="nakitgirisaciklama" placeholder="Para girişi için açıklama yazın"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="nakitgiristutar" class="col-form-label">Tutar</label>
                      <input type="text" class="form-control" name="giris_tutar" id="nakitgiristutar" placeholder="Para girişi yapılacak tutarı yazın" required>
                    </div>
                    <div class="form-group">
                      <label for="nakitgiristarih" class="col-form-label">Tarih</label>
                      <input type="date" class="form-control" name="tarih" id="nakitgiristarih" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                  <button type="submit" name="nakit_giris_ekle" class="btn btn-primary">Ekle</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="paracikisi" tabindex="-1" role="dialog" aria-labelledby="paracikisietiketi" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="paracikisietiketi">Para çıkışı ekle</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="islem.php" method="POST">
                    <div class="form-group">
                      <label for="nakitgirisbaslik" class="col-form-label">Başlık</label>
                      <input type="text" class="form-control" name="baslik" id="nakitgirisbaslik" placeholder="Para çıkışı için bir başlık yazın" required>
                    </div>
                    <div class="form-group">
                      <label for="nakitgirisaciklama" class="col-form-label">Açıklama</label>
                      <textarea class="form-control" name="aciklama" id="nakitgirisaciklama" placeholder="Para çıkışı için açıklama yazın"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="nakitcikistutar" class="col-form-label">Tutar</label>
                      <input type="text" class="form-control" name="cikis_tutar" id="nakitcikistutar" placeholder="Para çıkışı yapılacak tutarı yazın" required>
                    </div>
                    <div class="form-group">
                      <label for="nakitgiristarih" class="col-form-label">Tarih</label>
                      <input type="date" class="form-control" name="tarih" id="nakitgiristarih" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                  <button type="submit" name="nakit_cikis_ekle" class="btn btn-primary">Çıkışı kaydet</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card-header">
            <h3 class="card-title">Nakit giriş ve çıkış listesi</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paragirisi" data-whatever="@mdo">Para girişi</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#paracikisi" data-whatever="@fat">Para çıkışı</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap the-table">
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
                  <th colspan="2">
                    <p class="text-center">İşlemler</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sayfa = intval($_GET['sayfa']);
                if (!$sayfa) {
                  $sayfa = 1;
                }
                $say = $baglan->query("SELECT * from nakit");
                $toplam_veri = $say->rowCount();
                $limit = 5;
                $sayfa_sayisi = ceil($toplam_veri / $limit);
                if ($sayfa > $sayfa_sayisi) {
                  $sayfa = 1;
                }
                $goster = $sayfa * $limit - $limit;
                $gorunen_sayfa = 3;

                $nakit = $baglan->prepare("SELECT * from nakit LIMIT $goster, $limit");
                $nakit->execute();
                while ($nakit_islem = $nakit->fetch(PDO::FETCH_ASSOC)) {
                  // $toplam_girdi+=$nakit_islem['nakit_gelen_tutar'];
                  // $toplam_cikti+=$nakit_islem['nakit_cikan_tutar'];
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
                    <td class="align-middle"><a href="duzenle.php?sayfa=nakit_duzenle&id=<?php echo $nakit_islem['nakit_id']; ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                    <td class="align-middle">
                      <form action="islem.php" method="POST">
                        <button name="nakit_sil" type="submit" class="btn btn-danger">Sil</button>
                        <input type="hidden" name="id" value="<?php echo $nakit_islem['nakit_id']; ?>">
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <!-- <p class="text-center">Toplam giriş: <?php echo $toplam_girdi; ?> ₺ | Toplam çıkış: <?php echo $toplam_cikti; ?> ₺</p> -->
          </div>
          <nav aria-label="...">
              <ul class="pagination pagination-sm justify-content-center">
                <?php if ($sayfa > 1) { ?>
                  <li class="page-item">
                    <a class="page-link" href="nakit.php">İlk</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="nakit.php?sayfa=<?php echo $sayfa - 1; ?>">Önceki</a>
                  </li>
                <?php }; ?>
                <?php for ($i = $sayfa - $gorunen_sayfa; $i < $sayfa + $gorunen_sayfa + 1; $i++) {
                  if ($i > 0 and $i <= $sayfa_sayisi) {
                    if ($i == $sayfa) {
                      echo "<li class='page-item active'>";
                      echo "<span class='page-link'>";
                      echo $i;
                      echo "<span class='sr-only'>(current)</span>";
                      echo "</span>";
                      echo "</li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link' href='nakit.php?sayfa=" . $i . "'>" . $i . "</a></li>";
                    }
                  }
                } ?>
                <?php if ($sayfa != $sayfa_sayisi) { ?>
                  <li class="page-item">
                    <a class="page-link" href="nakit.php?sayfa=<?php echo $sayfa + 1; ?>">Sonraki</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="nakit.php?sayfa=<?php echo $sayfa_sayisi; ?>">Son</a>
                  </li>
                <?php }; ?>
              </ul>
            </nav>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
require_once 'footer.php';
?>