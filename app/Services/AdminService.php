<?php
require_once __DIR__ . "/../Repositories/UserRepository.php";

class AdminService
{

    public static function findAllUsers()
    {
        $userRepository = new UserRepository();

        $users = $userRepository->findAll();
        $users = array_filter($users, function ($user) {
            return $user->getRole !== 'admin';
        });

        return $users;
    }



}
