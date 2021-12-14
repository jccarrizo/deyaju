<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $channel
 * @property int $from_user_id
 * @property int $to_user_id
 * @property string $mensaje
 * @property int $channel_type
 * @property string|null $fecha
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel', 'from_user_id', 'to_user_id', 'mensaje', 'channel_type'], 'required'],
            [['from_user_id', 'to_user_id', 'channel_type'], 'integer'],
            [['mensaje'], 'string'],
            [['fecha'], 'safe'],
            [['channel'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel' => 'Channel',
            'from_user_id' => 'From User ID',
            'to_user_id' => 'To User ID',
            'mensaje' => 'Mensaje',
            'channel_type' => 'Channel Type',
            'fecha' => 'Fecha',
        ];
    }
}
