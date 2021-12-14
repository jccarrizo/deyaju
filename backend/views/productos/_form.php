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
            $model->id = 0;
            echo $form->field($model, 'id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            
            <?=
            $form->field($medidas, 'id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($medidas_list, 'id', 'medida'),
                'options' => ['placeholder' => 'Selecione una medida'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
            
            <?= $form->field($model, 'medida_valor')->textInput() ?>

            <?= $form->field($model, 'sobre_nombre')->textInput(['maxlength' => true]) ?>

            <?php
            echo $form->field($model, 'precio')->textInput();
            
            ?>

            <?= $form->field($model, 'precio_mayor')->textInput() ?>

            
            <?=
            $form->field($marcas, 'id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($marcas_list, 'id', 'nombre'),
                'options' => ['placeholder' => 'Selecione una marca'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false);
            ?>
            

            <div class="form-group mt-4">
                <?= Html::submitButton(($model->isNewRecord) ? 'Guardar' : 'Actualizar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
