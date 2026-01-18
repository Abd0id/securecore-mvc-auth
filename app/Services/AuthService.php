<?php
require_once __DIR__ . "/../Repositories/UserRepository.php";

class AuthService
{
    public static function register($name, $email,$role ,$password)
    {

        $userRepository = new UserRepository();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($name, $email,$role);
        $user->setPassword($hashedPassword);

        try {
            $user = $userRepository->create($user);
        } catch (throwable $error) {
            $_SESSION['form_errors'][] = 'Error creating user';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public static function redirect(string $role)
    {
        if ($role === 'admin') {
            return header('Location: ../admin/dashboard.php');
        } else if ($role === 'user') {
            return header('Location: ../public/dashboard.php');
        }
    }

    public static function login(array $post): ?User
    {

        $userRepository = new UserRepository();

        $email = $post['email'] ?? '';
        $password = $post['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $_SESSION['form_errors'][] = "Email invalide";
        ;
        if (strlen($password) < 6)
            $_SESSION['form_errors'][] = "Mot de passe trop court";

        if (!empty($_SESSION['form_errors'])) {
            return null;
        }
        try {
            $user = $userRepository->findByEmail($email);
        } catch (throwable $error) {
            $_SESSION['form_errors'][] = 'Error creating user';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        if (!$user || !password_verify($password, $user->getPassword())) {
            $_SESSION['form_errors'][] = "Email ou mot de passe incorrect";
            return null;
        } else {
            return $user;
        }


    }
}
