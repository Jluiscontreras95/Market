<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Contability;
use App\Purchase;
use App\Sale;

class ContabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contabilities = Contability::get()->where('status', 'VALID');

        $totales_activos=DB::select('SELECT (SUM(have) - SUM(must)) as total FROM contabilities WHERE status="VALID";');
        $totales_desactivos=DB::select('SELECT (SUM(have) - SUM(must)) as total FROM contabilities WHERE status="CANCELED";');
        $totales_generales=DB::select('SELECT (SUM(have) - SUM(must)) as total FROM contabilities');

        return view('admin.contability.index', compact('contabilities', 'totales_generales', 'totales_activos', 'totales_desactivos'));
    }
}
