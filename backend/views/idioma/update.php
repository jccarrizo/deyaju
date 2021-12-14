<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Idioma */

$this->title = 'Modificar Idioma: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_idioma, 'url' => ['view', 'id' => $model->id_idioma]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="idioma-update">

    <!-- <h1><?= ""//Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
