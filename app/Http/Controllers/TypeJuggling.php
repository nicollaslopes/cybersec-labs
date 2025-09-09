<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;

class TypeJuggling extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('type_juggling');

        return view('type_juggling.index', ['vulns' => $vulns]);
    }

        public function handleTypeJugglingController(Request $request, $type, $level)
    {
        $controllers = [
            'normal' => [
                '1' => 'typeJugglingLevelOne',
            ]
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function typeJugglingLevelOne()
    {
        return view('type_juggling.normal.type-juggling-level-1', []);
    }

    public static function validateApiKey(Request $request)
    {
        $secret_api = "s3cr3t_k3y";

        if ($request->isMethod('post')) {
            $data_json = file_get_contents('php://input');
            if(isset($data_json) && !empty($data_json)) {
                $data = json_decode($data_json);
                if ($data->api_key == $secret_api) {
                    return response()->json('API key is valid!');
                } else {
                    return response()->json('Invalid API Key!');
                }
            }
        }
    }
}
