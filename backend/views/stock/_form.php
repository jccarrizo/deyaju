<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Stock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">
    <div>
        <h2>Stock: <?= $model->producto->nombre ?></h2>
        <h3><?= $model->producto->sobre_nombre ?></h3>
        <h4>Fecha stock: <?= $model->created_at ?></h4>
        <h4>Fecha stock última actualización: <?= $model->created_at ?></h4>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'precio_mayor')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton(($model->isNewRecord)?'Guardar':"Actualizar", ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
