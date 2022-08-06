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

        $totales=DB::select('SELECT (SUM(have) - SUM(must)) as total  
                                FROM contabilities 
                                WHERE status="VALID";');



        return view('admin.contability.index', compact('contabilities', 'totales'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
