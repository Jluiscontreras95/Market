
<div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control selectpicker" name="product_id" id="product_id" data-live-search="true" >
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
                <select class="form-control" name="provider_id" id="provider_id" >
                    <!-- <option value="" disabled selected>Seleccionar proveedor</option> -->
                </select>
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
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="cantidad a adquirir" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <select class="form-control selectpicker" name="measure" id="measure" data-live-search="true" >
                    <option value="" disabled selected>Seleccionar medida</option>
                    <option value="KG">KG</option>
                    <option value="UND">UNIDADES</option>
                </select>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    
        <div class="col">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="far far fa-handshake menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Precio de la compra (detal)" aria-describedby="addon-wrapping" >
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
                    <i class="fa fa-tag menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="tax" id="tax" placeholder="Impuesto agregado (IVA)" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>

</div>


<div class="form-group">
    <button type="button" id="agregar" name="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-tittle">Detalles de compra</h4>
    <div class="table-responsive col-md12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(Bs.)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(Bs.)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (16%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
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












