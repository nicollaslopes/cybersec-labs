<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class LfiController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('lfi');

        return view('lfi.index', ['vulns' => $vulns]);
    }

    public function handleLfiController(Request $request, $type, $level)
    {
        $controllers = [
            'normal' => [
                '1' => 'lfiLevelOne',
            ]
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function lfiLevelOne(Request $request)
    {
        if (isset($request->page) && !empty($request->page)) {
            require_once "../resources/views/lfi/normal/" . $request->page;
            return;
        }
        
        return view('lfi.normal.lfi-level-1', []);
    }
}
