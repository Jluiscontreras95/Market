<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use Carbon\Carbon;
use App\Http\Requests\Exchange\StoreRequest;
use App\Http\Requests\Exchange\UpdateRequest;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = Exchange::get();
        return view('admin.exchange.index', compact('exchanges'));
    }

    public function create()
    {
        return view('admin.exchange.create');

    }

    
    public function store(StoreRequest $request)
    {
        $exchange = Exchange::create($request->all()+[
            'exchange_date'=>Carbon::now('America/Caracas'),
        ]);

        return redirect()->route('exchanges.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
