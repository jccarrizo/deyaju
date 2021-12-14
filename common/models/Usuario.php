<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id_usuario
 * @property int $id_user
 * @property string $fecha_nacimiento
 * @property string $genero
 *
 * @property FichasCompra[] $fichasCompras
 * @property FichasGasto[] $fichasGastos
 * @property User $user
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'fecha_nacimiento', 'genero'], 'required'],
            [['id_user'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['genero'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            ['fecha_nacimiento', 'compareDates'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_user' => 'Usuario',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'genero' => 'Género',
        ];
    }

    /**
     * Gets query for [[FichasCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFichasCompras()
    {
        return $this->hasMany(FichasCompra::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * Gets query for [[FichasGastos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFichasGastos()
    {
        return $this->hasMany(FichasGasto::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function compareDates()

    {
        $fecha_nacimiento = strtotime($this->fecha_nacimiento);

        $fecha_hoy = date("Y-m-d");

        $fecha = strtotime($fecha_hoy . "- 18 years");

        if (!$this->hasErrors() && $fecha_nacimiento >= $fecha) {

            $this->addError('fecha_nacimiento', 'Debes ser mayor de edad');
        }
    }
}
