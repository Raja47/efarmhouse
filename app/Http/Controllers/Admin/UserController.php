<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\UserContract;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\BaseController;
class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->listUsers();
        $this->setPageTitle('listUsers', 'List of all users');
        return view('admin.users.index', compact('users'));
    }

    public function show()
    {
        $Id = auth()->id;
        $user= $this->userRepository->findUserById($userId);

        $this->setPageTitle('User Details', $userId);
        return view('admin.users.show', compact('user'));
    }
}
