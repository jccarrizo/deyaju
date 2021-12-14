<?php

namespace frontend\controllers;

use common\helpers\Core;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Messages;
use common\models\ModelIntroduction;
use common\models\ModeloGaleria;
use common\models\ModeloImagenPerfil;
use common\models\ModeloInfoPlataforma;
use common\models\Transmision as ModelsTransmision;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Url;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = User::find()->where(['status' => 10])->all();
        

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        //$this->layout = '../layouts_lte3/main';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
            //renderAjax
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success-swaltoast', 'Gracias por contactarnos. Nosotros responderemos a la mayor brevedad posible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        //die(print_r(Yii::$app->request->post()));
        $modelUsuario = new \common\models\Usuario();
        $generos = [
            '' => 'Seleccione',
            'hombre' => 'Hombre',
            'mujer' => 'Mujer',
            'trans' => 'Trans',
            'otro' => 'Otro',
        ];
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success-swaltoast', 'Gracias por registrarte. Por favor revisa tu bandeja de entrada para ver el correo electrónico de verificación.');
            return $this->goHome();
        }
        $modelUsuario->addErrors($model->getErrors());
        return $this->render('signup', [
            'model' => $model,
            'modelUsuario' => $modelUsuario,
            'generos' => $generos
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success-swaltoast', 'Revisa tu correo electrónico para obtener más instrucciones.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error-swaltoast', 'Lo sentimos, no podemos restablecer la contraseña de la dirección de correo electrónico proporcionada.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success-swaltoast', 'Nueva contraseña guardada con éxito.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success-swaltoast', '¡Tu correo ha sido confirmado!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Lo sentimos, no podemos verificar tu cuenta con el token proporcionado.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success-swaltoast', '
                Revisa tu correo electrónico para obtener más instrucciones.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Lo sentimos, no podemos reenviar el correo electrónico de verificación para la dirección de correo electrónico proporcionada.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionTransmision($id)
    {
        $setPort = false;
        //        $angularConfig = array(
        //            'host' => \Yii::$app->angularSockets->host,
        //            'port' => \Yii::$app->angularSockets->port
        //        );
        if ($setPort) {
            $angularConfig = \Yii::$app->angularSockets->host . ":" . \Yii::$app->angularSockets->port;
        } else {
            $angularConfig = \Yii::$app->angularSockets->host;
        }

        $model = ModelsTransmision::find()->where(['id_modelo_transmision' => $id])->one();
        $mensajes = null;
        $channel = 'public_message0_' . $id;

        if (!$modelo_info = ModeloInfoPlataforma::find()->where(['id_modelo_plataforma' => $id])->one()) {
        }
        if ($mensajes = Messages::find()->where(['channel' => $channel])->orderBy(['id' => SORT_DESC])->limit(100)->all()) {
        }
        if (!$model) {
            return $this->redirect(['index']);
        }
        $fromUserId = 0;
        $username = 'anonymous';
        if (!Yii::$app->user->isGuest) {
            $fromUserId = Yii::$app->user->identity->id;
            $username = Yii::$app->user->identity->username;
        }
        $urlLogin = Url::toRoute(['site/login']);
        $message = array();
        $toUserId = 0;
        $toUserId = Yii::$app->request->get()['id'];
        $arrChannel = array(
            0, $toUserId
        );
        sort($arrChannel);
        $channel_type = 2; //canal publico
        $meses = ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'May.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Nov.', 'Dic.'];
        $contacto_username = $modelo_info->nickname;
        return $this->render('transmision', [
            'model' => $model,
            'chat' => $mensajes,
            'modelo_info' => $modelo_info,
            'angularConfig' => $angularConfig,
            'galleries_free' => $this->getOrderImages($id),
            'galleries_premium' => $this->getOrderImagesPremium($id),
            'galleries_count_free' => $this->getQuantityImages($id),
            'galleries_count_perfil' => $this->getQuantityImagesPerfil($id),
            'galleries_count_premium' => $this->getQuantityImagesPremium($id),
            'galleries_residue_free' => $this->getResidueQuantityImages($id),
            'galleries_residue_perfil' => $this->getResidueQuantityImagesPerfil($id),
            'galleries_residue_premium' => $this->getResidueQuantityImagesPremium($id),
            'image_profile' => $this->getImageProfile($id),
            'image_profile_circle' => $this->getImageProfileCircle($id),
            'model_introduction' => $this->getModelIntroduction($id),
            'fromUserId' => $fromUserId,
            'username' => $username,
            'urlLogin' => $urlLogin,
            'message' => $message,
            'toUserId' => $toUserId,
            'arrChannel' => $arrChannel,
            'meses' => $meses,
            'channel_type' => $channel_type,
        ]);
    }

    private function getModelIntroduction($id)
    {
        $model_introduction = ModelIntroduction::find()->where(['id_model_platform' => $id])->one();
        return $model_introduction;
    }

    private function getImageProfile($id)
    {
        $image_profile = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'type_Access' => 0, 'orientacion' => 0])->one();
        return $image_profile;
    }

    private function getImageProfileCircle($id)
    {
        $image_profile_circle = ModeloImagenPerfil::find()->where(['id_modelo_info_plataforma' => $id, 'estado_foto' => 1])->one();
        return $image_profile_circle;
    }

    private function getQuantityImages($id)
    {
        $galleries_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'type_Access' => 0])->count();
        $galleries_count = round($galleries_count / 4);;
        if ($galleries_count == 0) {
            return $galleries_count = 1;
        }
        return $galleries_count;
    }

    private function getQuantityImagesPerfil($id)
    {
        $galleries_count_perfil = ModeloImagenPerfil::find()->where(['id_modelo_info_plataforma' => $id])->count();
        $galleries_count_perfil = round($galleries_count_perfil / 4);;
        if ($galleries_count_perfil == 0) {
            return $galleries_count_perfil = 1;
        }
        return $galleries_count_perfil;
    }

    private function getQuantityImagesPremium($id)
    {
        $galleries_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'type_Access' => 1])->count();
        $galleries_count = round($galleries_count / 4);;
        if ($galleries_count == 0) {
            return $galleries_count = 1;
        }
        return $galleries_count;
    }

    private function getResidueQuantityImages($id)
    {
        $galleries_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'type_Access' => 0])->count();
        if ($galleries_count < 4) {
            $galleries_count = 4;
        }
        $galleries_count_div = round($galleries_count / 4);
        $galleries_residue_free = $galleries_count % $galleries_count_div;
        return $galleries_residue_free;
    }

    private function getResidueQuantityImagesPerfil($id)
    {
        $galleries_count = ModeloImagenPerfil::find()->where(['id_modelo_info_plataforma' => $id])->count();
        if ($galleries_count < 4) {
            $galleries_count = 4;
        }
        $galleries_count_div = round($galleries_count / 4);
        $galleries_residue_perfil = $galleries_count % $galleries_count_div;
        return $galleries_residue_perfil;
    }

    private function getResidueQuantityImagesPremium($id)
    {
        $galleries_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'type_Access' => 1])->count();
        if ($galleries_count < 4) {
            $galleries_count = 4;
        }
        $galleries_count_div = round($galleries_count / 4);
        $galleries_residue_premium = $galleries_count % $galleries_count_div;
        return $galleries_residue_premium;
    }

    private function getOrderImages($id)
    {
        $j = 0;
        $array = [];
        $galleries_vertical_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 1, 'type_Access' => 0])->count();
        $galleries_horizontal_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 0, 'type_Access' => 0])->count();
        $galleries_vertical = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 1, 'type_Access' => 0])->all();
        $galleries_horizontal = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 0, 'type_Access' => 0])->all();

        if ($galleries_vertical_count > $galleries_horizontal_count) {
            foreach ($galleries_vertical as $gallery_vertical) {
                $array[] = [
                    'adjunto_galeria' => $gallery_vertical->adjunto_galeria,
                    'orientacion' => $gallery_vertical->orientacion,
                ];

                while ($j < $galleries_horizontal_count) {
                    $array[] = [
                        'adjunto_galeria' => $galleries_horizontal[$j]->adjunto_galeria,
                        'orientacion' => $galleries_horizontal[$j]->orientacion,
                    ];
                    break;
                }
                $j++;
            }
        } else {
            foreach ($galleries_horizontal as $gallery_horizontal) {
                $array[] = [
                    'adjunto_galeria' => $gallery_horizontal->adjunto_galeria,
                    'orientacion' => $gallery_horizontal->orientacion,
                ];

                while ($j < $galleries_vertical_count) {
                    $array[] = [
                        'adjunto_galeria' => $galleries_vertical[$j]->adjunto_galeria,
                        'orientacion' => $galleries_vertical[$j]->orientacion,
                    ];
                    break;
                }
                $j++;
            }
        }
        return $array;
    }

    private function getOrderImagesPremium($id)
    {
        $j = 0;
        $array = [];
        $galleries_vertical_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 1, 'type_Access' => 1])->count();
        $galleries_horizontal_count = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 0, 'type_Access' => 1])->count();
        $galleries_vertical = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 1, 'type_Access' => 1])->all();
        $galleries_horizontal = ModeloGaleria::find()->where(['id_modelo_plataforma' => $id, 'orientacion' => 0, 'type_Access' => 1])->all();

        if ($galleries_vertical_count > $galleries_horizontal_count) {
            foreach ($galleries_vertical as $gallery_vertical) {
                $array[] = [
                    'adjunto_galeria' => $gallery_vertical->adjunto_galeria,
                    'orientacion' => $gallery_vertical->orientacion,
                ];

                while ($j < $galleries_horizontal_count) {
                    $array[] = [
                        'adjunto_galeria' => $galleries_horizontal[$j]->adjunto_galeria,
                        'orientacion' => $galleries_horizontal[$j]->orientacion,
                    ];
                    break;
                }
                $j++;
            }
        } else {
            foreach ($galleries_horizontal as $gallery_horizontal) {
                $array[] = [
                    'adjunto_galeria' => $gallery_horizontal->adjunto_galeria,
                    'orientacion' => $gallery_horizontal->orientacion,
                ];

                while ($j < $galleries_vertical_count) {
                    $array[] = [
                        'adjunto_galeria' => $galleries_vertical[$j]->adjunto_galeria,
                        'orientacion' => $galleries_vertical[$j]->orientacion,
                    ];
                    break;
                }
                $j++;
            }
        }
        return $array;
    }
}
