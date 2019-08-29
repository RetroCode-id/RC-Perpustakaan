<?php
session_start();
sleep(1);

$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;
