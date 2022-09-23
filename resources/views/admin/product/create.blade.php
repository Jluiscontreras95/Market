@extends('layouts.admin')
@section('title','Registro de productos')
@section('styles')
@endsection
@section('create')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Registro de productos</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de productos</h4>
                        </div>
                        <hr>
                        {!! Form::open(['route'=>'products.store', 'method' => 'POST', 'files' => true]) !!}
                            <div>
                                <div class="row pb-3">
                                    <div class="col">
                                        <label for="">Producto con impuesto</label>
                                        <div class="form-inline">
                                            <div class="form-check mr-3 ">
                                                <label class="form-check-label">{!! Form::radio('taxproduct', 'SI') !!} Si</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">{!! Form::radio('taxproduct', 'NO') !!} No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" id="tax_div">
                                            <label for="tax" class="label">(%) impuesto.</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><strong>%</strong></span>
                                                <input type="number" class="form-control" name="tax" id="tax" step="any" placeholder="impuesto" aria-describedby="addon-wrapping" value="0" >
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Nombre del producto</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <i class="fa fa-bold menu-icon"></i>
                                                </span>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del producto" aria-describedby="addon-wrapping" required>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="code_product">Código del producto</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" >
                                                    <i class="fa fa-barcode menu-icon"></i>
                                                </span>
                                                <input type="text" name="code_product" id="code_product" class="form-control" placeholder="Código de producto ">
                                            </div>
                                            <small id="helpId" class="text-muted">(Campo opcional) Este campo se auto-genera si no tiene codigos establecidos.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="category_id">Categoría</label>
                                            <select class="form-control selectpicker" name="category_id" id="category_id" data-live-search="true" required>
                                                <option value="" disabled selected>Seleccionar categoría</option>
                                                    @foreach ($categories as $category)   
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="providers">Provedor(es)</label>
                                            <select class="form-control js-example-basic-multiple" name="providers[]" id="providers"  multiple="multiple" required>
                                                <option disabled selected>Seleccionar el proveedor</option>
                                                    @foreach ($providers as $provider)   
                                                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                    </div>
                                </div>
                                <!-- productos al detal -->
                                <div class="row pt-4">
                                    <div class="col">
                                        <h4 class="">Al Detal</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cost_price" class="label">Precio de costo</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><strong>Bs.</strong></span>
                                                <input type="number" class="form-control" step="any" name="cost_price" id="cost_price" placeholder="Precio de costo" aria-describedby="addon-wrapping" require>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="utility" class="label">(%) Utilidad.</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><strong>%</strong></span>
                                                <input type="number" class="form-control" name="utility" id="utility" step="any" placeholder="Utilidad" aria-describedby="addon-wrapping" require>
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price">Precio para la venta</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Bs.</span>
                                                <input type="number" step="any" name="sell_price" id="sell_price" step="any" class="form-control" aria-describedby="helpId" placeholder="Precio para a venta" required>   
                                            </div>
                                            <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="measure">Unidad principal:</label>
                                            <select class="form-control selectpicker" name="measure" id="measure" data-live-search="true" title="Este producto será comprado en....." required>
                                                <option value="" disabled selected>Seleccionar medida</option>
                                                <option value="KG">KG</option>
                                                <option value="LTRS">LTRS</option>
                                                <option value="UND">UND</option> 
                                            </select>
                                        </div>
                                        <small id="helpId" class="text-muted">Campo obligatorio.</small>
                                    </div>
                                </div>
                                <!-- productos al mayor -->
                                <div class="row pt-4">
                                    <div class="col">
                                        <h4 class="">Al Mayor</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cost_price_may" class="label">Precio de costo</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><strong>Bs.</strong></span>
                                                <input type="number" class="form-control" step="any" name="cost_price_may" id="cost_price_may" placeholder="Precio de costo" aria-describedby="addon-wrapping" >
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="utility_may" class="label">(%) Utilidad.</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><strong>%</strong></span>
                                                <input type="number" class="form-control" name="utility_may" id="utility_may" step="any" placeholder="Utilidad" aria-describedby="addon-wrapping" >
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price_may">Precio para la venta</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Bs.</span>
                                                <input type="number" step="any" name="sell_price_may" id="sell_price_may" step="any" class="form-control" aria-describedby="helpId" placeholder="Precio para a venta" >   
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="measure_alter">Unidad alterna:</label>
                                            <select class="form-control selectpicker" name="measure_alter" id="measure_alter" data-live-search="true" title="Este producto será comprado en....." required>
                                                <option value="" disabled selected>Seleccionar medida alterna</option>
                                                <option value="CAJA">CAJA</option>
                                                <option value="BULTO">BULTO</option>
                                                <option value="CESTA">CESTA</option> 
                                                <option value="BLISTER">BLISTER</option>
                                                <option value="SACO">SACO</option>
                                            </select>
                                        </div>
                                        <small id="helpId" class="text-muted">Campo opcional.</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="measure_alter_cant">Equivalente a:</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text"> <strong>-></strong></span>
                                                <input type="number" step="any" name="measure_alter_cant" id="measure_alter_cant" class="form-control" aria-describedby="helpId" placeholder="cantidad que trae cada unidad alterna... ejmp. caja - 24" >   
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">                              
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="stock">stock inicial (en unidad principal)</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">
                                                    <i class="fa fa-home menu-icon"></i>
                                                </span>
                                                <input type="number" step="any" name="stock" id="stock" class="form-control" aria-describedby="helpId" placeholder="stock inicial" >   
                                            </div>
                                            <small id="helpId" class="text-muted">Campo opcional.</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex">Imagen del producto
                                                <small class="ml-auto align-self-end">
                                                <small id="helpId" class="text-muted">Campo opcional.</small>
                                                </small>
                                            </h5>
                                            <input type="file" name="picture" id="picture" class="dropify" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a href="{{route('products.index')}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

<script>


var cost_price = $('#cost_price');
var utility = $('#utility');


$('#cost_price, #utility').keyup(function(){

    if (isNaN(parseFloat($('#cost_price').val())) &&  isNaN(parseFloat($('#utility').val()))) {
        total += 0;
    } else {
        
        total = parseFloat($('#cost_price').val()) + (parseFloat($('#cost_price').val()) *  parseFloat($('#utility').val()) / 100);
    }
    parseFloat($("#sell_price").val(total));
    
});

$('#cost_price_may, #utility_may').keyup(function(){

    if (isNaN(parseFloat($('#cost_price_may').val())) &&  isNaN(parseFloat($('#utility_may').val()))) {
        total += 0;
    } else {
        
        total = parseFloat($('#cost_price_may').val()) + (parseFloat($('#cost_price_may').val()) *  parseFloat($('#utility_may').val()) / 100);
    }
    $("#sell_price_may").val(total);

});

$("#tax_div").hide();

$("input[name='taxproduct']").change(function (){

   
    if ($(this).val() == 'SI') {

        $("#tax_div").show();

    }else{

        $("#tax_div").hide();
        $("#tax").val(0);

    };

});


</script>


@endsection