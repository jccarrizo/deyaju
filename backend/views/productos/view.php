<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\Core;

/* @var $this yii\web\View */
/* @var $model common\models\Productos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Nuevo Stock', ['stock', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            
            [
                'label' => 'Stock',
                'value' => Core::getStock($model->id),
            ],
            'sobre_nombre',
            [// the owner name of the model
                'label' => 'Medida',
                'value' => $model->medida_valor." ".$model->medida->simbolo,
            ],
            'precio',
            'precio_mayor',
        ],
    ])
    ?>

</div>
