<?php

use common\helpers\Core;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('@web/css/custom.css');
$this->title = 'Registrar Usuario'
?>
<style>
    .help-block {
        color: #cc0000;
    }
</style>
<meta name="viewport">

<body class="hold-transition login-page">
    <div style="margin: auto;" class="login-box text-center">

        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="<?= Core::getBaseUrl() ?>/images/logo-d.png" alt="logowhin" style="width: 250px;
                     height: 40px;
                     display: block;
                     margin: auto;">
                <p class="login-box-msg">Ingresa los datos para registrar</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->label('Usuario') ?>
                <?= $form->field($model, 'email')->label('Correo electrónico') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                <?= $form->field($model, 'retypePassword')->passwordInput()->label('Confirmar contraseña') ?>

                <div class="form-group text-center">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Registrar usuario'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</body>