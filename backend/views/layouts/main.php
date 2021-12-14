<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
$this->registerCssFile('@web/css/custom.css'); //main en uso
$this->registerCssFile('@web/plugins/fontawesome-free/css/all.min.css');
$this->registerCssFile('@web/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
$this->registerCssFile('@web/plugins/toastr/toastr.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
$this->registerCssFile('@web/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
$this->registerCssFile('@web/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
$this->registerCssFile('@web/css/jquery-ui.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <style>
        .area-message {
            position: absolute;
            z-index: 1050;
            right: 10px;
            top: 15px;
            min-width: 280px;
        }
    </style>
    <?php
    $request = Yii::$app->request;
    $id = $request->get('id');
    $style = 'hold-transition sidebar-mini';
    ?>

    <body class="<?= $style ?>">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <!-- Navbar -->
            <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

            <!-- Content Wrapper. Contains page content -->

            <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <?= $this->render('control-sidebar') ?>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?= $this->render('footer') ?>
        </div>
        <?= $this->registerJsFile('@web/plugins/jquery/jquery.min.js'); ?>
        <?= $this->registerJsFile('@web/plugins/sweetalert2/sweetalert2.min.js'); ?>
        <?= $this->registerJsFile('@web/plugins/toastr/toastr.min.js'); ?>
        <?= $this->registerJsFile('@web/dist/js/demo.js'); ?>



        <?php
        $this->registerJsFile('@web/socket.io-client/dist/socket.io.js', ['position' => \yii\web\View::POS_HEAD]);
        $this->registerJsFile('https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js', ['position' => \yii\web\View::POS_HEAD]);
//        $this->registerJsFile('@web/angularjs/abouttest.js', ['position' => \yii\web\View::POS_HEAD]);
        require 'alertsJquery.php';
        $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', ['position' => \yii\web\View::POS_END]);
        ?>
        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>