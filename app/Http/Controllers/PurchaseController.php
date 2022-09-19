<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use App\PurchaseDetails;
use App\Contability;
use App\Exchange;
use App\Business;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:purchases.create')->only(['create','store']);
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.show')->only(['show']);
        $this->middleware('can:change.status.purchases')->only(['change_status']);
        $this->middleware('can:purchases.pdf')->only(['pdf']);
        $this->middleware('can:upload.purchases')->only(['upload']);
    }

    public function index()
    {
        
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    
    }

   
    public function create()
    {
        $providers = Provider::get();
        $exchange = Exchange::select('description')->latest()->first();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.purchase.create', compact('providers','products','exchange'));

    }

    
    public function store(StoreRequest $request)
    {
       

        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Caracas'),
        ]);

        foreach ($request->product_id as $key =>$product){
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "measure"=>$request->measure[$key], "tax"=>$request->tax[$key]);
        }

        
        
        $purchase->purchaseDetails()->createMany($results);

        
        $purchase = Purchase::get()->last();
        $cont = new Contability();

        $cont->purchase_id = $purchase->id;
        $cont->have = 0;
        $cont->contability_date = $purchase->purchase_date;
        $cont->description = "Compra";
        $cont->must = $purchase->total;

        $cont->save();

        return redirect()->route('purchases.index');

    }

   
    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        
        foreach ($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price; 
        }

        return view('admin.purchase.show', compact('purchase','purchaseDetails','subtotal'));


    }

   
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase'));

    }

  
    public function update(UpdateRequest $request, Purchase $purchase)
    {
       // $purchase->update($request->all());
       // return redirect()->route('purchases.index');

    }

    
    public function destroy(Purchase $purchase)
    {
       // $purchase->delete();
       // return redirect()->route('purchases.index');
    }


    public function upload(UpdateRequest $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        return redirect()->route('purchases.index');

    }

    public function change_status(Purchase $purchase)
    {
        
        if ($purchase -> status == 'VALID'){

            $purchase -> update(['status' => 'CANCELED']);
            return redirect()->back();
        
        } else {
            
            $purchase -> update(['status' => 'VALID']);
            return redirect()->back();
        
        }
    }

    public function get_Products(Request $request){
        
        $provider_id = $request->input('provider_id');
        
        if ($request->ajax()) {
            
            $providers = Provider::findOrFail($provider_id)->products()->get();
            return response(json_encode($providers),200)->header('Content-type', 'text/plain');

        }

    }


    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        
        foreach ($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price; 
        }

        $businesses = Business::get();

        $pdf = SnappyPdf::setOption('enable-local-file-access', true);
        $pdf->loadView('admin.purchase.pdf', compact('purchase','purchaseDetails','subtotal', 'businesses'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->inline('retención_de_compra'.$purchase->id.'.pdf');

    }

    public function retention(Purchase $purchase)
    {
        // 
        
        
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        
        foreach ($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price; 
        }

        $businesses = Business::get();
        return view('admin.retention.index', compact('purchase','purchaseDetails','subtotal'));
    }

}
