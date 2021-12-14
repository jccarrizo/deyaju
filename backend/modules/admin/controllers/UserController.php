<?php

namespace backend\modules\admin\controllers;

use common\helpers\Core;
use mdm\admin\components\UserStatus;
use mdm\admin\models\form\ChangePassword;
use mdm\admin\models\form\Login;
use mdm\admin\models\form\PasswordResetRequest;
use mdm\admin\models\form\ResetPassword;
//use mdm\admin\models\form\Signup;
use backend\models\mdm\form\Signup;
use mdm\admin\models\searchs\User as UserSearch;
use mdm\admin\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\base\UserException;
use yii\filters\VerbFilter;
use yii\mail\BaseMailer;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\modules\admin\components\Configs;
use common\models\ModeloInfoPersonal;
use mdm\admin\models\Assignment;

/**
 * User controller
 */
class UserController extends Controller
{
    private $_oldMailPath;
    public $verification_token;
    //public $layout=true;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'logout' => ['post'],
                    'activate' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->has('mailer') && ($mailer = Yii::$app->getMailer()) instanceof BaseMailer) {
                /* @var $mailer BaseMailer */
                $this->_oldMailPath = $mailer->getViewPath();
                $mailer->setViewPath('@mdm/admin/mail');
            }
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function afterAction($action, $result)
    {
        if ($this->_oldMailPath !== null) {
            Yii::$app->getMailer()->setViewPath($this->_oldMailPath);
        }
        return parent::afterAction($action, $result);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Login
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            $rol = Core::getRol();
            if ($rol == 'Modelo') {
                return $this->redirect(['/modelo/dashboard']);
            }
            return $this->goBack();
        } else {
            //$this->layout = false;
            return $this->renderAjax('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * Signup new user
     * @return string
     */
    public function actionSignup()
    {
        $this->generateEmailVerificationToken();
        //die($this->verification_token);
        $model = new Signup();
        $model->verification_token = $this->verification_token;
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->user->login($user)) {
                    Yii::$app->session->set('id', $user->id);
                    Yii::$app->session->setFlash('success-swaltoast', "Información almacenada satisfactoriamente");
                    return $this->redirect(['rol']);
                }
            }
        }

        return $this->renderAjax('signup', [
            'model' => $model,
        ]);
    }

    public function actionSignupModel()
    {
        $this->generateEmailVerificationToken();
        //die($this->verification_token);
        $model = new Signup();
        $model->verification_token = $this->verification_token;
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signupModel()) {
                Yii::$app->session->set('id_user', $user->id);
                return $this->redirect(['/modelo-info-personal/create']);
            }
        }

        return $this->render('signup-model', [
            'model' => $model,
        ]);
    }
    public function generateEmailVerificationToken()
    {

        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Request reset password
     * @return string
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success-swaltoast', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        $assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
        return $this->renderAjax('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success-swaltoast', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Activate new user
     * @param integer $id
     * @return type
     * @throws UserException
     * @throws NotFoundHttpException
     */
    public function actionActivate($id)
    {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == UserStatus::INACTIVE) {
            $user->status = UserStatus::ACTIVE;
            if ($user->save()) {
                return $this->goHome();
            } else {
                $errors = $user->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->goHome();
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRol()
    {
        return $this->renderAjax('rol');
    }

    public function actionAssignrol($name)
    {
        $id = Yii::$app->session->get('id');
        $rol = Core::getRolById($id);
        $personal = new ModeloInfoPersonal();
        if ($rol) {
            $model = new Assignment($id);
            $manager = Configs::authManager();
            $item = $manager->getRole($rol);
            $item = $item ?: $manager->getPermission($rol);
            $model->revoke($item, $id);
            $this->assignRol($id, $name);
            return $this->renderAjax('//modelo-info-personal/create', ['model' => $personal]);
        } else {
            $this->assignRol($id, $name);
            return $this->renderAjax('//modelo-info-personal/create', ['model' => $personal]);
        }
    }

    private function assignRol($id, $name)
    {
        $model = new Assignment($id);
        $manager = Configs::authManager();
        $item = $manager->getRole($name);
        $item = $item ?: $manager->getPermission($name);
        $model->assign($item, $id);
    }
}
