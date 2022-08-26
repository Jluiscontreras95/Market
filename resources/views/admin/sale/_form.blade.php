    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="dni" id="dni" placeholder="Cedula del cliente" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <!-- <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Cliente" aria-describedby="addon-wrapping" disabled> -->
                    <input type="text" class="form-control" name="client_id" id="client_id" placeholder="Cliente" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control " name="product" id="product"  title="seleccione un producto.....">
                    <option value="" disabled selected>Seleccionar producto</option>
                    @foreach ($products as $product)   
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="code" id="code" placeholder="Código de barras" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Cantidad a vender" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="text" class="form-control" name="measure" id="measure" placeholder="Medida" aria-describedby="addon-wrapping" disabled>
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock actual" aria-describedby="addon-wrapping" disabled>
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="text" class="form-control" name="measure_stock" id="measure_stock" placeholder="Medida" aria-describedby="addon-wrapping" disabled>
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Precio de venta" aria-describedby="addon-wrapping" disabled>
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="tax" id="tax" placeholder="Impuesto (16%)" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-plus menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="discount" id="discount" placeholder="Porcentaje de descuento" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>








<div class="form-group">
    <button type="button" id="agregar" name="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-tittle">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta(Bs.)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal(Bs.)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right">
                            <span align="right" id="total_pagar_html">Bs. 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>



</div>
