<?php
session_start();
session_unset();
session_destroy();
header("Location: authorization_page.php");
exit();
