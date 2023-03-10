<?php
class Flasher
{
    public static function setFlasher(string $pesan = "Wellcome to my website!", string $type = "blank")
    {
        $_SESSION["flash"] = [
            "pesan" => $pesan,
            "type" => $type
        ];

        
    }

    public static function getFlash()
    {
        if (isset($_SESSION["flash"])) {
            echo "<script> document.addEventListener('DOMContentLoaded', () => createAlert({text: '" . $_SESSION['flash']['pesan'] . "', type: '" . $_SESSION['flash']['type'] . "', delay: { show: 1500, end: 8000 }})); </script>";
            // var_dump($_SESSION['flash']);die();
            
            // unset session flash
            unset($_SESSION["flash"]);
        }
    }
}
