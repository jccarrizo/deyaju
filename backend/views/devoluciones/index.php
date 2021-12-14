<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DevolucionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Devoluciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="devoluciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Devoluciones', ['create'], ['class' => 'btn btn-success']) ?>
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
            'qty',
            'motivo:ntext',
            'fecha',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
