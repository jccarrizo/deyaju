<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productos */

$this->title = 'Agregar Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'marcas'=>$marcas,'marcas_list'=>$marcas_list,
        'medidas'=>$medidas,'medidas_list'=>$medidas_list
    ]) ?>

</div>
