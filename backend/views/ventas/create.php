<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ventas */

$this->title = 'Nueva Venta';
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'clientes'=>$clientes,'clientesModel'=>$clientesModel,'productos'=>$productos,
        'productosModel'=>$productosModel
    ]) ?>

</div>
