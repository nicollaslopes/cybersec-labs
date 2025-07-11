<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use Illuminate\Http\Request;

class XssController extends Controller
{
    public function show()
    {
        $a = Vulnerability::all();

        dd($a);
    }
}
