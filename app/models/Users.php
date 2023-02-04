<?php
class Users
{
    private $tableName = "users";
    private $db;

    public function __construct()
    {
        $this->db = new Database();

        // membuat function str_contains jika tidak ada
        // jika versi php di bawah 8.0 maka function str_contains belum tersedia
        if (!function_exists('str_contains')) {
            function str_contains($haystack, $needle): bool
            {
                if (is_string($haystack) && is_string($needle)) {
                    return '' === $needle || false !== strpos($haystack, $needle);
                } else {
                    return false;
                }
            }
        }
    }

    // function yang digunakan untuk mengecek password, apakan benar atau tidak
    public function check($username_or_email, $password)
    {
        if (str_contains($username_or_email, "@")) {
            $this->db->query("SELECT * FROM $this->tableName WHERE email = :origin_email AND password = :origin_password");
            $this->db->bind("origin_email", $username_or_email);
        } else {
            $this->db->query("SELECT * FROM $this->tableName WHERE username = :origin_username AND password = :origin_password");
            $this->db->bind("origin_username", $username_or_email);
        }

        $this->db->bind("origin_password", md5($password));
        return $this->db->single();
    }


    // function di gunakan untuk cek email atau username, apakah benar atau tidak 
    public function checkEmailOrUsername($username_or_email)
    {
        if (str_contains($username_or_email, "@")) {
            $this->db->query("SELECT * FROM $this->tableName WHERE email = :origin_email");
            $this->db->bind("origin_email", $username_or_email);
        } else {
            $this->db->query("SELECT * FROM $this->tableName WHERE username = :origin_username");
            $this->db->bind("origin_username", $username_or_email);
        }
        return $this->db->single();
    }

    // menambahkan user baru
    public function addUser($user = ["name" => "", "username" => "", "email" => "", "password" => ""])
    {
        if (!empty($user["name"])) {
            // $this->db->query("INSERT INTO $this->tableName (name, username, email, password) VALUES ('" . $user['name'] . "', '" . $user['username'] . "', '" . $user['email'] . "', '" . $pw . "');");
            $this->db->query("INSERT INTO $this->tableName (name, username, email, password) VALUES (:ori_name, :ori_username, :ori_email, :ori_password)");
            $this->db->bind("ori_name", $user["name"]);
            $this->db->bind("ori_username", $user["username"]);
            $this->db->bind("ori_email", $user["email"]);
            $this->db->bind("ori_password", md5($user["password"]));

            return $this->db->execute();
        }
    }

    public function tambahPengguna($pengguna = ["nama" => "", "username" => "", "email" => "", "password" => ""])
    {
        // membuat query untuk menambahkan data
        $this->db->query("INSERT INTO $this->tableName (nama, username, email, password) VALUES (:nama_pengguna, :username_pengguna, :email_pengguna, :password_pengguna)");
        $this->db->bind("nama_pengguna", $pengguna["nama"]);
        $this->db->bind("username_pengguna", $pengguna["username"]);
        $this->db->bind("email_pengguna", $pengguna["email"]);
        $this->db->bind("password_pengguna", md5($pengguna["password"]));

        // execute query
        return $this->db->execute();
    }

    // mengambil data users
    public function getUsers()
    {
        $this->db->query("SELECT * FROM $this->tableName");
        return $this->db->fetchAllResult();
    }
}
