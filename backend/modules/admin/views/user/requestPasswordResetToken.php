<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\PasswordResetRequest */

$this->title = 'Request password reset.';
$this->params['breadcrumbs'][] = $this->title;
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('@web/css/custom.css');
?>
<body class="hold-transition login-page" id="fondoreset">
    <div class="login-box">
        <div class="login-logo">
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="images/logo-d.png" alt="logowhin" style="width: 250px;
                     height: 40px;
                     display: block;
                     margin: auto;">
                <p class="login-box-msg">¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.</p>
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email') ?>

                <div class="text-center form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Enviar'), ['class' => 'btn btn-primary']) ?>
                </div>

                <div class="text-center formulario">
                    <?= Html::a('Iniciar sesión', ['/admin/user/login']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
    <!-- /.login-box -->
</body>