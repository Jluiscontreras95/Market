<!DOCTYPE>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <style>
        <?php 
            include( public_path() . '/css/bootstrap/bootstrap.css' );
        ?>
    </style>
    
</head>
<body>

<div class="row">
    <div class="col">
        <h2>Inventario</h4>
        <h5>{{$fecha->format('d/m/y h:i a')}}</h5>
    </div>
</div>
    <div class="table-responsive">
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th>productos registrados</th>
                    <th>total en precios de costo (Bs)</th>
                    <th>total en precios de costo ($)</th>
                    <th>total en utilidades(%)</th>
                    <th>Total en precios de venta (Bs)</th>
                    <th>Total en precios de venta ($)</th>
                    <th>Productos activos</th>
                    <th>Productos inactivos</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th scope="row">{{$products->count()}}</th>
                    <td scope="row">Bs. {{$products->sum('cost_price')}}</td> 
                    <td scope="row">$. {{$products->sum('cost_price') / $exchange->description}}</td> 
                    <td scope="row">% {{$products->sum('utility')}}</td>
                    <td scope="row">Bs. {{$products->sum('sell_price')}}</td>
                    <td scope="row">$. {{$products->sum('sell_price') / $exchange->description}}</td>
                    <td scope="row">{{$products->where('status', 'ACTIVE')->count()}}</td>
                    <td scope="row">{{$products->where('status', 'DESACTIVATED')->count()}}</td>
                </tr>
            </tbody>
        </table>
    </div>

<hr>

<div class="table-responsive">
    <table id="order-listing" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio de costo</th>
                <th>Utilidad(%) al detal</th>
                <th>Precio de venta al detal</th>
                <th>Utilidad(%) al mayor</th>
                <th>Precio de venta al mayor</th>
                <th>Sumatoria Total al detal</th>
                <th>Sumatoria Total al mayor</th>
                <th>Categoría</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>
                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                    </td>

                    @empty($product->measure_alter_cant)
                        <td>{{ $product->stock }} {{ $product->measure }}</td>
                    @else
                        <td>{{ $product->stock }} {{ $product->measure }} ó {{ number_format($product->stock / $product->measure_alter_cant , 2) }} {{ $product->measure_alter }}</td>
                    @endempty

                    <td>Bs. {{ $product->cost_price }}</td>
                    <td>{{ $product->utility }}</td>
                    <td>Bs. {{ $product->sell_price }}</td>
                    
                    @empty($product->cost_price_may && $product->utility_may && $product->sell_price_may)
                        <td>0.00</td>
                        <td>Bs. 0.00</td>
                    @else
                        <td>{{ $product->utility_may }}</td>
                        <td>Bs. {{ $product->sell_price_may }}</td>
                    @endempty
                    
                    <td>Bs. {{number_format($product->stock,2) * number_format($product->sell_price,2)}} || $. {{number_format($product->stock,2) * number_format($product->sell_price,2) / $exchange->description}}</td>
                    
                    @empty($product->sell_price_may)
                        <td>Bs. 0.00 || $. 0.00</td>
                    @else
                        <td>{{number_format($product->stock,2) * number_format($product->sell_price_may,2)}} || $. {{number_format($product->stock,2) * number_format($product->sell_price_may,2) / $exchange->description}}</td>
                    @endempty
                    
                    <td>{{ $product->category->name }}</td>
                    
                    @if ($product->status == 'ACTIVE')
                        <td>
                            <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}" title="Editar">
                                Activo <i class="fas fa-check"></i>
                            </a>
                        </td>
                    @else
                        <td>
                            <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}" title="Editar">
                                Desactivado <i class="fas fa-times"></i>
                            </a>
                        </td>
                    
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>



