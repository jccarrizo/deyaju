<?php

use hail812\adminlte3\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        <?= Html::img('@web/logo.png', ['alt' => 'logo', 'class' => 'brand-image img-circle elevation-3','style'=>"opacity: .8"]) ?>
        <span class="brand-text font-weight-light">Deyaju</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?= Html::img('@web/images/young-user-icon.png', ['alt' => 'User Image', 'class' => 'img-circle elevation-2']) ?>
                </div>

                <div class="info">
                    <a href="#" class="d-block"><?= ucfirst(\Yii::$app->user->identity->username); ?></a>
                </div>
            </div>
        <?php } ?>
        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-fw fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="sidebar-search-results">
                    <div class="list-group"><a href="#" class="list-group-item">
                            <div class="search-title">No element found!</div>
                            <div class="search-path"></div>
                        </a></div>
                </div>
            </div>
            <div class="mt-2">
                <?php
                echo Menu::widget([
                    'items' => [
                        [
                            'label' => 'Inicio',
                            'url' => ['site/index'],
                            'icon' => 'home',
                            'visible' => (Yii::$app->user->isGuest) || (!Yii::$app->user->isGuest),
                            'active' => in_array(
                                $this->context->route,
                                [
                                    'site/index'
                                ]
                            )
                        ],
                        /*                         [
                            'label' => 'Starter Pages',
                            'icon' => 'tachometer-alt',
                            'badge' => '<span class="right badge badge-info">2</span>',
                            'items' => [
                                ['label' => 'Active Page', 'url' => ['/site/index'], 'iconStyle' => 'far'],
                                ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                            ]
                        ], */
                        /*                         [
                            'label' => 'Admin. RBAC',
                            'icon' => 'tachometer-alt',
                            //'badge' => '<span class="right badge badge-info">2</span>',
                            'items' => [
                                ['label' => 'Asignaciones', 'url' => ['/admin/assignment/index'], 'iconStyle' => 'far'],
                                ['label' => 'Rutas', 'url' => ['/admin/route/index'], 'iconStyle' => 'far'],
                                ['label' => 'Permisos', 'url' => ['/admin/permission/index'], 'iconStyle' => 'far'],
                                ['label' => 'Menús', 'url' => ['/admin/menu/index'], 'iconStyle' => 'far'],
                                ['label' => 'Roles', 'url' => ['/admin/role/index'], 'iconStyle' => 'far'],
                                ['label' => 'Usuarios', 'url' => ['/admin/user/index'], 'iconStyle' => 'far'],
                            ]
                        ], */
                        /* ['label' => 'Modals Example', 'url' => ['/modals/index'], 'iconStyle' => 'far'], */
                        /*                         [
                            'label' => 'Modelo Info Personal',
                            'icon' => 'tachometer-alt',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['/modelo-info-personal/index'], 'iconStyle' => 'far'],
                            ]
                        ],
                        [
                            'label' => 'Modelo Info Plataforma',
                            'icon' => 'tachometer-alt',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['/modelo-info-plataforma/index'], 'iconStyle' => 'far'],
                            ]
                        ],
                        ['label' => 'Trasmision', 'url' => ['/transmision/index'], 'iconStyle' => 'far'],
                        [
                            'label' => 'Clientes',
                            'icon' => 'tachometer-alt',
                            'items' => [
                                ['label' => 'Listar', 'url' => ['/clientes/index'], 'iconStyle' => 'far'],
                            ]
                        ], */
                    ]
                ]);
                ?>

            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>