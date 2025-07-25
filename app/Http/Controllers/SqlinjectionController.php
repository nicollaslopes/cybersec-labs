<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vulnerability;
use App\Models\VulnerabilityDetails;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SqlinjectionController extends Controller
{
    public function show()
    {
        $id = Vulnerability::where('name', 'sql_injection')->first();

        $vulns = VulnerabilityDetails::where('id_vulnerability', $id->id)->get();

        return view('sql_injection.index', ['vulns' => $vulns]);
    }

    public function handleSqlInjectionController(Request $request, $type, $level)
    {
        $controllers = [
            'error_based' => [
                '1' => 'sqlInjectionErrorBasedLevelOne',
                '2' => 'sqlInjectionErrorBasedLevelTwo'
            ],
        ];

        $method = $controllers[$type][$level];

        return call_user_func([$this, $method], $request);
    }

    public function sqlInjectionErrorBasedLevelOne(Request $request)
    {
        $search = $request->search;
        if (isset($search) && !empty($search)) {
            try {
                $rawSQL = "SELECT * FROM products WHERE name like '%$search%'";
                $products = DB::select($rawSQL);
            } catch (QueryException $e) {
                return view('sql_injection.error_based.sql_injection-level-1', ['error_message' => $e->getMessage()]);
            }
        } else {
            $products = DB::select("SELECT * FROM products");
        }

        return view('sql_injection.error_based.sql_injection-level-1', ['products' => $products]);
    }
}
