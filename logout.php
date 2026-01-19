<?php
session_start();
session_destroy();
header("Location: login_admin.php?logout=1");
exit();
?>
