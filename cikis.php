<?php
session_start();
session_destroy();
Header("Location:giris.php?cikis=gulegule");
?>