<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Core;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<?= Html::a('Nuevo Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nombre',
            'sobre_nombre',
            'precio',
            [
                'label' => 'Stock',
                'value' => function ($model) {
                    return Core::getStock($model->id);
                }
            ],
//            'created_at',
            //'precio_mayor',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
