<?php

use yii\bootstrap4\Dropdown;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Idioma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="idioma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->dropDownList(
        ['Español' => 'Español', 'Inglés' => 'Inglés', 'Francés' => 'Francés', 'Italiano' => 'Italiano', 'Chino Mandarín' => 'Chino Mandarín', 'Alemán' => 'Alemán', 'Portugués' => 'Portugués', 'Ruso' => 'Ruso', 'Árabe' => 'Árabe', 'Hindi' => 'Hindi'],
        ['prompt' => 'Seleccione uno']
    ) ?>

    <div class="form-group">
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>