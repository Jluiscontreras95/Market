@extends('layouts.admin')
@section('title','Registro de compras')
@section('styles')
@endsection
@section('create')

@endsection
@section('preference')
@endsection
@section('content')


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Registro de compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'purchases.store', 'method' => 'POST']) !!}
                @csrf
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de compras</h4>
                        </div>
                        <hr>
                         @include('admin.purchase._form')
                    
                    </div>

                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{route('purchases.index')}}" class="btn btn-light">Cancelar</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>





@endsection
@section('scripts')


<script>

    $(document).ready(function (){
    $("#agregar").click(function (){
        agregar();
    });
});

var cont = 0;
total = 0;
subtotal = [];

$("#guardar").hide();

function agregar(){
    product_id = $("#product").val();
    product = $("#product option:selected").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    impuesto = $("#tax").val();
    measure = $("#measure").val();

    if(product_id != "" && quantity !="" && quantity > 0 && price != "" && measure != ""){
        subtotal[cont] = quantity * price;
        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="' + product_id +'">' + product + '</td><td><input type="hidden" id="price[]" name="price[]" value="' + price + '"><input class="form-control"  type="number" id="price[]" value="' + price + '" disabled></td><td><input type="hidden" name="quantity[]" value="' + quantity + '"><input class="form-control"  type="number" value="' + quantity + '" disabled></td><td><input type="hidden" name="measure[]" value="' + measure + '"><input class="form-control" style="width: 120px;" type="text" value="' + measure + '" disabled></td><td align="right">s/' + subtotal[cont] + '</td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
    }else{
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la compra.',
        })
    }
}

function limpiar(){
    $("#quantity").val("");
    $("#price").val("");
    $("#tax").val("0");
    $('#measure').val('default');
    $('#measure').selectpicker('render');
    $('#measure').selectpicker('refresh');
}

function totales(){
    $("#total").html("Bs. " + total.toFixed(2));
    exchange = '{{$exchange->description}}';
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    total_divisas = total_pagar / exchange;
    $("#total_impuesto").html("Bs. " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("Bs. " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
    $("#total_pagar_divisas_html").html("$. "+total_divisas.toFixed(2));
    $("#total_pagar_divisas").val(total_divisas.toFixed(2));

    console.log(total_divisas);
}

function evaluar() {
    if (total > 0){
        $("#guardar").show();
    }else{
        $("#guardar").hide();
    }
}

function eliminar(index){
    total = total - subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("Bs.  " + total);
    $("#total_impuesto").html("Bs. " + total_impuesto);
    $("#total_pagar_html").html("Bs. " + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();

}


var product_id = $('#product');
var provider_id = $('#provider_id');

    provider_id.change(function(){
            
            $('#product').empty();
            $('#product').selectpicker('refresh');

            $.ajax({
                url: "{{route('get_Products')}}",
                method: 'GET',
                data:{
                    provider_id: provider_id.val(),
                    _token: $('input[name="_token"]').val(),
                },
            }).done(res => {
                $('#product').val('default')
                $('#product').append('<option value="" disabled selected>Seleccione Productos</option>');
                $('#product').append(JSON.parse(res).map(e => "<option value="+e['id'] +">"+e['name']+"</option>").join(""));
                $('#product').selectpicker('refresh');
                
            });
    });

</script>


@endsection





