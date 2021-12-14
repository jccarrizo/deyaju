<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fichas".
 *
 * @property int $id
 * @property int $id_user
 * @property int $cantidad
 * @property string $origen_fichas
 * @property string $origen_ficha_user
 * @property string $createa_at
 * @property string $update_at
 *
 * @property User $user
 */
class Fichas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'cantidad', 'origen_fichas', 'origen_ficha_user'], 'required'],
            [['id_user', 'cantidad', 'origen_ficha_user'], 'integer'],
            [['createa_at', 'update_at'], 'safe'],
            [['origen_fichas'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'cantidad' => 'Cantidad',
            'origen_fichas' => 'Origen Fichas',
            'origen_ficha_user' => 'Origen Ficha User',
            'createa_at' => 'Createa At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'id_user']);
    }
}
