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
                        <div class="d-flex justify-content-end">
                            <a class="nav-link" href="{{route('clients.create')}}">
                                <span class="btn btn-primary">+ Registrar Cliente</span>
                            </a>
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

$('#product').change(function (){
    $.ajax({
        url: "{{route('get_products_by_id')}}",
        method: 'GET',
        data:{
            product_id: $('#product').val()
        },
        dataType: 'json',
        success: function(data){
            $("#price").val(data.sell_price);
            $("#stock").val(data.stock);
            $("#code").val(data.code);
            $("#measure").html(data.measure);
            $("#measure_stock").html(data.measure);

            if(data.taxproduct === "SI"){
                $("#tax_product").val("16");
            }else{
                $("#tax_product").val("0");
            }
        }
    });
});


var cont = 0;
total = 0;
subtotal = [];
$("#guardar").hide();
$("#product").change(mostrarValores);

function mostrarValores(){
    datosProducto =document.getElementById('product').value.split('_');
    $("#price").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}

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
            $("#price").val(data.sell_price);
            $("#stock").val(data.stock);
            $("#product").val(data.id);

            if(data.taxproduct === "SI"){
                $("#tax_product").val("16");
            }else{
                $("#tax_product").val("0");
            }
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

$(document).ready(function (){
    $("#agregar").click(function (){
        agregar();
    });
});

function agregar(){
    datosProducto =document.getElementById('product').value.split('_');
    product_id = datosProducto[0]; 
    product = $("#product option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    tax = $("#tax_product").val();

    if (product_id != "" && quantity !="" && quantity > 0 &&  price != "" &&  tax != "") {

        if(discount === ""){
            discount = 0;
        }
        if(parseInt(stock) >= parseInt(quantity)){
            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100) ;
            total = total + subtotal[cont];
            var fila ='<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td><td><input type="hidden" id="product_id[]" name="product_id[]" value="' + product_id +'"/>' + product + '</td><td><input type="hidden" id="price[]" name="price[]" value="' + price + '"/><input class="form-control" type="number"  value="' + parseFloat(price).toFixed(2) + '" disabled/></td><td><input type="hidden" id="discount[]" name="discount[]" value="' + parseFloat(discount).toFixed(2) + '"/><input class="form-control" type="number" value="' + parseFloat(discount).toFixed(2) + '" disabled/></td><td><input type="hidden" id="quantity[]" name="quantity[]" value="' + quantity + '"/><input class="form-control" type="number" value="' + quantity + '" disabled/></td><td><input type="hidden" id="tax[]" name="tax[]" onload="myScript()" value="' + tax + '"/></td><td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
           
            
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
    $("#quantity").val("");
    $("#price").val("");
    $("#discount").val("");
    $("#code").val("");
    $("#measure_stock").val("");
    $("#stock").val("");
    $("#measure").val("");
    $('#product').val('default');
    $('#product').selectpicker('render');
    $('#product').selectpicker('refresh');
    $('#tax_product').val("");
}

function totales(){


    $('#tax').onload = function(){
        var elemt = [];
        numero = 0;

        
    };
    


    $("#total").html("Bs. " + total.toFixed(2));

    exchange = '{{$exchange->description}}';
    total_impuesto = total * tax / 100;
    total_pagar = total + total_impuesto;
    total_divisas = total_pagar / exchange;
    
    $("#cuenta_total").val(total_pagar.toFixed(2));   
    $("#total_impuesto").html("Bs. " + total_impuesto.toFixed(2));
    $("#total_tax").val(total_impuesto.toFixed(2));
    $("#total_pagar_html").html("Bs. " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
    $("#total_pagar_divisas_html").html("$. "+total_divisas.toFixed(2));
    $("#total_pagar_divisas").val(total_divisas.toFixed(2));
}

function evaluar() {
    if (total > 0){
        $("#guardar").show();
    }else{
        $("#guardar").hide();
    }
}

function eliminar(index){
    exchange = '{{$exchange->description}}';

    total = total - subtotal[index]/total_tax[index];
    total_impuesto = total * total_impuesto / 100;
    total_pagar_html = total + total_impuesto;
    total_divisas = total_pagar / exchange;
    $("#total").html("Bs. " + total);
    $("#total_impuesto").html("Bs. " + total_impuesto.toFixed(2));
    $("#total_tax").val(total_impuesto.toFixed(2));
    $("#total_pagar_html").html("Bs. " + total_pagar_html.toFixed(2));
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#total_pagar_divisas_html").html("$. "+total_divisas.toFixed(2));
    $("#total_pagar_divisas").val(total_divisas.toFixed(2));
    $("#cuenta_total").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();

}

$(obtener_registro_clientes());
function obtener_registro_clientes(dni){
    $.ajax({
        url: "{{route('get_Clients_by_dni')}}",
        type: 'GET',
        data:{
            dni: dni
        },
        dataType: 'json',
        success:function(data){
            console.log(data);
            $("#client_name").val(data.name);
            $("#client_id").val(data.id);
            console.log(data.id);
        }
    });
}

$(document).on('keyup', '#dni', function(){
    var valorResultado = $(this).val();
    if(valorResultado!=""){
        obtener_registro_clientes(valorResultado);
    }else{
        obtener_registro_clientes();
    }
});




var vuelto = 0;
var falta = 0;

$(".vuelto").on("focusout", event => {
    let field_id = "#"+event.target.id;
    vuelto += parseFloat($(field_id).val());
    parseFloat($("#cuenta_lleva").val(vuelto));
   
});

$(".vuelto").on("click", event => {
    if (event.target.value == 0) {
        return false;
    }
    vuelto -= parseFloat(event.target.value);
    let field_id = "#"+event.target.id;
    parseFloat($("#cuenta_lleva").val(vuelto));
    $(field_id).val(0);

});

$("#cuenta_falta").on("click", event => {
    falta = parseFloat($("#cuenta_total").val()) - parseFloat($("#cuenta_lleva").val());
    parseFloat($("#cuenta_falta").val(falta));
});



</script>


@endsection





