<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fichas_gasto".
 *
 * @property int $id_ficha_gasto
 * @property int $id_usuario
 * @property int $id_modelo_servicio
 * @property int $cantidad
 * @property string $fecha
 *
 * @property ModeloServicios $modeloServicio
 * @property User $usuario
 */
class FichasGasto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichas_gasto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_modelo_servicio', 'cantidad', 'fecha'], 'required'],
            [['id_usuario', 'id_modelo_servicio', 'cantidad'], 'integer'],
            [['fecha'], 'safe'],
            [['id_modelo_servicio'], 'exist', 'skipOnError' => true, 'targetClass' => ModeloServicios::className(), 'targetAttribute' => ['id_modelo_servicio' => 'id_modelo_servicio']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ficha_gasto' => 'Id Ficha Gasto',
            'id_usuario' => 'Id Usuario',
            'id_modelo_servicio' => 'Id Modelo Servicio',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[ModeloServicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModeloServicio()
    {
        return $this->hasOne(ModeloServicios::className(), ['id_modelo_servicio' => 'id_modelo_servicio']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'id_usuario']);
    }
}
