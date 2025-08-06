<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class CommandInjectionController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('command_injection');

        return view('command_injection.index', ['vulns' => $vulns]);
    }

    public function handleCommandInjectionController(Request $request, $type, $level)
    {
        $controllers = [
            'normal' => [
                '1' => 'commandInjectionErrorBasedLevelOne',
                '2' => 'commandInjectionErrorBasedLevelTwo',
            ],
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function commandInjectionErrorBasedLevelOne(Request $request)
    {
        $ping = null;
        if ($request->host) {
            $command = "ping -c 4 " . $request->host;
            $ping = shell_exec($command);
        }

       return view('command_injection.normal.command_injection-level-1', ['ping' => $ping]);
    }

    public function commandInjectionErrorBasedLevelTwo(Request $request)
    {
        $ping = null;
        if ($request->host) {
            $command = "ping -c 4 " . $request->host . " | grep '64 bytes'";
            $ping = shell_exec($command);
        }

       return view('command_injection.normal.command_injection-level-2', ['ping' => $ping]);
    }
}
