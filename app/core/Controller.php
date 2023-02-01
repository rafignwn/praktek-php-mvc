<?php
class Controller
{
    protected $user = [];
    protected $title = "Shinigami Shop";

    public function __construct() {
        if (isset($_SESSION["auth"])) $this->user = $_SESSION["auth"];
    }

    public function view($view, $data = [])
    {
        $user = $this->user;
        if (isset($_SESSION["auth"])) $user = $_SESSION["auth"];
        require_once(DIR_OF_APP . "/views/" . $view . ".php");
    }

    public function model(string $model)
    {
        require_once(DIR_OF_APP . "/models/" . $model . ".php");
        return new $model;
    }

    public function redirectTo(string $endpoint)
    {
        
        $endpoint = substr($endpoint, 0, 1) == "/" ? $endpoint : "/" . $endpoint;
        echo "<script> window.location.href = '" . BASE_URL . $endpoint . "'; </script>";
    }

    /**
     * isLogin function, digunakan untuk mengecek apakah user sudah login apa belum
     * 
     * @return bool true jika user sudah login dan false jika user belum login
     */
    public function isLogin(): bool {
        if (isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
            return true;
        }

        return false;
    }

    public function user(): object {
        return (object)$_SESSION['auth'];
    }
}
