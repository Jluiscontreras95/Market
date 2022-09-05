<div class="row">
    <div class="col float-left">
        <h5>Datos del cliente</h5>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="dni" class="label">Cédula del cliente.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="far fa-address-book menu-icon"></i>
                </span>
                <input type="number" class="form-control" name="dni" id="dni" placeholder="Cedula del cliente" aria-describedby="addon-wrapping" required>
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="client_name" class="label">Nombre del cliente.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="far fa-user menu-icon"></i>
                </span>
                <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Cliente" aria-describedby="addon-wrapping" disabled>
                <input type="hidden" class="form-control" name="client_id" id="client_id" placeholder="Cliente" aria-describedby="addon-wrapping">
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
</div>
<h5>Datos del producto</h5>
<hr>



<div class="row">
    <div class="col">
        <div class="form-group">
        <label for="product" class="label">Seleccione producto.</label>
            <select class="form-control  selectpicker" name="product" id="product" autocomplete="off" data-live-search="true" title="seleccione uno de los siguientes...">
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
        <label for="code" class="label">Código de barra del producto.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="fa fa-barcode menu-icon"></i>
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
            <label for="quantity" class="label">Cantidad a vender.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="measure"></span>
                <input type="number" class="form-control" name="quantity" id="quantity" step="0.01" placeholder="Cantidad a vender" aria-describedby="addon-wrapping" >
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="stock" class="label">Cantidad a actual en el inventario.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="measure_stock"></span>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock actual" aria-describedby="addon-wrapping" disabled>
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="price" class="label">Precio para la venta.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><strong>Bs.</strong></span>
                <input type="number" class="form-control" name="price" id="price" placeholder="Precio de venta" aria-describedby="addon-wrapping" disabled>
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="tax" class="label">(%) Impuesto para el producto.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><strong>%</strong></span>
                <input type="number" class="form-control" name="tax_product" id="tax_product" placeholder="Impuesto (16%)" aria-describedby="addon-wrapping" disabled>
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="discount" class="label">(%) Descuento para el producto.</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><strong>%</strong></span>
                <input type="number" class="form-control" name="discount" id="discount" placeholder="Porcentaje de descuento" aria-describedby="addon-wrapping">
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" name="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<br>
<hr>
<div class="form-group pt-5">
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
                    <th colspan="6">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="6">
                        <p align="right">TOTAL IMPUESTO (16%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs. 0.00</span></p>
                        <input type="hidden" name="total_tax" id="total_tax">
                    </th>
                </tr>
                <tr>
                    <th colspan="6">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right">
                            <span align="right" id="total_pagar_html">Bs. 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                        <p align="right">
                            <span align="right" id="total_pagar_divisas_html">$. 0.00</span>
                            <input type="hidden" name="total_pagar_divisas" id="total_pagar_divisas">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
