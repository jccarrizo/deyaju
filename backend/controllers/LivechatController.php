<?php

namespace backend\controllers;

use app\models\Mensajes;
use app\models\Chat;
use Yii;
use app\helpers\Core;
use yii\web\NotFoundHttpException;
use common\models\Messages;

use common\models\User;

class LivechatController extends \yii\web\Controller {

    public function actionIndex() {
        $id = Yii::$app->user->identity->id;
        $contactos = \backend\models\mdm\User::find();
        return $this->render('angularchat', [
            'contactos'=>$contactos
        ]);
    }

    public function actionChat($id) {
        $id_chat = $id;
        $id = 0;
        $id = Yii::$app->user->identity->id;
        if($id_chat == $id){
            throw new NotFoundHttpException('¡Esta acción no es posible!');
        }
        
        if ($chat = Messages::find()->where("(from_user_id = $id AND to_user_id = $id_chat) OR (from_user_id = $id_chat AND to_user_id = $id)")->all()) {
            $contacto = User::findOne($id_chat);
            return $this->render('chat', ['chat'=>$chat,'contacto'=>$contacto
            ]);
        }else{
            if($contacto = User::findOne($id_chat)){
                return $this->render('chat', ['chat'=>null,'contacto'=>$contacto]);
            }else{
                throw new NotFoundHttpException('¡El usuario no existe!');
            }
            
        }
    }

    public function actionSendmessage() {
        if (Yii::$app->request->post()) {
            $chat = null;
            $id = Yii::$app->user->identity->id;
            $nombre = Yii::$app->user->identity->username;
            $channel = Yii::$app->request->post('channel');
            $receiver = Yii::$app->request->post('receiver');
            die($channel);
            if ($chat = Chat::find()->where(['id_chat' => $channel])->one()) {
                $cp = $chat->getChatParticipantes()->where(['id_user' => $id])->one();
                print_r($chat);
                $mensaje = new Mensajes();
                $mensaje->id_chat = $channel;
                $mensaje->id_chat_part = $cp->id;
                $mensaje->mensaje = Yii::$app->request->post('message');
                $mensaje->save(false);
                die('Actualizando...');
            } else {
                $chat = new Chat();
                //die($chat);
                $channel = 'channel_' . $id . '_' . $receiver;
                $chat_id = 'chat_' . $id . '_' . $receiver;
                $chat->id_user_creador = $id;
                $chat->id_chat = $chat_id;
                $chat->channel = $channel;
                if ($chat->save(false)) {
                    $chatP1 = new \app\models\ChatParticipantes();
                    $chatP1->id_chat = $chat->id;
                    $chatP1->id_user = $id;
                    $chatP2 = new \app\models\ChatParticipantes();
                    $chatP2->id_chat = $chat->id;
                    $chatP2->id_user = $receiver;
                    $chatP1->save(false);
                    $chatP2->save(false);
                    $mensaje = new Mensajes();
                    $mensaje->id_chat = $chat_id;
                    $mensaje->id_chat_part = $chatP1->id;
                    $mensaje->mensaje = Yii::$app->request->post('message');
                    $mensaje->save(false);
                }
            }
            $mensaje = Yii::$app->request->post('mensaje');

//            $chat->user = Yii::$app->user->id;
//            $chat->teks = $teks;
//            $chat->save();
            return;
            return Yii::$app->redis->executeCommand('PUBLISH', [
                        'channel' => $channel,
                        'message' => Json::encode(['mensaje' => $mensaje, 'session' => $id, 'user' => $nombre])
            ]);
        }
    }

}
