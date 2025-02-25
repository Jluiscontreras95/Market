@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>
    @foreach ($totales as $total)
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <div class="float-right">
                            <i class="fas fa-cart-arrow-down fa-4x"></i>
                        </div>
                        @empty($exchange)
                            <div class="text-value h4"><strong>Bs. {{number_format($total->totalcompra,2)}} (MES ACTUAL)</strong>
                        @else
                            <div class="text-value h4"><strong>Bs. {{number_format($total->totalcompra,2)}} /  $. {{number_format($total->totalcompra / $exchange->description, 2)}} (MES ACTUAL)</strong>
                        @endempty
                        </div>
                        <div class="h3">Compras</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                        <a href="{{route('purchases.index')}}" class="small-box-footer h4">Compras 
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card  text-white bg-info">
                    <div class="card-body pb-0">
                        <div class="float-right">
                            <i class="fas fa-shopping-cart fa-4x"></i>
                        </div>
                            @empty($exchange)
                                <div class="text-value h4"><strong>Bs. {{number_format($total->totalventa,2)}} (MES ACTUAL) </strong>
                            @else
                                <div class="text-value h4">
                                    <strong>Bs. {{number_format($total->totalventa,2)}} /  $. {{number_format($total->totalventa / $exchange->description, 2)}} (MES ACTUAL)</strong>
                            @endempty
                        </div>
                        <div class="h3">Ventas</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                        <a href="{{route('sales.index')}}" class="small-box-footer h4">Ventas
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-gift"></i>
                    Ventas diarias
                </h4>
                <canvas id="ventas_diarias" height="100"></canvas>
                <div id="orders-chart-legend" class="orders-chart-legend"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-gift"></i>
                        Compras - Meses
                    </h4>
                    <canvas id="compras"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Ventas - Meses
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Productos más vendidos
                    </h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Stock actual</th>
                                    <th>Cantidad vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$productosvendido->name}}</td>
                                        <td>{{$productosvendido->code}}</td>
                                        <td><strong>{{number_format($productosvendido->stock, 2, ',', ' ')}}</strong> {{$productosvendido->measure}}</td>
                                        <td><strong>{{number_format($productosvendido->quantity, 2,  ',', ' ')}}</strong> {{$productosvendido->measure}}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{route('products.show', $productosvendido->id)}}">
                                                <i class="far fa-eye"></i>
                                                Ver detalles
                                            </a>
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

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        categorias más vendidas (totales)
                    </h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th>categoria</th>
                                    <th>Cantidad vendida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoriavendidas as $categoriavendida)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$categoriavendida->categorias}}</td>
                                        <td>Bs. {{$categoriavendida->total}}</td>
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
@endsection
@section('scripts')

<script>
    $(function () {
        var varCompra=document.getElementById('compras').getContext('2d');
        var charCompra = new Chart(varCompra, {
            type: 'line',
            data: {
                labels: [<?php foreach ($comprasmes as $reg)
                    { 
                // setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                // $mes_traducido = strftime('%B', strtotime($reg->mes));
        
                echo '"'. $reg->mesname.'",';} ?>],
                datasets: [{
                    label: 'Compras',
                    data: [<?php foreach ($comprasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth:3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        var varVenta=document.getElementById('ventas').getContext('2d');
        var charVenta = new Chart(varVenta, {
            type: 'line',
            data: {
                labels: [<?php foreach ($ventasmes as $reg)
            {
                // setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                // $mes_traducido=strftime('%B',strtotime($reg->mes));
                
                echo '"'. $reg->mesname.'",';} ?>],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php foreach ($ventasmes as $reg)
                    {echo ''. $reg->totalmes.',';} ?>],
                    backgroundColor: 'rgba(20, 204, 20, 1)',
                    borderColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        var varVenta=document.getElementById('ventas_diarias').getContext('2d');
        var green_yellow_gradient = varVenta.createLinearGradient(0, 0, 0, 600);
            green_yellow_gradient.addColorStop(0, 'green');
            green_yellow_gradient.addColorStop(1, 'yellow');
        var charVenta = new Chart(varVenta, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($ventasdia as $ventadia){
                    $fecha = $ventadia->dia.' - '.$ventadia->mesname.' - '.$ventadia->anio;
                echo '"'. $fecha.'",';} ?>],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php foreach ($ventasdia as $reg)
                    {echo ''. $reg->totaldia.',';} ?>],
                    backgroundColor: green_yellow_gradient,
                    borderColor: green_yellow_gradient,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });

</script>

@endsection