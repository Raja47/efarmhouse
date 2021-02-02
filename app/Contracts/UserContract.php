<?php

namespace App\Contracts;

interface UserContract
{
    //public function storeOrderDetails($params);

    public function listUsers(string $user = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findUserById($userId);
}
