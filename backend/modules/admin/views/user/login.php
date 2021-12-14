<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = Yii::t('rbac-admin', 'Login');
$this->params['breadcrumbs'][] = $this->title;

///\yii\bootstrap\BootstrapAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('@web/css/custom.css');
?>
<title>Iniciar Sesión</title>

<body class="hold-transition login-page" id="fondologin">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <img src="images/logo-d.png" alt="Deyaju" style="width: 250px;
                     height: 40px;
                     display: block;
                     margin: auto;">
                <p class="login-box-msg">Ingresa tus credenciales para iniciar sesión</p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->label('Usuario') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                <?= '' //$form->field($model, 'rememberMe')->checkbox() 
                ?>
                <div class="text-center formulario">
                    <?= Html::a('Olvidé mi contraseña', ['user/request-password-reset']) ?>
                </div>
                <div class="text-center mb-3 formulario">
                    <!-- <?= Html::a('Regístrate', ['user/signup']) ?> -->
                </div>
                <div class="text-center form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!----------->
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
</body>