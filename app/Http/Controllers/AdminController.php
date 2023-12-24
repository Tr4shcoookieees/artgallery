<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();;
        $tab = 'dashboard';
        $page = 'main';
        return view('admin.index', compact('user', 'tab', 'page'));
    }

    public function orders()
    {
        $user = auth()->user();
        $orders = Order::with('user', 'status', 'artwork')->paginate(25);
        $tab = 'commerce';
        $page = 'orders';
        return view('admin.orders', compact('user', 'tab', 'page', 'orders'));
    }

    public function customers()
    {
        $user = auth()->user();
        $customers = User::has('orders')->with('city', 'country', 'orders')->withCount('orders')->paginate(25);
        $tab = 'commerce';
        $page = 'customers';
        return view('admin.customers', compact('user', 'tab', 'page', 'customers'));
    }

    public function users()
    {
        $user = auth()->user();
        $users = User::with('country', 'city', 'role')->paginate(25);
        $tab = 'community';
        $page = 'users';
        return view('admin.users', compact('user', 'tab', 'page', 'users'));
    }

    public function authors()
    {
        $user = auth()->user();
        $authors = Author::with('orders')->withCount('artworks')->paginate(25);
        $tab = 'community';
        $page = 'authors';
        return view('admin.authors', compact('user', 'tab', 'page', 'authors'));
    }
}
