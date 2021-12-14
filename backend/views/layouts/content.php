<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark";">
                        <?php
                        if (!is_null($this->title)) {
                            echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    echo "<div class='area-message'>";
    if (Yii::$app->session->getFlash('system')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'info',
            'title' => '¡Sistema',
            'body' => Yii::$app->session->getFlash('system'),
        ]) . "</div>";
    }
    if (Yii::$app->session->getFlash('success')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'success',
            'title' => '¡Hecho',
            'body' => Yii::$app->session->getFlash('success'),
        ]) . "</div>";
    }
    if (Yii::$app->session->getFlash('danger')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'danger',
            'title' => '¡Error',
            'body' => Yii::$app->session->getFlash('danger'),
        ]) . "</div>";
    }
    if (Yii::$app->session->getFlash('info')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'info',
            'title' => '¡Información',
            'body' => Yii::$app->session->getFlash('info'),
        ]) . "</div>";
    }
    if (Yii::$app->session->getFlash('warning')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'warning',
            'title' => '¡Advertencia',
            'body' => Yii::$app->session->getFlash('warning'),
        ]) . "</div></div>";
    }
    if (Yii::$app->session->getFlash('light')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'light',
            'title' => '¡Mensaje',
            'body' => Yii::$app->session->getFlash('light'),
        ]) . "</div>";
    }
    if (Yii::$app->session->getFlash('dark')) {
        echo "<div class='box-message'>" . \hail812\adminlte3\widgets\Alert::widget([
            'type' => 'dark',
            'title' => '¡Mensaje',
            'body' => Yii::$app->session->getFlash('dark'),
        ]) . "</div>";
    }
    echo "</div>";
    ?>
    <div class="content">
        <?= $content ?>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>