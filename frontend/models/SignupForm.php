<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Usuario;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $reCaptcha;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password_repeat', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [
                ['reCaptcha'], ReCaptchaValidator2::className(),
                'secret' => '6LcKBowaAAAAAEjUt4kYg-onKlxwM5uWErkl3Gtm',
                'uncheckedMessage' => 'Por favor confirma que no eres un robot.'
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $transaction = $user->getDb()->beginTransaction();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('Cliente');
        if ($user->save() && $this->sendEmail($user)) {
            $auth->assign($authorRole, $user->getId());
            $id_user = $user->id;
            $usuario = new \common\models\Usuario();
            $usuario->id_user = $id_user;
            if ($usuario->load(Yii::$app->request->post()) && $usuario->save(false)) {
                if (!$usuario->validate()) {
                    foreach ($usuario->getErrors() as $key => $errs) {
                        foreach ($errs as $err) {
                            $this->addError($key, $err);
                        }
                    }
                    $transaction->rollBack();
                    return null;
                }

                $transaction->commit();
                return true;
            }
            $transaction->rollBack();
            return null;
        }
        $transaction->rollBack();
        return null;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmar contraseña',
        ];
    }
}
