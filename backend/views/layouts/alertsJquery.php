<?php
$script = <<< JS
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 9000
    });
JS;
if ($toast = Yii::$app->session->getFlash('success-swaltoast')) {
    $message = $toast;
    $script .= <<< JS
    $(document).ready(function(){
        Toast.fire({
          icon: 'success',
          title: '$message'
        });
    });
JS;
}
if ($toast = Yii::$app->session->getFlash('info-swaltoast')) {
    $message = $toast;
    $script .= <<< JS
    $(document).ready(function(){
        Toast.fire({
          icon: 'info',
        title: '$message'
        });
    });
JS;
}
if ($toast = Yii::$app->session->getFlash('error-swaltoast')) {
    $message = $toast;
    $script .= <<< JS
    $(document).ready(function(){
        Toast.fire({
          icon: 'error',
        title: '$message'
        });
    });
JS;
}
if ($toast = Yii::$app->session->getFlash('warning-swaltoast')) {
    $message = $toast;
    $script .= <<< JS
    $(document).ready(function(){
        Toast.fire({
          icon: 'warning',
        title: '$message'
        });
    });
JS;
}
 $script .= <<< JS
 });
JS;
$this->registerJs($script);


