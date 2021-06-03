<?php
ob_start();
session_start();
require_once 'baglan.php';
// Masraflar
if (isset($_POST['masraf_ekle'])) {
    $masraf_kaydet=$baglan->prepare("INSERT into masraflar SET
        masraf_baslik=:masraf_baslik,
        masraf_aciklama=:masraf_aciklama,
        masraf_tutar=:masraf_tutar,
        masraf_zaman=:masraf_zaman,
        masraf_kategori=:masraf_kategori
    ");
    $masraf_ekle=$masraf_kaydet->execute(array(
        'masraf_baslik'=>$_POST['baslik'],
        'masraf_aciklama'=>$_POST['aciklama'],
        'masraf_tutar'=>$_POST['tutar'],
        'masraf_zaman'=>$_POST['zaman'],
        'masraf_kategori'=>$_POST['kategori']
    ));

    if ($masraf_ekle) {
        Header("Location:sayfa.php?sayfa=masraflar&ekle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=masraflar&ekle=no");
    }
}

if (isset($_POST['masraf_duzenle'])) {
    $id=$_POST['id'];
    $masraf_guncelle=$baglan->prepare("UPDATE masraflar SET
        masraf_baslik=:masraf_baslik,
        masraf_aciklama=:masraf_aciklama,
        masraf_tutar=:masraf_tutar,
        masraf_zaman=:masraf_zaman,
        masraf_kategori=:masraf_kategori
WHERE masraf_id=$id
    ");
    $masraf_duzenle=$masraf_guncelle->execute(array(
        'masraf_baslik'=>$_POST['baslik'],
        'masraf_aciklama'=>$_POST['aciklama'],
        'masraf_tutar'=>$_POST['tutar'],
        'masraf_zaman'=>$_POST['zaman'],
        'masraf_kategori'=>$_POST['kategori']
    ));

    if ($masraf_duzenle) {
        Header("Location:sayfa.php?sayfa=masraflar&guncelle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=masraflar&guncelle=no");
    }
}

if (isset($_POST['masraf_sil'])) {
    $masraf_delete=$baglan->prepare("DELETE from masraflar WHERE masraf_id=:masraf_id");
    $masraf_sil=$masraf_delete->execute(array(
        'masraf_id'=>$_POST['id']
    ));

if ($masraf_sil) {
    Header("Location:sayfa.php?sayfa=masraflar&sil=ok");
} else {
    Header("Location:sayfa.php?sayfa=masraflar&sil=no");
};

}
// Ödemeler
if (isset($_POST['odeme_ekle'])) {
    $odeme_kaydet=$baglan->prepare("INSERT into odemeler SET
        odeme_baslik=:odeme_baslik,
        odeme_aciklama=:odeme_aciklama,
        odeme_kime=:odeme_kime,
        odeme_zaman=:odeme_zaman,
        odeme_tutar=:odeme_tutar,
        para_alinan_zaman=:para_alinan_zaman
    ");
    $odeme_ekle=$odeme_kaydet->execute(array(
        'odeme_baslik'=>$_POST['baslik'],
        'odeme_aciklama'=>$_POST['aciklama'],
        'odeme_kime'=>$_POST['kime'],
        'odeme_zaman'=>$_POST['zaman'],
        'odeme_tutar'=>$_POST['tutar'],
        'para_alinan_zaman'=>$_POST['alinma_zamani']
    ));

    if ($odeme_ekle) {
        Header("Location:sayfa.php?sayfa=odemeler&ekle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=odemeler&ekle=no");
    }
}

if (isset($_POST['odeme_duzenle'])) {
    $id=$_POST['id'];
    $odeme_guncelle=$baglan->prepare("UPDATE odemeler SET
        odeme_baslik=:odeme_baslik,
        odeme_aciklama=:odeme_aciklama,
        odeme_kime=:odeme_kime,
        odeme_zaman=:odeme_zaman,
        odeme_tutar=:odeme_tutar,
        para_alinan_zaman=:para_alinan_zaman
WHERE odeme_id=$id
    ");
    $odeme_duzenle=$odeme_guncelle->execute(array(
        'odeme_baslik'=>$_POST['baslik'],
        'odeme_aciklama'=>$_POST['aciklama'],
        'odeme_kime'=>$_POST['kime'],
        'odeme_zaman'=>$_POST['zaman'],
        'odeme_tutar'=>$_POST['tutar'],
        'para_alinan_zaman'=>$_POST['alinma_zamani']
    ));

    if ($odeme_duzenle) {
        Header("Location:sayfa.php?sayfa=odemeler&guncelle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=odemeler&guncelle=no");
    }
}

if (isset($_POST['odeme_sil'])) {
    $odeme_delete=$baglan->prepare("DELETE from odemeler WHERE odeme_id=:odeme_id");
    $odeme_sil=$odeme_delete->execute(array(
        'odeme_id'=>$_POST['id']
    ));

if ($odeme_sil) {
    Header("Location:sayfa.php?sayfa=odemeler&sil=ok");
} else {
    Header("Location:sayfa.php?sayfa=odemeler&sil=no");
};

}

// Çalışanlar
if (isset($_POST['calisan_ekle'])) {
    $calisan_kaydet=$baglan->prepare("INSERT into calisanlar SET
        calisan_isim=:calisan_isim,
        calisan_yas=:calisan_yas,
        calisan_bolum=:calisan_bolum,
        calisan_maas=:calisan_maas,
        ise_baslama_tarihi=:ise_baslama_tarihi
    ");
    $calisan_ekle=$calisan_kaydet->execute(array(
        'calisan_isim'=>$_POST['isim'],
        'calisan_yas'=>$_POST['dogum_tarihi'],
        'calisan_bolum'=>$_POST['bolum'],
        'calisan_maas'=>$_POST['maas'],
        'ise_baslama_tarihi'=>$_POST['is_basi']
    ));

    if ($calisan_ekle) {
        Header("Location:sayfa.php?sayfa=calisanlar&ekle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=calisanlar&ekle=no");
    }
}

if (isset($_POST['calisan_duzenle'])) {
    $id=$_POST['id'];
    $odeme_guncelle=$baglan->prepare("UPDATE calisanlar SET
        calisan_isim=:calisan_isim,
        calisan_yas=:calisan_yas,
        calisan_bolum=:calisan_bolum,
        calisan_maas=:calisan_maas,
        ise_baslama_tarihi=:ise_baslama_tarihi
WHERE calisan_id=$id
    ");
    $odeme_duzenle=$odeme_guncelle->execute(array(
        'calisan_isim'=>$_POST['isim'],
        'calisan_yas'=>$_POST['dogum_tarihi'],
        'calisan_bolum'=>$_POST['bolum'],
        'calisan_maas'=>$_POST['maas'],
        'ise_baslama_tarihi'=>$_POST['is_basi']
    ));

    if ($odeme_duzenle) {
        Header("Location:sayfa.php?sayfa=calisanlar&guncelle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=calisanlar&guncelle=no");
    }
}

if (isset($_POST['calisan_sil'])) {
    $calisan_delete=$baglan->prepare("DELETE from calisanlar WHERE calisan_id=:calisan_id");
    $calisan_sil=$calisan_delete->execute(array(
        'calisan_id'=>$_POST['id']
    ));

if ($calisan_sil) {
    Header("Location:sayfa.php?sayfa=calisanlar&sil=ok");
} else {
    Header("Location:sayfa.php?sayfa=calisanlar&sil=no");
};

}

// Alacaklar
if (isset($_POST['alacak_ekle'])) {
    $calisan_kaydet=$baglan->prepare("INSERT into alacaklar SET
        alacak_isim=:alacak_isim,
        alacak_aciklama=:alacak_aciklama,
        alacak_zaman=:alacak_zaman,
        alacak_tutar=:alacak_tutar
    ");
    $calisan_ekle=$calisan_kaydet->execute(array(
        'alacak_isim'=>$_POST['isim'],
        'alacak_aciklama'=>$_POST['aciklama'],
        'alacak_zaman'=>$_POST['zaman'],
        'alacak_tutar'=>$_POST['tutar']
    ));

    if ($calisan_ekle) {
        Header("Location:sayfa.php?sayfa=alacaklar&ekle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=alacaklar&ekle=no");
    }
}

if (isset($_POST['alacak_duzenle'])) {
    $id=$_POST['id'];
    $alacak_guncelle=$baglan->prepare("UPDATE alacaklar SET
        alacak_isim=:alacak_isim,
        alacak_aciklama=:alacak_aciklama,
        alacak_zaman=:alacak_zaman,
        alacak_tutar=:alacak_tutar
WHERE alacak_id=$id
    ");
    $alacak_duzenle=$alacak_guncelle->execute(array(
        'alacak_isim'=>$_POST['isim'],
        'alacak_aciklama'=>$_POST['aciklama'],
        'alacak_zaman'=>$_POST['zaman'],
        'alacak_tutar'=>$_POST['tutar']
    ));

    if ($alacak_duzenle) {
        Header("Location:sayfa.php?sayfa=alacaklar&guncelle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=alacaklar&guncelle=no");
    }
}

if (isset($_POST['alacak_sil'])) {
    $alacak_delete=$baglan->prepare("DELETE from alacaklar WHERE alacak_id=:alacak_id");
    $alacak_sil=$alacak_delete->execute(array(
        'alacak_id'=>$_POST['id']
    ));

if ($alacak_sil) {
    Header("Location:sayfa.php?sayfa=alacaklar&sil=ok");
} else {
    Header("Location:sayfa.php?sayfa=alacaklar&sil=no");
};

}

// Satışlar
if (isset($_POST['satis_ekle'])) {
    $satis_kaydet=$baglan->prepare("INSERT into satislar SET
        satis_baslik=:satis_baslik,
        satis_aciklama=:satis_aciklama,
        satis_zaman=:satis_zaman,
        satis_tutar=:satis_tutar,
        satis_odeme=:satis_odeme
    ");
    $satis_ekle=$satis_kaydet->execute(array(
        'satis_baslik'=>$_POST['baslik'],
        'satis_aciklama'=>$_POST['aciklama'],
        'satis_zaman'=>$_POST['zaman'],
        'satis_tutar'=>$_POST['tutar'],
        'satis_odeme'=>$_POST['turu']
    ));

    if ($satis_ekle) {
        Header("Location:sayfa.php?sayfa=satislar&ekle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=satislar&ekle=no");
    }
}

if (isset($_POST['satis_duzenle'])) {
    $id=$_POST['id'];
    $satis_guncelle=$baglan->prepare("UPDATE satislar SET
        satis_baslik=:satis_baslik,
        satis_aciklama=:satis_aciklama,
        satis_zaman=:satis_zaman,
        satis_tutar=:satis_tutar,
        satis_odeme=:satis_odeme
WHERE satis_id=$id
    ");
    $satis_duzenle=$satis_guncelle->execute(array(
        'satis_baslik'=>$_POST['baslik'],
        'satis_aciklama'=>$_POST['aciklama'],
        'satis_zaman'=>$_POST['zaman'],
        'satis_tutar'=>$_POST['tutar'],
        'satis_odeme'=>$_POST['turu']
    ));

    if ($satis_duzenle) {
        Header("Location:sayfa.php?sayfa=satislar&guncelle=ok");
    } else {
        Header("Location:sayfa.php?sayfa=satislar&guncelle=no");
    }
}

if (isset($_POST['satis_sil'])) {
    $satis_delete=$baglan->prepare("DELETE from satislar WHERE satis_id=:satis_id");
    $satis_sil=$satis_delete->execute(array(
        'satis_id'=>$_POST['id']
    ));

if ($satis_sil) {
    Header("Location:sayfa.php?sayfa=satislar&sil=ok");
} else {
    Header("Location:sayfa.php?sayfa=satislar&sil=no");
};

}

// Nakit girişi
if (isset($_POST['nakit_giris_ekle'])) {
    $nakit_giris_kaydet=$baglan->prepare("INSERT INTO nakit SET
        nakit_baslik=:nakit_baslik,
        nakit_aciklama=:nakit_aciklama,
        nakit_gelen_tutar=:nakit_gelen_tutar,
        nakit_zaman=:nakit_zaman
    ");
    $nakit_giris_ekle=$nakit_giris_kaydet->execute(array(
        'nakit_baslik'=>$_POST['baslik'],
        'nakit_aciklama'=>$_POST['aciklama'],
        'nakit_gelen_tutar'=>$_POST['giris_tutar'],
        'nakit_zaman'=>$_POST['tarih']
    ));

    if ($nakit_giris_ekle) {
        Header("Location:nakit.php?nakit=ekle&giris=ok");
    } else {
        Header("Location:nakit.php?nakit=ekle&giris=no");
    };
};

// Nakit çıkışı
if (isset($_POST['nakit_cikis_ekle'])) {
    $nakit_giris_kaydet=$baglan->prepare("INSERT INTO nakit SET
        nakit_baslik=:nakit_baslik,
        nakit_aciklama=:nakit_aciklama,
        nakit_cikan_tutar=:nakit_cikan_tutar,
        nakit_zaman=:nakit_zaman
    ");
    $nakit_giris_ekle=$nakit_giris_kaydet->execute(array(
        'nakit_baslik'=>$_POST['baslik'],
        'nakit_aciklama'=>$_POST['aciklama'],
        'nakit_cikan_tutar'=>$_POST['cikis_tutar'],
        'nakit_zaman'=>$_POST['tarih']
    ));

    if ($nakit_giris_ekle) {
        Header("Location:nakit.php?nakit=ekle&cikis=ok");
    } else {
        Header("Location:nakit.php?nakit=ekle&cikis=no");
    };
};

// Nakit giriş ve çıkışı düzenle
if (isset($_POST['nakit_duzenle'])) {
    $id=$_POST['id'];
    $satis_guncelle=$baglan->prepare("UPDATE nakit SET
        nakit_baslik=:nakit_baslik,
        nakit_aciklama=:nakit_aciklama,
        nakit_cikan_tutar=:nakit_cikan_tutar,
        nakit_gelen_tutar=:nakit_gelen_tutar,
        nakit_zaman=:nakit_zaman
WHERE nakit_id=$id
    ");
    $satis_duzenle=$satis_guncelle->execute(array(
        'nakit_baslik'=>$_POST['baslik'],
        'nakit_aciklama'=>$_POST['aciklama'],
        'nakit_cikan_tutar'=>$_POST['cikan_tutar'],
        'nakit_gelen_tutar'=>$_POST['gelen_tutar'],
        'nakit_zaman'=>$_POST['giris_cikis_tarihi']
    ));

    if ($satis_duzenle) {
        Header("Location:nakit.php?guncelle=ok");
    } else {
        Header("Location:nakit.php?guncelle=no");
    }
}

// Nakit giriş-çıkışı silme
if (isset($_POST['nakit_sil'])) {
    $nakit_delete=$baglan->prepare("DELETE from nakit WHERE nakit_id=:nakit_id");
    $nakit_sil=$nakit_delete->execute(array(
        'nakit_id'=>$_POST['id']
    ));

if ($nakit_sil) {
    Header("Location:nakit.php?sil=ok");
} else {
    Header("Location:nakit.php?sil=no");
};

}

if (isset($_POST['kullanici_kaydet'])) {

    $posta=htmlspecialchars($_POST['posta']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $firma=htmlspecialchars($_POST['firma']);
    $yetkili=htmlspecialchars($_POST['yetkili']);
    $sifre_guclendir=md5($sifre);

    $kullanici_kontrolu=$baglan->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:kullanici_mail");
        $kullanici_kontrolu->execute(array(
            'kullanici_mail'=>$_POST['posta']
        ));
    $kullanici_varmi=$kullanici_kontrolu->rowCount();
    
    if ($kullanici_varmi=="1") {
        Header("Location:kayit.php?kayit=mevcut");
    } else {
        $kullanici_kaydet=$baglan->prepare("INSERT into kullanicilar SET
        kullanici_mail=:kullanici_mail,
        kullanici_firma=:kullanici_firma,
        kullanici_adi=:kullanici_adi,
        kullanici_sifre=:kullanici_sifre
    ");
    $kullanici_ekle=$kullanici_kaydet->execute(array(
        'kullanici_mail'=>$posta,
        'kullanici_firma'=>$firma,
        'kullanici_adi'=>$yetkili,
        'kullanici_sifre'=>$sifre_guclendir
    ));

    if ($kullanici_ekle) {
        Header("Location:giris.php?kayit=ok");
    } else {
        Header("Location:kayit.php?kayit=no");
    }
    };
};

// giris.php
if (isset($_POST['giris_yap'])) {
    $posta=htmlspecialchars($_POST['posta']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifre_guclendir=md5($sifre);

    $kullanici_kontrolu=$baglan->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:kullanici_mail and kullanici_sifre=:kullanici_sifre");
    $kullanici_kontrolu->execute(array(
        'kullanici_mail'=>$_POST['posta'],
        'kullanici_sifre'=>$sifre_guclendir
    ));
    $kullanici_varmi=$kullanici_kontrolu->rowCount();

    if ($kullanici_varmi>0) {
    $_SESSION['giris_yapildi']=$posta;
        Header("Location:index.php?giris=ok");
    } else {
        Header("Location:giris.php?giris=no");
    };
}
?>