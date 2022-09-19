<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use App\Product_Provider;
use App\Exchange;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.create')->only(['create','store']);
        $this->middleware('can:products.index')->only(['index']);
        $this->middleware('can:products.edit')->only(['edit','update']);
        $this->middleware('can:products.show')->only(['show']);
        $this->middleware('can:products.destroy')->only(['destroy']);
        $this->middleware('can:change.status.products')->only(['change_status']);
        $this->middleware('can:products.pdf')->only(['pdf']);
    }


    public function index()
    {

        $products = Product::get();
        return view('admin.product.index', compact('products'));

    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        
        return view('admin.product.create', compact('categories','providers'));

    }


    public function store(StoreRequest $request)
    {
        if($request->hasFile('picture')){

            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            $product = Product::create($request->all()+[ 'image' => $image_name]);

            if ($request->input('code') == null) {

                $product->update(['code'=>$product->id]);
            
            }

            $product->providers()->attach($request->providers);

            return redirect()->route('products.index')->with('toast_success', '¡Producto agregado con éxito!');;

        }else{
            
            $product = Product::create($request->all());

            if ($request->input('code') == null) {

                $product->update(['code'=>$product->id]);
            
            }

            $product->providers()->attach($request->providers);
            return redirect()->route('products.index')->with('toast_success', '¡Producto agregado con éxito!');;

        }

    }


    public function show(Product $product)
    {
        $categories = Category::get();
        $exchange = Exchange::latest()->first();
        
        return view('admin.product.show', compact('product','categories', 'exchange'));


    }


    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product','categories','providers'));


    }


    public function update(UpdateRequest $request, Product $product)
    {

       
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);


            $product->update($request->all()+[
                'image' => $image_name,
            ]);

            $product->providers()->sync($request->providers);

        }else{

            $product->update($request->all());
            $product->providers()->sync($request->providers);
        }

        return redirect()->route('products.index');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product -> status == 'ACTIVE'){

            $product -> update(['status' => 'DESACTIVATED']);
            return redirect()->back();

        } else {

            $product -> update(['status' => 'ACTIVE']);
            return redirect()->back();

        }

    }

    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::where('id', $request->product_id)->firstOrFail();
            return response()->json($products);
        }
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }

    public function get_Measure(Request $request){
            if ($request->ajax()) {
                $products = Product::where('id', $request->product_id)->firstOrFail();
                return response()->json($products);
            }
        
    }

    public function pdf()
    {
        $products = Product::get();
        $exchange = Exchange::latest()->first();
        $fecha = Carbon::now('America/Caracas');

        $pdf = SnappyPdf::setOption('enable-local-file-access', true);
        $pdf->loadView('admin.product.pdf', compact('products', 'exchange', 'fecha'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->inline('reporte_de_inventario.pdf');

    }
    


}
