@extends('layouts.admin')
@section('title','Registro de ventas')
@section('styles')
@endsection

@section('create')
<!-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('sales.create')}}">
        <span class="btn btn-primary">+ Crear nueva</span>
    </a>
</li> -->
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Registro de ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'sales.store', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de ventas</h4>
                        </div>
                    
                         @include('admin.sale._form')
                    
                    </div>

                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{route('sales.index')}}" class="btn btn-light">Cancelar</a>
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
$("#product_id").change(mostrarValores);

function mostrarValores(){
    datosProducto =document.getElementById('product_id').value.split('_');
    $("#price").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}





var product_id = $('#product_id');
	
    product_id.change(function(){
            $.ajax({
                url: "{{route('get_products_by_id')}}",
                method: 'GET',
                data:{
                    product_id: product_id.val(),
                },
                success: function(data){
                    $("#price").val(data.sell_price);
                    $("#stock").val(data.stock);
                    $("#code").val(data.code);
            }
        });
    });






$(obtener_registro());
    function obtener_registro(code){
        $.ajax({
            url: "{{route('get_products_by_barcode')}}",
            type: 'GET',
            data:{
                code: code
            },
            dataType: 'json',
            success:function(data){
                console.log(data);
                $("#price").val(data.sell_price);
                $("#stock").val(data.stock);
                $("#product_id").val(data.id);
            }
        });
    }
    $(document).on('keyup', '#code', function(){
        var valorResultado = $(this).val();
        if(valorResultado!=""){
            obtener_registro(valorResultado);
        }else{
            obtener_registro();
        }
    })



function agregar(){
    datosProducto =document.getElementById('product_id').value.split('_');
    
    product_id = datosProducto[0]; 
    product = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();

    if (product_id != "" && quantity !="" && quantity > 0 && discount != "" && price != "") {
    
            if(parseInt(stock) >= parseInt(quantity)){
            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100) ;
            total = total + subtotal[cont];
            var fila ='<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" id="product_id[]" name="product_id[]" value="' + product_id +'"/>' + product + '</td><td><input type="hidden" id="price[]" name="price[]" value="' + price + '"/><input class="form-control" type="number"  value="' + parseFloat(price).toFixed(2) + '" disabled/></td><td><input type="hidden" id="discount[]" name="discount[]" value="' + parseFloat(discount).toFixed(2) + '"/><input class="form-control" type="number" value="' + parseFloat(discount).toFixed(2) + '" disabled/></td><td><input type="hidden" id="quantity[]" name="quantity[]" value="' + quantity + '"/><input class="form-control" type="number" value="' + quantity + '" disabled/></td><td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        }else{
            Swal.fire({
                type: 'error',
                text: 'La cantidad a vender supera el stock.',
            })
        }

     }else{
        Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la venta.',
            })
        }
}

function limpiar(){
    $("#product_id").val("");
    $("#quantity").val("");
    $("#price").val("");
    $("#discount").val("0");
}

function totales(){
    $("#total").html("PEN " + total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
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
    $("#total").html("PEN " + total);
    $("#total_impuesto").html("PEN " + total_impuesto);
    $("#total_pagar_html").html("PEN " + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();

}

</script>







@endsection





