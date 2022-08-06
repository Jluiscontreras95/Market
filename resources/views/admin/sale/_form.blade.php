<div class="form-group">
    <label for="client_id">Cliente</label>
    <select class="form-control" name="client_id" id="client_id" required>
        <option value="" selected>Seleccionar</option>
            @foreach ($clients as $client)   
                <option value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
    </select>
</div>

<div class="form-group">
  <label for="code">Código de barras</label>
  <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div>

<div class="form-group">
  <label for="tax">Impuesto</label>
  <input type="number"
    class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="16%">
  <small id="helpId" class="form-text text-muted"></small>
</div>

<div class="form-group">
    <label for="product_id">Producto</label>
    <select class="form-control selectpicker" name="product_id" id="product_id"  data-live-search="true">
        <option value="" disabled selected>Seleccionar</option>
            @foreach ($products as $product)   
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
    </select>
</div>


<div class="form-group">
    <label for="">Stock actual</label>
    <input type="text" name="stock" id="stock" value="" class="form-control" disabled>
    <small id="helpId" class="form-text text-muted"></small>
</div>


<div class="form-group">
  <label for="quantity">Cantidad</label>
  <input type="number"
    class="form-control" name="quantity" id="quantity" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <label for="price">Precio de venta</label>
  <input type="number"
    class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="" disabled>
  <small id="helpId" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <label for="discount">Porcentaje de descuento</label>
  <input type="number"
    class="form-control" name="discount" id="discount" aria-describedby="helpId" placeholder="" value="0">
  <small id="helpId" class="form-text text-muted"></small>
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
                    <th>Precio de venta(PEN)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal(PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right">
                            <span align="right" id="total_pagar_html">PEN 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>



</div>
