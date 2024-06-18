<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    // pendaftaran
    function pendaftaran()
    {
        return view("pendaftaran");
    }
}