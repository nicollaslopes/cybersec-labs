<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
        $jwtToken = "";
        if(!isset($_COOKIE["user"])) {
            $jwtToken = $this->createJWT();
            setcookie("user", $jwtToken, time() + 3600);
            $isJwtValid = $this->validateJWT($jwtToken);
        } else {
            $jwtToken = $_COOKIE["user"];
            $isJwtValid = $this->validateJWT($jwtToken);
        }

        if(!$isJwtValid) {
            return view('jwt.weak_secret.jwt-level-1', ["error" => true]);
        }

        $jwtDecoded = $this->decodeJwt($jwtToken);

        return view('jwt.weak_secret.jwt-level-1', ["isAdmin" => $jwtDecoded->isAdmin]);
    }

    public function createJWT()
    {
        $payload = [
            "user" => "guest",
            "isAdmin" => false,
            "iat" => time(),
            "exp" => time() + 3600,
        ];

        return JWT::encode($payload, env("JWT_SECRET"), "HS256");
    }

    public function validateJWT($jwtToken)
    {
        try {
            $isValid = JWT::decode($jwtToken, new Key(env("JWT_SECRET"), "HS256"));
            if ($isValid) {
                return true;
            }
            return false;

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function decodeJwt($jwtToken){
        return JWT::decode($jwtToken, new Key(env("JWT_SECRET"), "HS256"));
    }
}
