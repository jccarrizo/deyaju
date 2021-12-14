<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productos */

$this->title = 'Stock Producto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Stock';
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) . " - " . $model->nombre ?></h1>

    <?= $this->render('_form_stock', [
        'model' => $model,'stock'=>$stock
    ]) ?>

</div>
