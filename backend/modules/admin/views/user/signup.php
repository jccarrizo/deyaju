<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('@web/css/custom.css');
?>
<style>
    .help-block {
        color: #cc0000;
    }
</style>
<title>Registro</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body class="hold-transition login-page" id="fondosign">
    <div class="login-box text-center">

        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="images/logo-d.png" alt="logowhin" style="width: 250px;
                     height: 40px;
                     display: block;
                     margin: auto;">
                <p class="login-box-msg">Ingrese sus datos para registrarse</p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->label('Usuario') ?>
                <?= $form->field($model, 'email')->label('Correo electrónico') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                <?= $form->field($model, 'retypePassword')->passwordInput()->label('Confirmar contraseña') ?>

                <div class="form-group text-center">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Regístrate'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <div class="text-center formulario">
                    <?= Html::a('Iniciar Sesión', ['user/login']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</body>