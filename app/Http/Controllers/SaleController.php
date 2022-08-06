<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use App\Product;
use App\SaleDetail;
use App\Contability;
use Illuminate\Http\Request;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use PhpParser\Node\Stmt\TryCatch;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.create')->only(['create','store']);
        $this->middleware('can:sales.index')->only(['index']);
        $this->middleware('can:sales.show')->only(['show']);
        $this->middleware('can:change.status.sales')->only(['change_status']);
        $this->middleware('can:sales.pdf')->only(['pdf']);
        $this->middleware('can:sales.print')->only(['print']);
    }

    public function index()
    {
        
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    
    }

   
    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients','products'));

    }

    
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Caracas'),
        ]);

        foreach ($request->product_id as $key =>$product){
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);


        $sale = Sale::get()->last();
        $cont = new Contability();

        $cont->sale_id = $sale->id;
        $cont->have = $sale->total;
        $cont->contability_date = $sale->sale_date;
        $cont->description = "Venta";
        $cont->must = 0;

        $cont->save();

        
        return redirect()->route('sales.index');

    }

   
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount /100;
        }
        return view('admin.sale.show', compact('sale','saleDetails','subtotal'));


    }

   
    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.edit', compact('sale'));

    }

  
    public function update(UpdateRequest $request, Sale $sale)
    {
       // $sale->update($request->all());
       // return redirect()->route('sales.index');

    }

    
    public function destroy(Sale $sale)
    {
       // $sale->delete();
       // return redirect()->route('sales.index');
    }

    
    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price; 
        }

        $pdf = Pdf::loadView('admin.sale.pdf', compact('sale','saleDetails','subtotal'));
        return $pdf->download('reporte_de_venta_'.$sale->id.'.pdf');

    }


    public function print(Sale $sale)
    {
        try {
            
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
        
            foreach ($saleDetails as $saleDetail)
            {
                $subtotal += $saleDetail->quantity * $saleDetail->price; 
            }

            return redirect()->back();

            $printer_name = "TM20";

            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer -> text("");
            $printer -> text("");
            $printer -> text("");
            $printer -> text("");
            
            $printer -> cut();
            $printer -> close();

        } catch (\Throwable $th) {

            return redirect()->back();

        }
    }

    public function change_status(Sale $sale)
    {
        if ($sale -> status == 'VALID'){

            $sale -> update(['status' => 'CANCELED']);
            return redirect()->back();
        
        } else {
            
            $sale -> update(['status' => 'VALID']);
            return redirect()->back();
        
        }
    }

}
