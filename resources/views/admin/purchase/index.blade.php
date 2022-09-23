@extends('layouts.admin')
@section('title','Gestión de compras')
@section('styles')

    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>

@endsection
@section('create')

    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('purchases.create')}}">
            <span class="btn btn-primary">+ Registrar compra</span>
        </a>
    </li>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Compras</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Compras</h4>
                            {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('purchases.create')}}" class="dropdown-item">Registrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Retención</th>
                                        <th style="width:50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                            </th>
                                            <td>
                                                {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                            </td>
                                            <td>{{$purchase->total}}</td>

                                            @if ($purchase->status == 'VALID')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success" href="{{route('change.status.purchases', $purchase)}}" title="Editar">
                                                        Activo <i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger" href="{{route('change.status.purchases', $purchase)}}" title="Editar">
                                                        Cancelado <i class="fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif

                                            <td>
                                                <!-- <button type="button" class="btn btn-primary modal1" name="crear" id="crear" data-id="{{$purchase->id}}" data-toggle="modal" data-target="#exampleModal">Crear</button> -->

                                                <button type="button" class="btn btn-primary modal2" name="modificar" id="modificar"  data-toggle="modal" data-target="#exampleModal2" data-id="{{$purchase->id}}" value="{{$purchase->id}}">Modificar</button>
                                            </td>

                                            <td style="width: 100px;">
                                                
                                                <a href="{{route('purchase.pdf', $purchase)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                                <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a> 
                                                <a href="{{route('purchases.show', $purchase)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>













 <!-- Modal1 starts -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Retención</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  

                <div class="container"> 
                    <div class="row"> 
                        <div class="col text-center pb-5">
                            <h3>COMPROBANTE DE RETENCIÓN DE IMPUESTO AL VALOR AGREGADO</h3>
                            <h5 class="pb-3">Decreto con Rango, Valor y Fuerza de Ley de Reforma de la Ley de Impuesto al Valor Agregado N° 1.436 del 17/11/2014</h5>
                            <p>
                                <strong>Art. 11:</strong>
                                La administración tributaria podrá designar como responsables del pago de impuesto, en calidad de agentes de retención, a quienes por sus funciones públicas o por razón social, (junto a sus actividades privadas intervengan en operaciones gravadas con el impuesto establecido en esa ley.)
                            </p>
                            <p>Providencia Administrativa N° SNAT/2015/0049 de fecha 14/07/2015 publicada en Gaceta Oficial N° 40720 de fecha 10/07/2015.</p>
                        </div>
                    </div>
                    @foreach ($businesses as $business)
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre_agente">Nombre o Razón Social del Agente de la Retención.</label>
                                    <input type="text" class="form-control" name="nombre_agente" id="nombre_agente" placeholder="" value="{{$business->name}}" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="rif_agente">RIF del Agente de la Retención.</label>
                                    <input type="text" class="form-control" name="rif_agente" id="rif_agente" placeholder="" value="{{$business->rif}}" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha_emision">Fecha de Emision.</label>
                                <input type="text" class="form-control" name="fecha_emision" id="fecha_emision" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha_entrega">Fecha de Entrega.</label>
                                <input type="text" class="form-control" name="fecha_entrega" id="fecha_entrega" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="anio_fiscal">Año fiscal.</label>
                                <input type="text" class="form-control" name="anio_fiscal" id="anio_fiscal" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="mes_fiscal">Mes fiscal.</label>
                                <input type="text" class="form-control" name="mes_fiscal" id="mes_fiscal" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_retenido">Nombre o Razón Social del Retenido.</label>
                                <input type="text" class="form-control" name="nombre_retenido" id="nombre_retenido" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="rif_retenido">RIF del Retenido.</label>
                                <input type="text" class="form-control" name="rif_retenido" id="rif_retenido" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="direccion_agente">Dirección Fiscal del Agente de la Retención.</label>
                                <input type="text" class="form-control" name="direccion_agente" id="direccion_agente" placeholder="" value="{{$business->address}}" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <h4>Total</h4>
                    <hr>
                    {!! Form::open(['route'=>'retentions.store', 'method' => 'POST', 'files' => true]) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="purchase_id">Oper.</label>
                                    <input type="text" class="form-control" name="purchase_id" id="purchase_id" placeholder="" value="" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Fecha de documento.</label>
                                    <input type="text" class="form-control" name="date" id="date" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_factura">N° de Factura.</label>
                                    <input type="text" class="form-control" name="n_factura" id="n_factura" placeholder="" value="" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_control">N° de Control de Factura.</label>
                                    <input type="text" class="form-control" name="n_control" id="n_control" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_debit">N° de Nota de Debito.</label>
                                    <input type="text" class="form-control" name="n_debit" id="n_debit" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_fact">N° de Factura Afectada.</label>
                                    <input type="text" class="form-control" name="n_fact" id="n_fact" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="total">Monto Total de la Factura.</label>
                                    <input type="text" class="form-control" name="total" id="total" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exempt_amount">Monto Excento en BS.</label>
                                    <input type="text" class="form-control" name="exempt_amount" id="exempt_amount" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="taxable_base">Base Imponible en Bs.</label>
                                    <input type="text" class="form-control" name="taxable_base" id="taxable_base" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="share">% Cuota.</label><input type="text" class="form-control" name="share" id="share" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="iva">I.V.A. Causado en Bs.</label>
                                    <input type="text" class="form-control" name="iva" id="iva" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="retention">% a Retener.</label>
                                    <input type="text" class="form-control" name="retention" id="retention" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="detained">Retenido en Bs.</label>
                                    <input type="text" class="form-control" name="detained" id="detained" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="total_pagar">Total pagar (Bs.)</label>
                                    <input type="text" class="form-control" name="total_pagar" id="total_pagar" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="total_neto">Total Neto (Bs.)</label>
                                    <input type="text" class="form-control" name="total_neto" id="total_neto" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
<!-- Modal1 Ends -->









 <!-- Modal2 starts -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Retención</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  

                <div class="container"> 
                    <div class="row"> 
                        <div class="col text-center pb-5">
                            <h3>COMPROBANTE DE RETENCIÓN DE IMPUESTO AL VALOR AGREGADO</h3>
                            <h5 class="pb-3">Decreto con Rango, Valor y Fuerza de Ley de Reforma de la Ley de Impuesto al Valor Agregado N° 1.436 del 17/11/2014</h5>
                            <p>
                                <strong>Art. 11:</strong>
                                La administración tributaria podrá designar como responsables del pago de impuesto, en calidad de agentes de retención, a quienes por sus funciones públicas o por razón social, (junto a sus actividades privadas intervengan en operaciones gravadas con el impuesto establecido en esa ley.)
                            </p>
                            <p>Providencia Administrativa N° SNAT/2015/0049 de fecha 14/07/2015 publicada en Gaceta Oficial N° 40720 de fecha 10/07/2015.</p>
                        </div>
                    </div>
                    @foreach ($businesses as $business)
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre_agente_2">Nombre o Razón Social del Agente de la Retención.</label>
                                    <input type="text" class="form-control" name="nombre_agente_2" id="nombre_agente_2" placeholder="" value="{{$business->name}}" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="rif_agente_2">RIF del Agente de la Retención.</label>
                                    <input type="text" class="form-control" name="rif_agente_2" id="rif_agente_2" placeholder="" value="{{$business->rif}}" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha_emision_2">Fecha de Emision.</label>
                                <input type="text" class="form-control" name="fecha_emision_2" id="fecha_emision_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha_entrega_2">Fecha de Entrega.</label>
                                <input type="text" class="form-control" name="fecha_entrega_2" id="fecha_entrega_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="anio_fiscal_2">Año fiscal.</label>
                                <input type="text" class="form-control" name="anio_fiscal_2" id="anio_fiscal_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="mes_fiscal_2">Mes fiscal.</label>
                                <input type="text" class="form-control" name="mes_fiscal_2" id="mes_fiscal_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre_retenido_2">Nombre o Razón Social del Retenido.</label>
                                <input type="text" class="form-control" name="nombre_retenido_2" id="nombre_retenido_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="rif_retenido_2">RIF del Retenido.</label>
                                <input type="text" class="form-control" name="rif_retenido_2" id="rif_retenido_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="direccion_agente_2">Dirección Fiscal del Agente de la Retención.</label>
                                <input type="text" class="form-control" name="direccion_agente_2" id="direccion_agente_2" placeholder="" value="{{$business->address}}" aria-describedby="addon-wrapping" disabled>
                            </div>
                        </div>
                    </div>
                    <h4>Total</h4>
                    <hr>
                   {{-- {!! Form::model([$retention, 'route'=>['retentions.update', $retention ], 'method' => 'PUT', 'files' => true]) !!} --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="purchase_id_2">Oper.</label>
                                    <input type="text" class="form-control" name="purchase_id_2" id="purchase_id_2" placeholder="" value="" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_2">Fecha de documento.</label>
                                    <input type="text" class="form-control" name="date_2" id="date_2" placeholder="" value="" aria-describedby="addon-wrapping" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_factura_2">N° de Factura.</label>
                                    <input type="text" class="form-control" name="n_factura_2" id="n_factura_2" placeholder="" value="" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_control_2">N° de Control de Factura.</label>
                                    <input type="text" class="form-control" name="n_control_2" id="n_control_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_debit_2">N° de Nota de Debito.</label>
                                    <input type="text" class="form-control" name="n_debit_2" id="n_debit_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="n_fact_2">N° de Factura Afectada.</label>
                                    <input type="text" class="form-control" name="n_fact_2" id="n_fact_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="total_2">Monto Total de la Factura.</label>
                                    <input type="text" class="form-control" name="total_2" id="total_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exempt_amount_2">Monto Excento en BS.</label>
                                    <input type="text" class="form-control" name="exempt_amount_2" id="exempt_amount_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="taxable_base_2">Base Imponible en Bs.</label>
                                    <input type="text" class="form-control" name="taxable_base_2" id="taxable_base_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="share_2">% Cuota.</label><input type="text" class="form-control" name="share_2" id="share_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="iva_2">I.V.A. Causado en Bs.</label>
                                    <input type="text" class="form-control" name="iva_2" id="iva_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="retention_2">% a Retener.</label>
                                    <input type="text" class="form-control" name="retention_2" id="retention_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="detained_2">Retenido en Bs.</label>
                                    <input type="text" class="form-control" name="detained_2" id="detained_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="total_pagar_2">Total pagar (Bs.)</label>
                                    <input type="text" class="form-control" name="total_pagar_2" id="total_pagar_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="total_neto_2">Total Neto (Bs.)</label>
                                    <input type="text" class="form-control" name="total_neto_2" id="total_neto_2" placeholder="" value="" aria-describedby="addon-wrapping" >
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" name="actualizar" id="actualizar" class="btn btn-success" data-dismiss="modal">Actualizar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </div>
                {{-- {!! Form::close() !!} --}}
            </div>
        </div>
    </div>
<!-- Modal2 Ends -->











@section('scripts')

    <script>

        $(".modal1").click(function(e) {
            e.preventDefault();
                            
                $.ajax({
                    url: "{{route('get_Retention_create')}}",
                    method: 'GET',
                    data:{
                        purchase_id: $(this).attr('data-id'),
                        _token: $('input[name="_token"]').val(),
                    },
                    dataType: 'json',
                }).done(res => {
                    console.log(res);
                    $("#fecha_emision").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#fecha_entrega").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#anio_fiscal").val(moment(res.purchase_date).format('YYYY'));
                    $("#mes_fiscal").val(moment(res.purchase_date).format('MM'));
                    $("#nombre_retenido").val(res.provider.name);
                    $("#rif_retenido").val(res.provider.rif_number);
                    $("#purchase_id").val(res.id);
                    $("#date").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#n_factura").val(res.id);
                    $("#n_control").val("00-0"+ res.id);
                    
                });
            });

            $(".modal2").click(function(e) {
            e.preventDefault();
                            
                $.ajax({
                    url: "{{route('get_Retention_edit')}}",
                    method: 'GET',
                    data:{
                        purchase_id: $(this).attr('data-id'),
                        _token: $('input[name="_token"]').val(),
                    },
                    dataType: 'json',
                }).done(res => {
                    console.log(res);
                    $("#fecha_emision_2").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#fecha_entrega_2").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#anio_fiscal_2").val(moment(res.purchase_date).format('YYYY'));
                    $("#mes_fiscal_2").val(moment(res.purchase_date).format('MM'));
                    $("#nombre_retenido_2").val(res.provider.name);
                    $("#rif_retenido_2").val(res.provider.rif_number);
                    $("#purchase_id_2").val(res.id);
                    $("#date_2").val(moment(res.purchase_date).format('DD-MM-YYYY'));
                    $("#n_factura_2").val(res.id);
                    $("#n_control_2").val("00-0"+ res.id);
                    $("#n_debit_2").val(res.retention.n_debit);
                    $("#n_fact_2").val(res.retention.purchase_id);
                    $("#total_2").val(res.retention.total);
                    $("#exempt_amount_2").val(res.retention.exempt_amount);
                    $("#taxable_base_2").val(res.retention.taxable_base);
                    $("#share_2").val(res.retention.share);
                    $("#iva_2").val(res.retention.iva);
                    $("#retention_2").val(res.retention.retention);
                    $("#detained_2").val(res.retention.detained);
                    $("#total_pagar_2").val(res.retention.total_pagar);
                    $("#total_neto_2").val(res.retention.total_neto);
                    
                    
                });
            });


            

            $("#actualizar").click(function(e) {
            e.preventDefault();
            let id = $("#purchase_id_2").val();

            var url2 = "retentions/"+id;
           
                $.ajax({
                    url: url2,
                    method: "PATCH",
                    data:{
                        _token: $('input[name="_token"]').val(),

                        fecha_emision : $("#fecha_emision_2").val(),
                        fecha_entrega: $("#fecha_entrega_2").val(),
                        anio_fiscal: $("#anio_fiscal_2").val(),
                        mes_fiscal: $("#mes_fiscal_2").val(),
                        nombre_retenido: $("#nombre_retenido_2").val(),
                        rif_retenido: $("#rif_retenido_2").val(),
                        purchase_id: $("#purchase_id_2").val(),
                        date: $("#date_2").val(),
                        n_factura: $("#n_factura_2").val(),
                        n_control: $("#n_control_2").val(),
                        n_debit: $("#n_debit_2").val(),
                        n_fact: $("#n_fact_2").val(),
                        total: $("#total_2").val(),
                        exempt_amount: $("#exempt_amount_2").val(),
                        taxable_base: $("#taxable_base_2").val(),
                        share: $("#share_2").val(),
                        iva: $("#iva_2").val(),
                        retention: $("#retention_2").val(),
                        detained: $("#detained_2").val(),
                        total_pagar: $("#total_pagar_2").val(),
                        total_neto: $("#total_neto_2").val(),

                    },
                    dataType: 'json',
                }).done(res => {
                    console.log(res);
                    
                    
                    
                });
            });

    </script>


@endsection




@endsection