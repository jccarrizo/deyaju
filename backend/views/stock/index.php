<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'id_producto',
//            [
//                'attribute' => 'id_producto',
//                'value' => 'producto.nombre',
//                'filter' => true
//            ],
            [
                'attribute' => 'producto',
                'value' => function ($model) {
                    if ($model->producto) {
                        return $model->producto->nombre;
                    } else {
                        return '';
                    }
                },
                'filter' => true,
            ],
            'precio',
            'precio_mayor',
            'cantidad',
            'created_at',
            'update_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
