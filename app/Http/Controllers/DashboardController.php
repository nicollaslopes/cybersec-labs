<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $vulns = Vulnerability::all();

        return view('index', ['vulns' => $vulns]);
    }
}
