<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use App\Models\UserMongo;
use Illuminate\Http\Request;

class NoSqlInjectionController extends Controller
{
    public function __construct()
    {
        UserMongo::createMongoUser();
    }

    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('no_sql_injection');

        return view('no_sql_injection.index', ['vulns' => $vulns]);
    }

    public function handleNoSqlInjectionController(Request $request, $type, $level)
    {
        $controllers = [
            'normal' => [
                '1' => 'noSqlInjectionNormalLevelOne',
            ],
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function noSqlInjectionNormalLevelOne(Request $request)
    {
        $user = $request->user;
        $password = $request->password;

        $userMongo = UserMongo::raw(function($collection) use ($user, $password) {
            return $collection->findOne([
                'user_name' => $user,
                'password' => $password
            ]);
        });

        $errorMessage = '';
        if (!$userMongo && !empty($user)) {
            $errorMessage = 'Incorrect user or password!';
        }

        if (!$userMongo) {
            return view('no_sql_injection.normal.no_sql_injection-level-1', ['errorMessage' => $errorMessage]);
        }

        return view('no_sql_injection.normal.no_sql_injection-level-1-success', ['user' => $userMongo]);
    }
}
