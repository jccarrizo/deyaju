<?php

use hail812\adminlte3\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        <!-- <img src="<?= "" //$assetDir 
?>/img/faviconwhite.png" alt="WLogo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <?= Html::img('@web/logo.png', ['alt' => 'logo', 'class' => 'brand-image img-circle elevation-3', 'style' => "opacity: .8"]) ?>
        <span class="brand-text font-weight-light">Administración</span>
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

            <?=
            Menu::widget([
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'url' => ['/modelo/dashboard'],
                        'icon' => 'home',
                        'visible' => Yii::$app->user->can('Modelo')
                    ],
                    [
                        'label' => 'Dashboard',
                        'url' => ['/site/index'],
                        'icon' => 'home',
                        'visible' => Yii::$app->user->can('Administrador')
                    ],
                    [
                        'label' => 'Registrar usuario',
                        'url' => ['/admin/user/signup-model'],
                        'icon' => 'plus',
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'admin/user/signup-model',
                                    'modelo-info-personal/create',
                                    'modelo-info-plataforma/create',
                                ]
                        )
                    ],
                    /*                     [
                      'label' => 'Starter Pages',
                      'icon' => 'tachometer-alt',
                      'badge' => '<span class="right badge badge-info">2</span>',
                      'items' => [
                      ['label' => 'Active Page', 'url' => ['/site/index'], 'iconStyle' => 'far'],
                      ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                      ]
                      ], */

                    /*                     [
                      'label' => 'Modals Example',
                      'url' => ['/modals/index'],
                      'iconStyle' => 'far'
                      ], */
                    // [
                    //     'label' => 'Modelos',
                    //     'url' => ['/modelo-info-personal/index'],
                    //     'icon' => 'users',
                    //     'visible' => Yii::$app->user->can('Administrador'),
                    //     'active' => in_array(
                    //         $this->context->route,
                    //         [
                    //             'modelo-info-personal/index',
                    //             'modelo/view',
                    //             'modelo-info-personal/update',
                    //             'modelo-info-plataforma/update',
                    //         ]
                    //     )
                    // ],
                    [
                        'label' => 'Contenido',
                        'icon' => 'users',
                        'visible' => Yii::$app->user->can('Modelo'),
                        'items' => [
                            [
                                'label' => 'Foto Perfil',
                                'url' => ['/modelo-imagen-perfil/dashboard'],
                                'iconStyle' => 'far',
                                'active' => in_array(
                                        $this->context->route,
                                        [
                                            'modelo-imagen-perfil/index',
                                            'modelo-imagen-perfil/create',
                                            'modelo-imagen-perfil/update',
                                            'modelo-imagen-perfil/dashboard',
                                        ]
                                ),
                            ],
                            [
                                'label' => 'Contenido Gratuito',
                                'url' => ['/modelo-galeria/view-galeria'],
                                'iconStyle' => 'far',
                                'active' => in_array(
                                        $this->context->route,
                                        [
                                            'modelo-galeria/create',
                                            'modelo-galeria/update',
                                            'modelo-galeria/view-galeria',
                                            'modelo-galeria/index',
                                        ]
                                ),
                            ],
                            [
                                'label' => 'Datos de la cuenta',
                                'url' => ['/model-introduction/dashboard'],
                                'iconStyle' => 'far',
                                'active' => in_array(
                                        $this->context->route,
                                        [
                                            'model-introduction/create',
                                            'model-introduction/update',
                                            'model-introduction/view',
                                            'model-introduction/index',
                                            'model-introduction/dashboard',
                                        ]
                                ),
                            ]
                        ]
                    ],
                    /*                     [
                      'label' => 'Info Plataforma Modelo',
                      'icon' => 'chalkboard-teacher',
                      'items' => [
                      ['label' => 'Listar Modelos', 'url' => ['/modelo-info-plataforma/index'], 'iconStyle' => 'far'],
                      ]
                      ], */

                    /*                     [
                      'label' => 'Galerías',
                      'icon' => 'camera',
                      'items' => [
                      ['label' => 'Listar', 'url' => ['/modelo-galeria/index'], 'iconStyle' => 'far'],
                      ]
                      ], */
                    [
                        'label' => 'Ventas',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Lista', 'url' => ['/ventas/index'], 'iconStyle' => 'far'],
                            ['label' => 'Nuevo', 'url' => ['/ventas/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'ventas/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'ventas/view', 'active' => true]
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'ventas/index',
                                    'ventas/create',
                                    'ventas/update',
                                    'ventas/view',
                                ]
                        )
                    ],
                    [
                        'label' => 'Clientes',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Lista', 'url' => ['/clientes/index'], 'iconStyle' => 'far'],
                            ['label' => 'Nuevo', 'url' => ['/clientes/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'clientes/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'clientes/view', 'active' => true]
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'clientes/index',
                                    'clientes/create',
                                    'clientes/update',
                                    'clientes/view',
                                ]
                        )
                    ],
                    [
                        'label' => 'Productos',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Productos', 'url' => ['/productos/index'], 'iconStyle' => 'far'],
                            ['label' => 'Agregar', 'url' => ['/productos/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/view', 'active' => true],
                            ['label' => 'Stock', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/stock', 'active' => true],
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'productos/index',
                                    'productos/create',
                                    'productos/update',
                                    'productos/view',
                                    'productos/stock',
                                ]
                        )
                    ],
                    [
                        'label' => 'Stock',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Historial', 'url' => ['/stock/index'], 'iconStyle' => 'far'],
                            ['label' => 'Nuevo', 'url' => ['/productos/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/view', 'active' => true],
                            ['label' => 'Stock', 'iconStyle' => 'far', 'visible' => $this->context->route == 'productos/stock', 'active' => true],
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'stock/index',
                                    'stock/create',
                                    'stock/update',
                                    'stock/view',
                                    'stock/stock',
                                ]
                        )
                    ],
                    [
                        'label' => 'Devoluciones',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Historial', 'url' => ['/devoluciones/index'], 'iconStyle' => 'far'],
                            ['label' => 'Nuevo', 'url' => ['/devoluciones/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'devoluciones/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'devoluciones/view', 'active' => true]
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'devoluciones/index',
                                    'devoluciones/create',
                                    'devoluciones/update',
                                    'devoluciones/view',
                                ]
                        )
                    ],
                    [
                        'label' => 'Marcas',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Lista', 'url' => ['/marcas/index'], 'iconStyle' => 'far'],
                            ['label' => 'Agregar', 'url' => ['/marcas/create'], 'iconStyle' => 'far'],
                            ['label' => 'Actualizar', 'iconStyle' => 'far', 'visible' => $this->context->route == 'marcas/update', 'active' => true],
                            ['label' => 'Detalles', 'iconStyle' => 'far', 'visible' => $this->context->route == 'marcas/view', 'active' => true],
                        ],
                        'visible' => Yii::$app->user->can('Administrador'),
                        'active' => in_array(
                                $this->context->route,
                                [
                                    'marcas/index',
                                    'marcas/create',
                                    'marcas/update',
                                    'marcas/view',
                                ]
                        )
                    ],
                    [
                        'label' => 'Unidades de medida',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Agregar', 'url' => ['/medidas/create'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('Administrador')
                    ],
                    [
                        'label' => 'Roles y permisos',
                        'icon' => 'users',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Asignaciones', 'url' => ['/admin/assignment/index'], 'iconStyle' => 'far'],
                            ['label' => 'Rutas', 'url' => ['/admin/route/index'], 'iconStyle' => 'far'],
                            ['label' => 'Permisos', 'url' => ['/admin/permission/index'], 'iconStyle' => 'far'],
                            /*  ['label' => 'Menús', 'url' => ['/admin/menu/index'], 'iconStyle' => 'far'], */
                            ['label' => 'Roles', 'url' => ['/admin/role/index'], 'iconStyle' => 'far'],
                            ['label' => 'Usuarios', 'url' => ['/admin/user/index'], 'iconStyle' => 'far'],
                        ],
                        'visible' => Yii::$app->user->can('Administrador')
                    ],
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>