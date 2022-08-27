<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reporte de compra</title>
        <style>
            <?php 
                include( public_path() . '/css/bootstrap/bootstrap.css' );
            ?>

            p {
                font-size: 15px;
            }
        </style>
    </head>
    <body>

    <div class="col-3 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Nombre o Razón Social del Agente de la Retención.</p></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($businesses as $business)
                    <tr>
                        <td scope="row">{{$business->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-3 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>RIF del Agente de la Retención.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{$business->rif}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="col-6 float-right">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>xxxxxxxxxxxx</p></th>
                </tr>
            </thead>
        </table>
    </div>
    
    <div class="col-6 float-right">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Fecha de Emision.</p></th>
                    <th scope="col" ><p>Fecha de Entrega.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}</td>
                    <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-6 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p></p></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-6 float-right">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Periodo Fiscal</p></th>
                </tr>
            </thead>
        </table>
    </div>
    
    <div class="col-6 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p></p></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-6 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p></p></th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="col-6 float-right">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Año.</p></th>
                    <th scope="col" ><p>Mes.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('y')}}</td>
                    <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('M')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-3 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Nombre o Razón Social del Retenido.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{$purchase->provider->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-3 float-left">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>RIF del Retenido.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{$purchase->provider->rif_number}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="col">
        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Dirección Fiscal del Agente de la Retención.</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{$business->address}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    
    




        <table class="table table-bordered">
            <thead class="thead-dark">   
                <tr>
                    <th scope="col" ><p>Oper.</p></th>
                    <th scope="col" ><p>Fecha de Documento</p></th>
                    <th scope="col" ><p>N° de Factura</p></th>
                    <th scope="col" ><p>N° de Control de Factura</p></th>
                    <th scope="col" ><p>N° de Nota de Debito</p></th>
                    <th scope="col" ><p>N° de Factura Afectada</p></th>
                    <th scope="col" ><p>Monto Total de la Factura</p></th>
                    <th scope="col" ><p>Monto Excento en BS.</p></th>
                    <th scope="col" ><p>Base Imponible en Bs.</p></th>
                    <th scope="col" ><p>% Cuota</p></th>
                    <th scope="col" ><p>I.V.A. Causado en Bs.</p></th>
                    <th scope="col" ><p>% a Retener</p></th>
                    <th scope="col" ><p>Retenido en Bs.</p></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($purchaseDetails as $purchaseDetail)
            @endforeach
                <tr>
                    <td scope="row">1</td>
                    <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}</td>
                    <td scope="row">{{ $purchaseDetail->purchase_id }}</td>
                    <td scope="row"></td>
                    <td scope="row"></td>
                    <td scope="row">{{ $purchaseDetail->purchase_id }}</td>
                    <td scope="row">{{number_format($purchase->total,2)}}</td>
                    <td scope="row"></td>
                    <td scope="row"></td>
                    <td scope="row">16%</td>
                    <td scope="row"></td>
                    <td scope="row">75%</td>
                    <td scope="row"></td>
                </tr>
            </tbody>
            <tfoot class="border-0">
                <tr>
                    <th colspan="6"><p align="right">TOTAL:</p></th>
                    <th colspan=""><p align="right">{{number_format($purchase->total,2)}}</p></th>
                    <th colspan=""><p align="right"></p></th>
                    <th colspan=""><p align="right"></p></th>
                    <th colspan=""><p align="right">x</p></th>
                    <th colspan=""><p align="right"></p></th>
                    <th colspan=""><p align="right">x</p></th>
                    <th colspan=""><p align="right"></p></th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="6"><p align="right">NETO A PAGAR:</p></th>
                    <th colspan="7"><p align="right">x</p></th>
                </tr>
            </tfoot>
        </table>
        <div class="container">
            <div class="float-left pt-5">
                <p>______________________________________________________________________</p>
                <p>Firma Sujeto Retenido</p>
            </div>

            <div class="float-right pt-5">
                <p>_______________________________________________________________________</p>
                <p class="text-right">Firma y Sello del Agente de Retención</p>
            </div>

            <div class="float-right pt-5">
                <p class="text-center">Este comprobante se emite en función de lo establecido en el articulo 16 de la providencia administrativa N° SNAT/2015/0049 de fecha 14/07/2015 publicada en Gaceta Oficial N° 40720 de fecha 18/08/2015</p>
            </div>
        </div>        


























    </body>
    <footer>

    </footer>

</html>