<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public $title;
    public function __construct()
    {
        $this->title = 'Dashboard';
    }
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('home', ['title' => $this->title]);
        } else {
            return view('home', ['title' => $this->title]);
        }
    }
}
