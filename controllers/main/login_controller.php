<?php
require_once('models/Account.php');

require_once('controllers/base_controller.php');

class LoginController extends BaseController
{
    function __construct()
    {
        $this->folder = 'views/main/login';
    }

    public function signin()
    {
        $this->render('signin');
    }
    public function signup()
    {
        $this->render('signup');
    }
    public function signin_action()
    {
        $role = 'customer';
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (isset($_POST['employee'])) $role = 'employee';
        $result = Account::checkSignInAccount(
            $_POST['username'],
            $_POST['password'],
            $role
        );
        if ($result == "customer") $_SESSION['customer_id'] = Account::getCustomerIdByUsername($username);

        if (isset($_POST['remember']) && $result != "guest") {
            setcookie("username", $username, time() + (7 * 24 * 60 * 60));
            setcookie("password", $password, time() + (7 * 24 * 60 * 60));
            setcookie("role", $result, time() + (7 * 24 * 60 * 60));
        }
        $_SESSION['role'] = $result;
        echo $result;
    }
    public function signup_action()
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (strlen($name) < 1 || strlen($name) > 30) {
            echo "invalidName";
        } else if (!is_numeric($age)) {
            echo "charAge";
        } else if (intval($age) < 12 || intval($age) > 100) {
            echo "invalidAge";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "invalidEmail";
        } else if (strlen($username) < 1 || strlen($username) > 20) {
            echo "invalidUsername";
        } else if (strlen($password) < 1 || strlen($password) > 20) {
            echo "invalidPassword";
        } else {
            $result = Account::checkSignUp($name, $age, $email, $gender, $username, $password);
            echo $result;
        }
    }
    public function signout_action()
    {
        if (isset($_SESSION['cart'])) unset($_SESSION['cart']);
        if (isset($_SESSION['customer_id'])) unset($_SESSION['customer_id']);
        if (isset($_SESSION['employee_id'])) unset($_SESSION['employee_id']);
        if (isset($_COOKIE['username'])) setcookie('username', '', time() - 3600);
        if (isset($_COOKIE['password'])) setcookie('password', '', time() - 3600);
        if (isset($_COOKIE['role'])) setcookie('role', '', time() - 3600);
        echo "signed out";
    }
    public function remember_login()
    {
        if (isset($_COOKIE['username'])) {
            $result = Account::checkSignInAccount(
                $_COOKIE['username'],
                $_COOKIE['password'],
                $_COOKIE['role']
            );
            echo $result;
        } else {
            echo "guest";
        }
    }
}
