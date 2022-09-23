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