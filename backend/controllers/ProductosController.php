<?php

namespace backend\controllers;

use Yii;
use common\models\Productos;
use common\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Marcas;
use common\models\ProductoCompras;
use common\models\Medidas;
use common\models\Stock;
/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();
        $marcas = new Marcas();
        $marcas_list = Marcas::find()->select("id,nombre")->asArray()->all();
        
        $medidas = new Medidas();
        $medidas_list = Medidas::find()->all();
        if (($post = Yii::$app->request->post())) {
            $medida_id = $post['Medidas']['id'];
            $id_marca = $post['Marcas']['id'];
            
            
            $post['Productos']['medida_id'] = $medida_id;
            $post['Productos']['id_marca'] = $id_marca;
            $transaction = Yii::$app->db->beginTransaction();
            $success = false;
            if ($model->load($post) && $model->save(false)) {
                $id = $model->id;
                $success = true;
                $post['producto_compras']['id_producto'] = $id;
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                $transaction->rollBack();
            }
            
        }

        return $this->render('create', [
            'model' => $model,'marcas'=>$marcas,
            'marcas_list'=>$marcas_list,
            'medidas'=>$medidas,'medidas_list'=>$medidas_list
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $marcas = $model->getMarca()->one();
        $marcas_list = Marcas::find()->select("id,nombre")->asArray()->all();
        
        $medidas = $model->getMedida()->one();
        $medidas_list = Medidas::find()->all();
        return $this->render('update', [
            'model' => $model,'marcas'=>$marcas,
            'marcas_list'=>$marcas_list,
            'medidas'=>$medidas,'medidas_list'=>$medidas_list
        ]);
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionStock($id){
        $model = $this->findModel($id);
        $stock = new Stock();
        if ( ($post = Yii::$app->request->post()) ) {
            $model_stock = new Stock();
            $post['Stock']['id_producto'] = $post['Productos']['id'];
            $post['Productos']['precio'] = $post['Stock']['precio'];
            $post['Productos']['precio_mayor'] = $post['Stock']['precio_mayor'];
            
            if($model_stock->load($post) && $model_stock->save(false) && $model->load($post) && $model->save(false)){
                return $this->redirect(['view', 'id' => $post['Productos']['id']]);
            }
            
            
        }
        
        
        return $this->render('stock', [
            'model' => $model,'stock'=>$stock
        ]);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
