
@extends('layouts.admin')
@section('title','Retenciones')
@section('styles')
@endsection
@section('create')

@endsection
@section('options')
@endsection
@section('preference')
@endsection

@section('content')

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
                        <label for="name">Nombre o Razón Social del Agente de la Retención.</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$business->name}}" aria-describedby="addon-wrapping" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">RIF del Agente de la Retención.</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$business->rif}}" aria-describedby="addon-wrapping" disabled>
                    </div>
                </div>
            </div>

        @endforeach

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Fecha de Emision.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="name">Fecha de Entrega.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="name">Año fiscal.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{\Carbon\Carbon::parse($purchase->purchase_date)->format('y')}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="name">Mes fiscal.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{\Carbon\Carbon::parse($purchase->purchase_date)->format('M')}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Nombre o Razón Social del Retenido.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$purchase->provider->name}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="name">RIF del Retenido.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$purchase->provider->rif_number}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Dirección Fiscal del Agente de la Retención.</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$business->address}}" aria-describedby="addon-wrapping" disabled>
                </div>
            </div>
        </div>

        <h4>Total</h4>
        <hr>
        {!! Form::open(['route'=>'retention.store', 'method' => 'POST', 'files' => true]) !!}

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="purchase_id">Oper.</label>
                        <input type="text" class="form-control" name="purchase_id" id="purchase_id" placeholder="" value="{{$purchase->id}}" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="date">Fecha de documento.</label>
                        <input type="text" class="form-control" name="date" id="date" placeholder="" value="{{\Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/y')}}" aria-describedby="addon-wrapping" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="n_factura">N° de Factura.</label>
                        <input type="text" class="form-control" name="n_factura" id="n_factura" placeholder="" value="{{$purchase->id}}" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="n_control">N° de Control de Factura.</label>
                        <input type="text" class="form-control" name="n_control" id="n_control" placeholder="" value="00-0{{$purchase->id}}" aria-describedby="addon-wrapping" >
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
                        <input type="text" class="form-control" name="n_fact" id="n_fact" placeholder="" value="{{$purchase->id}}" aria-describedby="addon-wrapping" >
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
                        <label for="total_pagar">Total Neto (Bs.)</label>
                        <input type="text" class="form-control" name="total_pagar" id="total_pagar" placeholder="" value="" aria-describedby="addon-wrapping" >
                    </div>
                </div>
            </div>

            <div class="row pb-5 justify-content-end">
                <div class="col">
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('purchases.index')}}" class="btn btn-light">Cancelar</a>
                </div>
            </div>

        {!! Form::close() !!}

    </div>
@endsection


