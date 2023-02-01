<?php
// menjalankan session
if (!session_id()) session_start();

// mengimpor file init di folder app
require_once "app/init.php";

$app = new App();
