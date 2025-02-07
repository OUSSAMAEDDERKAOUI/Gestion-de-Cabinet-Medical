<?php
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once(__DIR__ . '/../config/database.php');  

class UserController {

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $userRepository = new UserRepository();
            $loggedUser = $userRepository->findByEmailAndPassword($email, $password);

            if ($loggedUser) {
                $_SESSION['user_id'] = $loggedUser->getIdUser();
                $_SESSION['user_role'] = $loggedUser->getRole();
                echo 'ygvb';
                include_once('Location: ../../public/index.php/dashboard');
                exit;
            } else {
                echo 'Identifiants invalides.';
            }
        } else {
            include_once __DIR__ . '/../views/login.php';
        }
    }
    public function index() {
        include_once __DIR__ . '/../views/dashboard.php';
    }
}
