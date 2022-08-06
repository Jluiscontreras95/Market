<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use App\ProductsxProvider;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Support\Facades\DB;

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
            $product = Product::create($request->all()+[ 'image' => $image_name,]);
            $product->update(['code'=>$product->id]);
            $products_provider = Product::get()->last();
            $cont = new ProductsxProvider();
            $cont->product_id = $products_provider->id;
            $cont->provider_id = $products_provider->provider_id;

            $cont->save();
            return redirect()->route('products.index')->with('toast_success', '¡Producto agregado con éxito!');;
        
        }else{

            $product = Product::create($request->all());
            $product->update(['code'=>$product->id]);
            $products_provider = Product::get()->last();
            $cont = new ProductsxProvider();
            $cont->product_id = $products_provider->id;
            $cont->provider_id = $products_provider->provider_id;

            $cont->save();
            return redirect()->route('products.index')->with('toast_success', '¡Producto agregado con éxito!');;

        }

    }

   
    public function show(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.show', compact('product','categories','providers'));


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

        }else{

            $product->update($request->all());
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
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }

    public function get_Providers(Request $request){

        if ($request->ajax()) {
            $providers_product = Productsxprovider::where('provider_id', $request->provider_id)
            ->get();
            return response()->json($providers_product);

        }

    }
    
    public function prueba(Request $request){


    }
    
}
