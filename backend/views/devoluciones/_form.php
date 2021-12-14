<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Devoluciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devoluciones-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?=
    $form->field($model, 'id_producto')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($productos, 'id', 'nombre'),
        'options' => ['placeholder' => 'Selecione una producto'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(false);
    ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'motivo')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'fuera_inventario')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
