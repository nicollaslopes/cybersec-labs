<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use App\Models\User;
use Illuminate\Http\Request;

class CsrfController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('csrf');

        return view('csrf.index', ['vulns' => $vulns]);
    }

    public function update(Request $request)
    {
        if ($request->email != 'admin@admin.com') {
            return view('csrf.normal.csrf-level-1', ['error_message' => "You are not allowed to change another user's email address!"]);
        }

        $user = User::where('email', 'admin@admin.com')->first();

        $user->update([
            'password' => $request->password
        ]);

        return redirect()->route('csrf');
    }
}

