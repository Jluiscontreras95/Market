<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exchange;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasmes=DB::select('SELECT DATE_FORMAT(purchase_date, "%m") as mesdate, DATE_FORMAT(purchase_date, "%M") as mesname, DATE_FORMAT(purchase_date, "%Y") as anio,  SUM(total) as totalmes 
        FROM purchases 
        WHERE status="VALID" 
        GROUP BY mesdate, mesname, anio 
        ORDER BY mesdate, anio
        ASC;');

        $ventasmes=DB::select('SELECT DATE_FORMAT(sale_date, "%m") as mesdate, DATE_FORMAT(sale_date, "%M") as mesname, DATE_FORMAT(sale_date, "%Y") as anio,  SUM(total) as totalmes 
        FROM sales 
        WHERE status="VALID" 
        GROUP BY mesdate, mesname, anio 
        ORDER BY mesdate, anio
        ASC;');

        $ventasdia=DB::select(' SELECT DATE_FORMAT(sale_date, "%d") as dia, DATE_FORMAT(sale_date, "%m") as mesdate, DATE_FORMAT(sale_date, "%M") as mesname, DATE_FORMAT(sale_date, "%Y") as anio,  SUM(total) as totaldia 
        FROM sales 
        WHERE status="VALID" 
        GROUP BY dia, mesdate, mesname, anio 
        ORDER BY mesdate, dia, anio
        ASC limit 15;');

        $totales=DB::select('SELECT 
        (select ifnull(sum(c.total),0) from purchases c where MONTH(purchase_date) = MONTH(CURDATE()) AND YEAR(purchase_date) = YEAR(CURDATE()) AND c.status="VALID") as totalcompra,
        (select ifnull(sum(v.total), 0) from sales v where MONTH(sale_date) = MONTH(CURDATE()) AND YEAR(sale_date) = YEAR(CURDATE()) AND v.status="VALID") as totalventa');


        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
       
       $exchange = Exchange::latest()->first();
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos', 'exchange'));
    }
}