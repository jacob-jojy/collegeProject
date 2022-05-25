<?php
session_start();
//unset($_SESSION["hellodocsession"]);
session_destroy();
header("Location: ./index.php");
