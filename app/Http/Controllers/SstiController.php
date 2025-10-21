<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;
use Illuminate\Http\Request;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

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
        $loader = new FilesystemLoader('../resources/views/ssti/twig');
        $twig = new Environment($loader);
        $test = "test";

        $template = $twig->createTemplate('Dear {{ first_name }},');
        $output = $twig->render("Dear first_name,", array("first_name" => $a) ); 

        echo $twig->render('index.twig', ['nome' => $output]);

    }
}
