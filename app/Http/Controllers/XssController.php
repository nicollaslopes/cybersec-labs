<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class XssController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('xss');

        return view('xss.index', ['vulns' => $vulns]);
    }

    public function showVuln($type, $level)
    {   
        $file = "xss.$type.xss-level-$level";

        return view ($file);
    }

    public function xssReflectedLevelOne(Request $request)
    {
        return view('xss.reflected.xss-level-1', [
            'name' => $request->query('name'),
            'success' => true
        ]);
    }

    public function xssReflectedLevelTwo(Request $request)
    {
        $success = true;

        if (str_contains($request->query('name'), '<script>')) {
            $success = false;
        }

        return view('xss.reflected.xss-level-2', [
            'name' => $request->query('name'),
            'success' => $success
        ]);
    }
}
