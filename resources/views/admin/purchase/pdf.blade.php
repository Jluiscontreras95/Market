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

        <div class="col text-center pb-5">
            <h3>COMPROBANTE DE RETENCIÓN DE IMPUESTO AL VALOR AGREGADO</h3>
            <h5 class="pb-3">Decreto con Rango, Valor y Fuerza de Ley de Reforma de la Ley de Impuesto al Valor Agregado N° 1.436 del 17/11/2014</h5>
            <p>
                <strong>Art. 11:</strong>
                La administración tributaria podrá designar como responsables del pago de impuesto, en calidad de agentes de retención, a quienes por sus funciones públicas o por razón social, (junto a sus actividades privadas intervengan en operaciones gravadas con el impuesto establecido en esa ley.)
            </p>
            <p>Providencia Administrativa N° SNAT/2015/0049 de fecha 14/07/2015 publicada en Gaceta Oficial N° 40720 de fecha 10/07/2015.</p>
        </div>

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
        <div class="col pb-5">
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
        
        <div class="col">
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
                    <tr>
                        <td scope="row">{{$purchase->retention->purchase_id}}</td>
                        <td scope="row">{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}</td>
                        <td scope="row">{{$purchase->retention->purchase_id}}</td>
                        <td scope="row">{{$purchase->retention->n_control}}</td>
                        <td scope="row">{{$purchase->retention->n_debit}}</td>
                        <td scope="row">{{$purchase->retention->purchase_id}}</td>
                        <td scope="row">{{number_format($purchase->retention->total,2)}}</td>
                        <td scope="row">{{$purchase->retention->exempt_amount}}</td>
                        <td scope="row">{{$purchase->retention->taxable_base}}</td>
                        <td scope="row">{{$purchase->retention->share}}</td>
                        <td scope="row">{{$purchase->retention->iva}}</td>
                        <td scope="row">{{$purchase->retention->retention}}</td>
                        <td scope="row">{{$purchase->retention->detained}}</td>
                    </tr>
                    <tr>
                        <th colspan="6"><p align="right">TOTAL:</p></th>
                        <th colspan=""><p align="right">{{$purchase->retention->total_pagar }}</p></th>
                        <th colspan=""><p align="right"></p></th>
                        <th colspan=""><p align="right"></p></th>
                        <th colspan=""><p align="right">x</p></th>
                        <th colspan=""><p align="right"></p></th>
                        <th colspan=""><p align="right">x</p></th>
                        <th colspan=""><p align="right"></p></th>
                    </tr>
                    <tr id="dvOcultar">
                        <th colspan="6"><p align="right">NETO A PAGAR:</p></th>
                        <th colspan="7"><p align="right">{{number_format($purchase->retention->total_neto)}}</p></th>
                    </tr>
              
                </tbody>
            </table>

        </div>

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