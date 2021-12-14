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


//Yii::$app->session->setFlash('warning-swaltoast','Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
//Yii::$app->session->setFlash('default-toast-bottomRight','Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');

$script = <<< JS
JS;
if ($toast = Yii::$app->session->getFlash('success-toast')) {
    $message = $toast;
    $script .= <<< JS
$(document).Toasts('create', {
        class: 'bg-success', 
        title: '¡Hecho!',
        subtitle: 'Cerrar',
        body: '$message'
      })
JS;
}
if ($toast = Yii::$app->session->getFlash('info-toast')) {
    $message = $toast;
    $script .= <<< JS
$(document).Toasts('create', {
        class: 'bg-info', 
        title: '¡Hecho!',
        subtitle: 'Cerrar',
        body: '$message'
      })
JS;
}
if ($toast = Yii::$app->session->getFlash('warning-toast')) {
    $message = $toast;
    $script .= <<< JS
$(document).Toasts('create', {
        class: 'bg-warning', 
        title: '¡Advertencia!',
        subtitle: 'Cerrar',
        body: '$message'
      })
JS;
}

if ($toast = Yii::$app->session->getFlash('danger-toast')) {
    $message = $toast;
    $script .= <<< JS
$(document).Toasts('create', {
        class: 'bg-danger', 
        title: '¡Error!',
        subtitle: 'Cerrar',
        body: '$message'
      })
JS;
}

$this->registerJs($script);
