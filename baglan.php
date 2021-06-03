<?php

try {
    $baglan = new PDO('mysql:host=localhost; dbname=muhasebe; charset=utf8', 'root', '');

    #echo "Bağlantı başarılı";

} catch (PDOException $e) {

    echo $e->getMessage();
}

?>