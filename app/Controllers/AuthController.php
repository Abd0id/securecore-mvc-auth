<?php
require_once __DIR__ . '/../Services/AuthService.php';

session_start();

$form_errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['deconnect'])) {
    session_unset();
    session_destroy();
    header('Location:  ../public/index.php');
    exit;
}

if (isset($_SESSION['userId'])) {
    AuthService::redirect($_SESSION['userRole']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $result = AuthService::login($_POST);
    if ($result) {
        $_SESSION['userId'] = $result->getId();
        $_SESSION['userEmail'] = $result->getEmail();
        $_SESSION['userRole'] = $result->getRole();
        AuthService::redirect($_SESSION['userRole']);
        exit;
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {


    if (empty($_POST['name']) || empty($_POST['role']) || empty($_POST['email']) || empty($_POST['password'])) {
        $form_errors[] = 'Tous les champs sont obligatoires';
    }

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        $form_errors[] = 'Les mots de passe ne correspondent pas';
    }

    if (empty($form_errors)) {

        try {
            AuthService::register(
                trim(string: $_POST['name']),
                trim($_POST['email']),
                trim(string: $_POST['role']),
                $_POST['password']
            );
            // header('Location: ../Views/log-in.php');
            exit;
        } catch (Throwable $e) {
            $form_errors[] = 'Email déjà utilisé';
        }
    }


    $_SESSION['form_errors'] = $form_errors;
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
