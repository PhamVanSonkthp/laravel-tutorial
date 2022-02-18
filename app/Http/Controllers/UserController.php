<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(){
        return view('user.home.index');
    }

    public function register(){
        return view('user.authention.register');
    }
}
