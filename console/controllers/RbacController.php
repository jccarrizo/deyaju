<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
       
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        $create = $auth->createPermission('createPost');
        $create->description = 'Crear Post';
        $auth->add($create);
        
        $update = $auth->createPermission('updatePost');
        $update->description = 'Actualizar Post';
        $auth->add($update);
        
        $delete = $auth->createPermission('deletePost');
        $delete->description = 'Eliminar Post';
        $auth->add($delete);
        
        $view = $auth->createPermission('viewPost');
        $view->description = 'Ver Post';
        $auth->add($view);
        
        
        $Usuario = $auth->createRole('Usuario');
        $auth->add($Usuario);
        
        $auth->addChild($Usuario, $create);
        
        $Administrador = $auth->createRole('Administrador');
        $auth->add($Administrador);
        $auth->addChild($Administrador, $create);
        $auth->addChild($Administrador, $update);
        $auth->addChild($Administrador, $delete);
        $auth->addChild($Administrador, $view);
        $auth->addChild($Administrador, $Usuario);
        
        $auth->assign($Usuario, 2);
        $auth->assign($Administrador, 1);
    }
}