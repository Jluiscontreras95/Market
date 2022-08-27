<!DOCTYPE>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de venta</title>
    <style>
        <?php 
            include( public_path() . '/css/bootstrap/bootstrap.css' );
        ?>
        strong{
            font-size: x-large !important;
            color: red !important;
        }
        .Color{
            color: red !important;
        }
    </style>
</head>
<body>
    <div class="container bg-light">   
        
        <div class="row ">
            <div class="col-6 float-right pb-5 pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Lugar de emision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Sede Principal</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Dia</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Año</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($sale->sale_date)->format('d')}}</th>
                            <th scope="row">{{\Carbon\Carbon::parse($sale->sale_date)->format('M')}}</th>
                            <th scope="row">{{\Carbon\Carbon::parse($sale->sale_date)->format('y')}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6 float-left pb-4">
                @foreach ($businesses as $business)
                    <img src="{{ public_path('image/'.$business->logo) }}">
                @endforeach
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">    
                <h5 class="text-muted text-left">{{$business->address}}</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach ($saleDetails as $saleDetail)
                <div class="col-6 float-left">
                    <p> Factura: <strong class="ml-3">N° {{$saleDetail->sale_id}}</strong> </p>
                </div>
                <div class="col-6 float-right">
                    <p> N° de Control: <strong class="ml-3"> {{$saleDetail->sale_id}}</strong> </p>
                </div>
            @endforeach
            <hr>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre Apellido o Razón Social:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$sale->client->name}}</th>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Domicilio Fiscal:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$sale->client->address}}</th>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Teléfono:</th>
                    <th scope="col">RIF:</th>
                    <th scope="col">Condiciones de pago:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$sale->client->phone}}</th>
                    <th scope="row">{{$sale->client->dni}}</th>
                    <th scope="row"></th>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Kilos/Unidades:</th>
                    <th scope="col">Articulos:</th>
                    <th scope="col">P.Kgs/Und:</th>
                    <th scope="col">Descuento:</th>
                    <th scope="col">Monto:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saleDetails as $saleDetail)
                    <tr>
                        <th scope="row">{{$saleDetail->quantity}}</th>
                        <th scope="row">{{$saleDetail->product->name}}</th>
                        <th scope="row">Bs.{{$saleDetail->price}}</th>
                        <th scope="row">Bs.{{$saleDetail->discount}}</th>
                        <th scope="row">Bs.{{number_format($saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100 ,2)}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col float-right">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Base Imponible:</th>
                            <th scope="col">Bs.{{number_format($subtotal,2)}}</th>
                        </tr>
                        <tr>
                            <th scope="col">IVA _(%):</th>
                            <th scope="col">Bs.{{number_format($subtotal * $sale->tax / 100 ,2)}}</th>
                        </tr>
                        <tr>
                            <th scope="col">Valor Total:</th>
                            <th scope="col">Bs.{{number_format($sale->total ,2)}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h4 class="text-center mt-5 color">ORIGINAL CLIENTE</h4>
            </div>
            <div class="col text-center">
                <h5>ESTA FACTURA VA SIN TACHADURAS NI ENMENDADURAS.</h5>
            </div>
        </div>
    </div>
</body>
</html>
