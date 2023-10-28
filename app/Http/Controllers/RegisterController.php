<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function index(){
        return view('register');
    }

    public function store(){
        $user = request()->validate([
            'name' => 'required|min:3|max:25',
            'email' => "required|email|unique:users,email",
            'mobile' =>'required|min:10|max:10',
            'password' =>'required|min:8',
            'confirm_password' =>'required_with:password|same:password|min:8'
        ]);
        $user['password'] = bcrypt($user['password']);
        $users = User::create($user);
        return redirect('register')->with('message', 'User Registered Successfully');
    }}
