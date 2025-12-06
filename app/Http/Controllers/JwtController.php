<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class JwtController extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('jwt');

        return view('jwt.index', ['vulns' => $vulns]);
    }

    public function handleJwtController(Request $request, $type, $level)
    {
        $controllers = [
            'weak_secret' => [
                '1' => 'jwtWeakSecretLevelOne',
            ]
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function jwtWeakSecretLevelOne() 
    {
        return view('jwt.weak_secret.jwt-level-1', ['isLogged' => true]);
    }

    public function createJWT()
    {

    }

    public function validateJWT()
    {
        
    }
}
