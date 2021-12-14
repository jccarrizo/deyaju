<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Ventas */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['searchclient']);
$urlProductos = \yii\helpers\Url::to(['searchproduct']);
//print_r($clientes);
$data = ArrayHelper::map($clientes, 'id', 'nombre');
$dataProducto = ArrayHelper::map($productos, 'id', 'nombre');

echo "<script>productos = [];</script>";
?>
<style>
    
</style>
<div class="ventas-form">



</div>
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-4">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Cliente:</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="col-md-12">

                                <div>

                                </div>
                            </div>
                            <?php $form = ActiveForm::begin(['id' => 'form-search']); ?>
                            <?php
//                            print_r($clientes);

                            echo $form->field($productosModel, 'nombre')->widget(Select2::classname(), [
                                'data' => $dataProducto,
                                'options' => ['multiple' => false, 'placeholder' => 'Buscar producto'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 3,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => $urlProductos,
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(productos) { return productos.text + " - " + productos.sobre_nombre; }'),
                                    'templateSelection' => new JsExpression('function (producto) {'
                                            . 'let result = producto.text;'
                                            . 'if(producto.id != undefined && producto.id != ""){setProduct(producto);}'
                                            . 'if( producto.sobre_nombre != undefined && producto.sobre_nombre != "" ){result += " (" + producto.sobre_nombre + ")"; }'
                                            . 'return result;'
                                            . '}'),
                                ],
                            ])->label("Buscar Productos");
                            echo '<hr>';
                            ?>
                            <?php ActiveForm::end(); ?>
                            <?php $form = ActiveForm::begin(); ?>
                            <?= Html::label('Producto', 'producto', ['class' => 'control-label']) ?>
                            <?= Html::input('text', 'producto', "", ['id' => 'producto', 'class' => 'form-control', 'readonly' => true]) ?>

                            <?php
                            $form->field($model, 'id_cliente')->hiddenInput();
                            ?>
                            <?= $form->field($model, 'id_producto')->hiddenInput()->label(false) ?>
                            <div class="input-group">
                                <?= $form->field($model, 'valor_real')->hiddenInput(['readonly' => true])->label(false) ?>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'valor_venta')->textInput(['placeholder' => "0"]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'valor_unidad')->textInput(['readonly' => true, 'placeholder' => "0"]) ?>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'cantidad')->textInput(['placeholder' => "0"]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= Html::label('Total', 'total', ['class' => 'control-label']) ?>
                                    <?= Html::input('text', 'total', "", ['id' => 'total', 'class' => 'form-control', 'readonly' => true, 'placeholder' => "0"]) ?>
                                </div>

                            </div>




                            <?= $form->field($model, 'observacion')->textarea(['rows' => 2]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Agregar', ['class' => 'btn btn-success add-car']) ?>
                                <a id="btn-cancelar" href="javascript:void(0);" class="btn btn-danger">Cancelar</a>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="col-md-8">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <div class="search-client">
                            <?php
                            $form = ActiveForm::begin(['id' => 'form-search-client']);
                            $clientesModel->nombre = $clientes[0]->nombre;
                            echo $form->field($clientesModel, 'nombre')->widget(Select2::classname(), [
                                'data' => $data,
                                'options' => ['multiple' => false, 'placeholder' => 'Buscar cliente'],
                                'pluginOptions' => [
                                    'allowClear' => false,
                                    'minimumInputLength' => 3,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => $url,
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(cliente) { return cliente.text + " - " + cliente.alias; }'),
                                    'templateSelection' => new JsExpression('function (cliente) {'
                                            . 'let result = cliente.text;'
                                            . 'if(cliente.identificacion != undefined || cliente.identificacion != "" ){result = (cliente.identificacion != undefined?cliente.identificacion + " - ":"") + result + ( (cliente.alias != undefined && cliente.alias != "")?" (" + cliente.alias + ")":"")}else{}'
                                            . 'if(cliente.id != undefined && cliente.id != ""){setClient(result)}'
                                            . 'return result;'
                                            . '}'),
                                ],
                            ])->label(false);
                            ActiveForm::end();
                            ?>
                        </div>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="pedido" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th >
                                        Producto(s)
                                    </th>
                                    <th>
                                        Cant.
                                    </th>
                                    <th style="width: 200px;">
                                        Cuenta
                                    </th>
                                    <th>
                                        Observación
                                    </th>
                                    <th style="width: 65px;">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <span>Total:</span> $<span id="total-lista">0</span> 
                    </div>



                </div>
                <!-- /.card -->
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    var table;
    var editar = false;
    function setClient(client) {
        $('.card-title').html(client);
    }
    function setProduct(data) {
        $('#ventas-cantidad').val(1);
        let qty = $("#ventas-cantidad").val();
        console.log(data.id);
        //
        $('#ventas-id_producto').val(data.id);
        $('#producto').val(data.text + " (" + data.sobre_nombre + ")");
        //ventas-valor_real

        $('#ventas-valor_real').val(data.precio);
        $('#ventas-valor_venta').val(data.precio);
        $('#ventas-valor_unidad').val(data.precio);
        $('#total').val(data.precio * qty);
        $.each(productos, function (index, value) {
            if (value.id_producto == data.id) {
                $("#ventas-observacion").val(value.observacion);
            }
        });
    }

    function addToCar(_table) {

        let qty = 0;
        let isNew = true;
        $('.add-car').html('Agregar');
        let data = {
            producto: $('#producto').val(),
            id_producto: $('#ventas-id_producto').val(),
            cantidad: (parseInt($('#ventas-cantidad').val()) + qty),
            valor_real: $('#ventas-valor_real').val(),
            valor_venta: $('#ventas-valor_venta').val(),
            valor_unidad: $('#ventas-valor_unidad').val(),
            observacion: $("#ventas-observacion").val()
        }
        if (productos.length == 0) {
            productos.push(data);
            $("#ventas-observacion").val("");
        } else {

            $.each(productos, function (index, value) {
                if (value.id_producto == $('#ventas-id_producto').val()) {
                    if (!editar) {
                        if ($("#ventas-observacion").val() == "") {
                            data.observacion = value.observacion;
                        } else {
                            data.observacion = $("#ventas-observacion").val();
                        }
                        data.cantidad = value.cantidad + parseInt($("#ventas-cantidad").val());
                        $("#ventas-cantidad").val(data.cantidad);
                    }
                    isNew = false;
                    productos[index] = data;
                }
            });
            if (isNew) {
                productos.push(data);

            }
        }

        templateProduct(_table);
        $("#ventas-cantidad").val("");
        $('#w0')[0].reset();
        $('#ventas-id_producto').val(0);
//        $('#producto').val("");
//        $('#ventas-valor_real').val("");

//        $('#ventas-valor_venta').val("");
//        $('#ventas-valor_unidad').val("");
//        $('#total').val("");
//        $("#ventas-observacion").val("");
        $('#form-search')[0].reset()
        editar = false;
//        $('#productos-nombre').val('').trigger("change");
    }

    function templateProduct(_table) {
        let html = ``;
        let total = 0;
        let cuenta = "";
        let actions = "";
        _table.clear().draw();
        $.each(productos, function (index, value) {
            total += value.valor_venta * value.cantidad;
            cuenta = `
            <div><small>Valor venta: ` + (value.valor_venta) + `</small></div>
            <div><small>Valor Unidad: ` + (value.valor_unidad) + `</small></div>
            <div><small>Total producto: ` + (value.valor_venta * value.cantidad) + `</small></div>
        `;
            actions = `
        <a onclick="editarProducto(` + (value.id_producto) + `)" data-idproducto="` + (value.id_producto) + `" class="btn btn-info btn-sm" href="javascript:void(0)">
        <i class="fas fa-pencil-alt">
        </i>
        </a>
        <a onclick="eliminarProducto(` + (value.id_producto) + `)" data-idproducto="` + (value.id_producto) + `" class="btn btn-danger btn-sm" href="javascript:void(0)">
            <i class="fas fa-trash">
            </i>
        </a>
`;
            _table.row.add([(index + 1), (value.producto), (value.cantidad), cuenta, (value.observacion), actions]).draw();
            $("#summary").remove();
            if (productos.length == 0) {
                return;
            }
            let summary = `
            <tr id="summary" >
                <td colspan="6">Total: $` + addCommas(total.toFixed(2)) + `</td>
            </tr>
`;
            $("#pedido tbody").append(summary);

        });

        $('#total-lista').html(total);

    }
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    function editarProducto(id) {
        $('.add-car').html('Editar');
        $.each(productos, function (index, value) {
            if (value.id_producto == id) {
                $("#ventas-cantidad").val(value.cantidad);
                $('#ventas-id_producto').val(value.id_producto);
                $('#producto').val(value.producto);
                $('#ventas-valor_real').val(value.valor_real);
                $("#ventas-cantidad").val(value.cantidad);
                $('#ventas-valor_venta').val(value.valor_venta);
                $('#ventas-valor_unidad').val(value.valor_unidad);
                $('#total').val(value.valor_venta * value.cantidad);
                $("#ventas-observacion").val(value.observacion);
                editar = true;
            }
        });
    }
    function eliminarProducto(id) {
        productos = jQuery.grep(productos, function (value) {
            return value.id_producto != id;
        });
        editar = false;
        templateProduct(table);
        $('form')[0].reset()
//        $("#ventas-cantidad").val("");
        $('#ventas-id_producto').val(0);
//        $('#producto').val("");
//        $('#ventas-valor_real').val("");
//        $("#ventas-cantidad").val("");
//        $('#ventas-valor_venta').val("");
//        $('#ventas-valor_unidad').val("");
//        $('#total').val("");
//        $("#ventas-observacion").val("");
    }
</script>
<?php
$script = <<< JS
        $(document).ready(function(){
        table = $('#pedido').DataTable(
            {
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'print'
        ]
    });
            $('#w0').on('beforeSubmit', function(e) {
                if($('#ventas-id_producto').val() == 0 || $('#total').val() == 0){
                    return;
                }
                addToCar(table);
        
            }).on('submit', function(e){
                e.preventDefault();
            });
        
            $('#form-search').on('beforeSubmit', function(e) {
                e.preventDefault();
            }).on('submit', function(e){
                e.preventDefault();
            });
            
        $('#ventas-cantidad').on('keyup',function(){
        
            if($('#ventas-id_producto').val() == 0){
                return;
            }
            let cantidad = $(this).val();
            let valor_venta = $('#ventas-valor_venta').val();
            let total = $('#total').val( valor_venta * cantidad );
        });
        $('#ventas-valor_venta').on('keyup',function(){
        
            if($('#ventas-id_producto').val() == 0){
                return;
            }
            let cantidad = $('#ventas-cantidad').val();
            let valor_venta = $(this).val();
            let total = $('#total').val( valor_venta * cantidad );
        });
        
        function initForm(){
                //$('#w0').reset();
            $('form')[0].reset();
            $("#ventas-cantidad").val("");
            $('#ventas-id_producto').val();
            $('#ventas-id_producto').val("");
            $('#producto').val("");
            $('#ventas-valor_real').val("");
            $('#ventas-valor_venta').val("");
            $('#ventas-valor_unidad').val("");
            $('#total').val("");
            $("#ventas-observacion").val("");
        }
        initForm();
        $('#btn-cancelar').on('click',function(){
            initForm();
            $('.add-car').html('Agregar');
        });
   });
JS;
$this->registerJs($script);
$this->registerJsFile('@web/plugins/datatables/jquery.dataTables.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-responsive/js/dataTables.responsive.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-responsive/js/responsive.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-buttons/js/dataTables.buttons.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-buttons/js/buttons.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJsFile('@web/plugins/datatables-buttons/js/buttons.html5.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-buttons/js/buttons.print.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/plugins/datatables-buttons/js/buttons.colVis.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerJsFile("@web/js/customs/ventas.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
