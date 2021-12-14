<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Usuario: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-12">
    <div class="usuario-view">

        <!-- <h1><?= "" //Html::encode($this->title) 
                    ?></h1> -->

        <p>
            <?= Html::a('Modificar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_usuario], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Está seguro que desea eliminar este Item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_usuario',
                //'id_user',
                [
                    'attribute' => 'Usuario',
                    'value' => $model->user->username
                ],

                'fecha_nacimiento',
                'genero',
            ],
        ]) ?>
        <p>
            <?= Html::a('Salir', ['index'], ['class' => 'btn btn-primary']); ?>
        </p>
    </div>
</div>