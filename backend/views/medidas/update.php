<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Medidas */

$this->title = 'Update Medidas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Medidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medidas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
