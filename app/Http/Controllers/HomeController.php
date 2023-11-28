<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bunga;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        
        return view('Page.Home.Index');
    }
}
