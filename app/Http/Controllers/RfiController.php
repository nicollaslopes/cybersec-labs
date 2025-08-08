<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class RfiController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('rfi');

        return view('rfi.index', ['vulns' => $vulns]);
    }

    public function handleRfiController(Request $request, $type, $level)
    {
        $controllers = [
            'normal' => [
                '1' => 'rfiLevelOne',
            ]
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function rfiLevelOne(Request $request)
    {
        if (isset($request->page) && !empty($request->page)) {
            try {
                require_once $request->page;
                return;
            } catch (\Throwable $th) {
            }
        }
        
        return view('rfi.normal.rfi-level-1', []);
    }
}
