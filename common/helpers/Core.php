<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\helpers;

use OpenTok\ArchiveMode;
use OpenTok\MediaMode;
use OpenTok\Role;
use yii;
use yii\web\NotFoundHttpException;
use \yii\web\Request;
use app\models\ModeloGaleriaSearch;
use common\models\ModeloGaleria;
use common\models\ModeloImagenPerfil;
use common\models\Stock;
use common\models\Devoluciones;
/**
 * Description of Core
 *
 * @author Lincep
 */
class Core
{

    public static function getRol()
    {
        $rol = array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0];
        return $rol;
    }

    public static function getRolById($id)
    {
        $rol = '';
        if ($result = Yii::$app->authManager->getRolesByUser($id)) {
            $rol = array_keys($result)[0];
        }

        return $rol;
    }

    public static function getIdUsuario()
    {
        $usuario = Yii::$app->user->identity->usuarios;
        print_r($usuario);
        die();
        return $usuario;
    }

    public static function getBaseUrl()
    {
        $root = Yii::$app->request->baseUrl;
        return $root;
    }

    public static function getBaseUrlBackend()
    {
        $baseUrl = str_replace('frontend/web', 'backend/web', (new Request)->getBaseUrl());
        return $baseUrl;
    }

    public static function getBasePathUrlBackend()
    {
        $baseUrl = str_replace('frontend', 'backend/web', (Yii::$app->basePath));
        return $baseUrl;
    }
    public static function getBaseUrlFrontend()
    {
        $baseUrl = str_replace('backend/web', 'frontend/web', (new Request)->getBaseUrl());
        return $baseUrl;
    }

    public static function getMessageSuccess()
    {
        Yii::$app->session->setFlash('success-swaltoast', Yii::t('app', 'Information satisfactorily modified'));
    }

    public static function getMessageError()
    {
        return Yii::$app->session->setFlash('error-swaltoast', Yii::t('app', 'Error. Try again'));
    }

    public static function getModeloInfoPlataforma()
    {
        if ((Core::getRol() == 'Administrador') || (Core::getRol() == 'Estudio')) {
            $session = Yii::$app->session;
            if ($session->get('admin_modelo')['id'] == null) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            $modelo = $session->get('admin_modelo')['id'];
            return $modelo;
        }
        $modelo = Yii::$app->user->identity->modeloInfoPlataformas[0]->id_modelo_plataforma;
        return $modelo;
    }

    public static function getModeloInfoPlataformaModelo()
    {
        if ((Core::getRol() == 'Modelo') || (Core::getRol() == 'Estudio')) {
            $session = Yii::$app->session;
            if ($session->get('admin_modelo')['id'] == null) {
                throw new NotFoundHttpException('la pagina no exxxxxiiiste.');
            }
            $modelo = $session->get('admin_modelo')['id'];
            return $modelo;
        }
        $modelo = Yii::$app->user->identity->modeloInfoPlataformas[0]->id_modelo_plataforma;
        return $modelo;
    }

    public static function getStock($id){
        $total = null;
        $devoluciones = null;
        if( ($stocks = Stock::find()->where(['id_producto'=>$id])->all()) ){
            foreach ($stocks as $stock){
                $total += $stock->cantidad;
            }
        }
        if( ($devoluciones = Devoluciones::find()->where(["id_producto"=>$id,"fuera_inventario"=>1])->all()) ){
            foreach ($devoluciones as $devolucion){
                $total -= $devolucion->qty;
            }
        }
        return $total;
    }

    

    static function getSizeImage($model)
    {

        $file = Core::getBasePathUrlBackend() . '/web' . $model->adjunto_galeria;
        $imagen = getimagesize($file);    //Sacamos la información
        $ancho = $imagen[0];              //Ancho
        $alto = $imagen[1];               //Alto

        if ($ancho >= $alto) {
            return 0;
        }
        return 1;
    }

    

    
}
