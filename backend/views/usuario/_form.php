<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'id_user')->dropDownList(
                \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
                array('prompt' => 'Seleccione el Usuario')
            );
            ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'fecha_nacimiento')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha de nacimiento'],
                'language' => 'es',
                'bsVersion' => 4,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'genero')->dropDownList(
                    ['MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO', 'TRANSGENERO' => 'TRANSGENERO'],
                    ['prompt' => 'Seleccione el genero']
                );
                ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-primary']); ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>