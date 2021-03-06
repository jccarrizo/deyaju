<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productos */

$this->title = 'Actualizar Productos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model, 'medidas' => $medidas, 'medidas_list' => $medidas_list,
        'marcas' => $marcas,
        'marcas_list' => $marcas_list
    ])
    ?>

</div>
