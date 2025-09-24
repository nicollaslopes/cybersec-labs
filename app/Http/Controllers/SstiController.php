<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class SstiController extends Controller
{
        public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('ssti');

        return view('ssti.index', ['vulns' => $vulns]);
    }

    public function handleSstiController(Request $request, $type, $level)
    {
        $controllers = [
            'twig' => [
                '1' => 'sstiTwigLevelOne',
            ],
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function sstiTwigLevelOne(Request $request)
    {
        dd('a');
    }
}
