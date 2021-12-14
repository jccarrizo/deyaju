<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use common\helpers\Core;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

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
                    <p class="login-box-msg">Ingresa tus credenciales para iniciar sesión</p>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nombre de usuario'); ?>
                    <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                    <!-- <?= $form->field($model, 'rememberMe')->checkbox() ?> -->
                    <div class="info_login">
                        ¿Olvidó su contraseña?. <?= Html::a('Reiníciala', ['site/request-password-reset']) ?>.
                    </div>
                    <div class="info_login">
                        ¿No tienes una cuenta? <?= Html::a('Regístrate', ['site/signup']) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
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
$relativeHomeUrl = yii\helpers\Url::toRoute('index');
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