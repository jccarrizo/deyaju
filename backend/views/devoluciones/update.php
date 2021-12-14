<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Devoluciones */

$this->title = 'Update Devoluciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Devoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="devoluciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'productos'=>$productos
    ]) ?>

</div>
