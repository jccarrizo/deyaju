<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\helpers\Core;
use himiklab\yii2\recaptcha\ReCaptcha2;
use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap4\ActiveForm;

$this->title = 'Regístrate';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/plugins/toastr/toastr.min.css');
$this->registerCssFile('@web/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');
?>
<div class="site-login">
    <div class="modal fade" id="modal-login">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="<?= Core::getBaseUrl() ?>/images/logo-w.png" alt="logowhin" style="width: 100%;"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="login-box-msg">Ingresa tus datos para realizar el registro.</p>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-7\">{input} {error}</div>\n",
                            'labelOptions' => ['class' => 'col-lg-5 col-form-label'],
                        ],
                    ]); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                    
                    
                    <?= $form->field($model, 'reCaptcha')->widget(
                        ReCaptcha2::className(),
                        [
                            'siteKey' => '6LcKBowaAAAAAPeYcmplFJnD5MYh19EPbIre3vSK',
                        ]
                    )->label(false) ?>

                    <div class="text-center">
                        <div class="form-group">
                            <?= Html::submitButton('Regístrate', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>
                        <div class="info_login">
                            ¿Ya tienes una cuenta? <?= Html::a('Ingresar', ['site/login']) ?>
                        </div>
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