<?php

namespace App\Http\Controllers;
use App\Retention;
use App\Purchase;
use App\Provider;
use App\Product;
use App\PurchaseDetails;
use App\Exchange;
use App\Business;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RetentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Purchase $purchase)
    {
        // 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Purchase $purchase)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
            $retention = Retention::create($request->all());
            
            return redirect()->route('purchases.index')->with('toast_success', '¡Retencion agregada con éxito!');;

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $retentionData = Retention::find($id);
        $retentionData->purchase_id = request('purchase_id');
        $retentionData->n_control = request('n_control');
        $retentionData->n_debit = request('n_debit');
        $retentionData->total = request('total');
        $retentionData->exempt_amount = request('exempt_amount');
        $retentionData->taxable_base = request('taxable_base');
        $retentionData->share = request('share');
        $retentionData->iva = request('iva');
        $retentionData->retention = request('retention');
        $retentionData->detained = request('detained');
        $retentionData->total_pagar = request('total_pagar');
        $retentionData->total_neto = request('total_neto');
        
        $retentionData->save();
       
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_Retention_create(Request $request){

        if ($request->ajax()) {

            $purchase_modal = Purchase::where('id', $request->purchase_id)->with('purchaseDetails', 'provider')->firstOrFail();
            
            return response()->json($purchase_modal);

        }

    }

    public function get_Retention_edit(Request $request){

        if ($request->ajax()) {

            $purchase_modal = Purchase::where('id', $request->purchase_id)->with('purchaseDetails', 'provider', 'retention')->firstOrFail();
            
            return response()->json($purchase_modal);

        }

    }

    public function get_Retention_update($id){

        $retentionData = Retention::find($id);
        $retentionData->purchase_id = request('purchase_id');
        $retentionData->n_control = request('n_control');
        $retentionData->n_debit = request('n_debit');
        $retentionData->total = request('total');
        $retentionData->exempt_amount = request('exempt_amount');
        $retentionData->taxable_base = request('taxable_base');
        $retentionData->share = request('share');
        $retentionData->iva = request('iva');
        $retentionData->retention = request('retention');
        $retentionData->detained = request('detained');
        $retentionData->total_pagar = request('total_pagar');
        $retentionData->total_neto = request('total_neto');
        
        $retentionData->save();
       
        return json_encode(array('statusCode'=>200));

    }
}
