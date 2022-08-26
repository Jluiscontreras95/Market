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

var product_id = $('#product');
	
    product_id.change(function (){
            $.ajax({
                url: "{{route('get_products_by_id')}}",
                method: 'GET',
                data:{
                    product_id: product_id.val()
                },
                success: function(data){
                    $("#price").val(data.sell_price);
                    $("#stock").val(data.stock);
                    $("#code").val(data.code);
                    $("#measure").val(data.measure);
                    $("#measure_stock").val(data.measure);
                    return product_id;
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
                console.log(data);
                $("#price").val(data.sell_price);
                $("#stock").val(data.stock);
                $("#product").val(data.id);
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
    impuesto = $("#tax").val();


    // if (discount = ""){
    //         discount = $("#discount").val("0");
    //         return discount;
    //     }else{
    //         discount = $("#discount").val();
    //         return discount;
    //     }

    // $('#product').val('default');
    // $('#product').selectpicker('render');
    // $('#product').selectpicker('refresh');
        console.log(discount);

    if (product_id != "" && quantity !="" && quantity > 0 &&  price != "") {

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
    $("#quantity").val("");
    $("#price").val("");
    $("#discount").val("");
    $("#code").val("");
    $("#measure_stock").val("");
    $("#stock").val("");
    $("#measure").val("");
    $('#product').val("");
    
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
    })


    // $(document).ready(function(){

    //     $.ajax({
    //         url: "{{route('get_Only_products')}}",
    //         method: 'POST',
    //         dataType: "json",
    //         success: function(res){
    //             console.log(res);

    //                 $('#product_id').append('<option value="" disabled selected>Seleccione Productos</option>');
    //                 $('#product_id').append(JSON.parse(res).map(e => "<option value="+e['id'] +">"+e['name']+"</option>").join(""));
    //                 $('#product_id').selectpicker('refresh');
                

    //         }
    //     });

    // });

</script>







@endsection





