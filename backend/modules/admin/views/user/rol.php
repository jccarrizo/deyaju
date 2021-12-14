<?php

use yii\helpers\Html;

$this->registerCssFile('@web/plugins/fontawesome-free/css/all.min.css');
$this->registerCssFile('@web/plugins/icheck-bootstrap/icheck-bootstrap.min.css');
$this->registerCssFile('@web/dist/css/adminlte.min.css');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

?>

<head>
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    .login-box,
    .register-box {
        width: 550px;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Whim</b>Cams</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="text-center">
                            <i style="font-size: 50px;" class="ion ion-person"></i>
                            <h3>Cuenta Personal</h3>
                            <h4>1 persona</h4>
                            <p>Se tu propio jefe y trabaja cuando quieras.</p>
                            <?= Html::a('Seleccionar', ['assignrol', 'name' => 'Modelo'], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="text-center">
                            <i style="font-size: 50px;" class="ion-person-stalker"></i>
                            <h3>Cuenta de Estudio</h3>
                            <h4>2 o más persona</h4>
                            <p>Administrate a ti y a tu pareja, o las carreras de tus modelos</p><?= Html::a('Seleccionar', ['assignrol', 'name' => 'Estudio'], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>