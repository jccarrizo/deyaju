<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Productos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="productos-form">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <?php $form = ActiveForm::begin(); ?>
            <?php
            echo $form->field($model, 'id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'nombre')->textInput(['readonly'=> true]) ?>
            <?= $form->field($model, 'sobre_nombre')->textInput(['readonly'=> true]) ?>
            
            <?= $form->field($model->medida, 'medida')->textInput(['readonly'=> true]) ?>
            
            <?= $form->field($model, 'medida_valor')->textInput(['readonly'=> true]) ?>

            
            <?php
            $stock->precio = $model->precio;
            echo $form->field($stock, 'precio')->textInput();
            
            ?>

            <?php
            $stock->precio_mayor = $model->precio_mayor;
            echo $form->field($stock, 'precio_mayor')->textInput() ?>
            
            <?= $form->field($stock, 'cantidad')->textInput() ?>
            

            <div class="form-group mt-4">
                <?= Html::submitButton(($model->isNewRecord) ? 'Guardar' : 'Guardar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
