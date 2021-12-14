<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use common\helpers\Core;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* $this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */


$this->title = 'Iniciar Sesión';
$this->registerCssFile('@web/plugins/toastr/toastr.min.css');
$this->registerCssFile('@web/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');
?>
<div class="site-login">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="modal fade" id="modal-login">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="<?= Core::getBaseUrl() ?>/images/logo-w.png" alt="logowhin" style="width: 100%;"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p class="login-box-msg">Por favor completa tu correo electrónico. Allí se te enviará un enlace para restablecer la contraseña.</p>
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                    <div class="info_login">
                        ¿Ya tienes una cuenta?. <?= Html::a('Ingresar', ['site/login']) ?>.
                    </div>
                    <!--                     <div class="info_login">
                        ¿No tienes una cuenta? <?= Html::a('Regístrate', ['site/signup']) ?>
                    </div> -->
                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJsFile('@web/plugins/jquery/jquery.min.js');
$this->registerJsFile('@web/plugins/bootstrap/js/bootstrap.bundle.min.js');
$this->registerJsFile('@web/plugins/sweetalert2/sweetalert2.min.js');
$this->registerJsFile('@web/plugins/toastr/toastr.min.js');
$relativeHomeUrl = yii\helpers\Url::toRoute('login');
$script = <<< JS
$(document).ready(function(){
    $('#modal-login').modal('show');
     var url = "$relativeHomeUrl";
   $('#modal-login').on('hidden.bs.modal', function () {
        window.location.href = url;
    });     
}); 
JS;
$this->registerJs($script);
?>