<html>

<style>
    strong{
        font-size: x-large !important;
        color: red !important;
    }
    .Color{
        color: red !important;
    }
</style>

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
    <div class="container bg-light">
        <div class="row align-items-center">
            <div class="col text-center">
                @foreach ($businesses as $business)
                    <img src="{{asset('image/'.$business->logo)}}" alt="profile" class="text-center">
                @endforeach
            </div>
            <div class="col">
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
            <div class="col">
                <hr>
                    <h4 class="text-center">{{$business->address}}</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach ($saleDetails as $saleDetail)
            <div class="col">
               <p> Factura: <strong class="ml-3">N° {{$saleDetail->sale_id}}</strong> </p>
            </div>
            <div class="col">
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
            <div class="col">
                <h4 class="text-center mt-5 color">ORIGINAL CLIENTE</h4>
            </div>
            <div class="col">
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
                <h5>ESTA FACTURA VA SIN TACHADURAS NI ENMENDADURAS.</h5>
            </div>
        </div>
    </div>
    </body>
    <footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </footer>
</html>