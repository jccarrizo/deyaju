<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Core;
/* @var $this yii\web\View */
/* @var $model common\models\Stock */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'id_producto',
            [
                'label' => 'Producto',
                'value' => $model->producto->nombre . " (" . $model->producto->sobre_nombre . ")",
            ],
            'precio',
            'precio_mayor',
            'cantidad',
            'created_at',
            'update_at',
            [
                'label' => 'Total en Stock',
                'value' => Core::getStock($model->id_producto)."",
            ]
        ],
    ]) ?>

</div>
