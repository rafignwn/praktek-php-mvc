<?php
class AuthController extends Controller
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = $this->model("users");
    }

    public function login()
    {
        $email_or_username = $_POST["username_or_email"];
        $password = $_POST["password"];
        $valid = $this->modelUser->checkEmailOrUsername($email_or_username);
        $user = $this->modelUser->check($email_or_username, $password);

        // validation email
        if (!$valid) {
            Flasher::setFlasher("Username or email is wrong!", "danger");
            return $this->redirectTo("/");
        }

        // final validation 
        if (!$user) {
            Flasher::setFlasher("Password is wrong!", "danger");
            return $this->redirectTo("/");
        }

        Flasher::setFlasher("Welcome back, " . $user['nama'], "shake");

        unset($user["password"]);
        $_SESSION["auth"] = $user;
        return $this->redirectTo("/");
    }

    public function signin()
    {
        $email_or_username = $_POST["username_or_email"];
        $password = $_POST["password"];
        $valid = $this->modelUser->checkEmailOrUsername($email_or_username);
        $user = $this->modelUser->check($email_or_username, $password);
        $data = [
            'success' => false,
            'error' => false,
        ];

        // validation email
        if (!$valid || empty($email_or_username)) {
            $data = [
                'error' => true,
                'flasher' => [
                    'pesan' => 'Email or username is wrong!',
                    'type' => 'danger',
                ]
            ];
            echo json_encode($data);
            return false;
        }

        // final validation 
        if (!$user) {
            $data = [
                'error' => true,
                'flasher' => [
                    'pesan' => 'Password is wrong!',
                    'type' => 'danger',
                ]
            ];
            echo json_encode($data);
            return false;
        }

        unset($user["password"]);
        $_SESSION["auth"] = $user;
        $this->user = $user;

        $data = [
            'success' => true,
            'name' => $user['nama'],
            'image' => $user['gambar'],
            'flasher' => [
                'pesan' => 'Welcome back, ' . $user['nama'],
                'type' => 'shake',
            ]
        ];

        echo json_encode($data);
        return false;
    }

    public function register()
    {
        // get validate for email and username
        $emailExist = $this->modelUser->checkEmailOrUsername($_POST["email"]);
        $usernameExist = $this->modelUser->checkEmailOrUsername($_POST["username"]);

        // check email and username whether it's user or not
        if ($emailExist || $usernameExist) {
            // if one already used
            $failMessage = $emailExist ? "email" : "username";

            // if both already used;
            if ($emailExist && $usernameExist) {
                $failMessage = "email and username";
            }

            // fail message 
            Flasher::setFlasher("Failed, $failMessage already used", "danger");
        } else {
            // add user
            if ($this->modelUser->tambahPengguna($_POST)) {
                // success message
                Flasher::setFlasher("Account created successfully", "success");
            } else {
                // fail message
                Flasher::setFlasher("Failed to create account", "danger");
            }
        }

        // redirect to home
        return $this->redirectTo("/");
    }

    public function logout()
    {
        Flasher::setFlasher("Bye bye, " . $_SESSION['auth']['nama'], "shake");
        unset($_SESSION["auth"]);
        $this->redirectTo("/");
    }
}
