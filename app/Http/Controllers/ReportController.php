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
        $sales_t = Sale::WhereDate('sale_date', Carbon::today('America/Caracas'))
                    ->with('saleDetails.product')
                    ->get();


        $sales = DB::select('SELECT s.id as sale_id, s.sale_date as fecha, s.total as total, s.status as estado, COUNT(sd.sale_id) as totalProductos, SUM(p.utility) as totaUtilidadesDetal, SUM(p.utility_may) as totaUtilidadesMayor
        FROM products p, sales s, sale_details sd  
        WHERE sd.product_id = p.id 
        AND sd.sale_id = s.id
        GROUP BY sd.sale_id');

        $total = $sales_t->sum('total');
        return view('admin.report.reports_day', compact('sales', 'sales_t','total'));
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