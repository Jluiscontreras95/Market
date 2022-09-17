<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleDetail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
    }
    public function reports_day(){
        $sales = Sale::WhereDate('sale_date', Carbon::today('America/Caracas'))->with('saleDetails.product')->get();


        // $sales = DB::table('sales')
        // ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
        // ->join('products', 'products.id', '=', 'sale_details.product_id')
        // ->select('sales.*', 'products.*', 'sale_details.*')
        // ->get();





        $total = $sales->sum('total');
        return view('admin.report.reports_day', compact('sales','total'));
    }
    public function reports_date(){
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Caracas'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));
    }
    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total')); 
    }
}