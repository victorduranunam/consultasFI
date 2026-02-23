<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//https://www.ingenieria.unam.mx/consultasfi/Vista


class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
    }

}
