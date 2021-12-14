<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string|null $identificacion
 * @property string $nombre
 * @property string $alias
 * @property string|null $direccion
 * @property string|null $observacion
 *
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'alias'], 'required'],
            [['direccion', 'observacion'], 'string'],
            [['identificacion', 'nombre', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identificacion' => 'Identificacion',
            'nombre' => 'Nombre',
            'alias' => 'Alias',
            'direccion' => 'Direccion',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_cliente' => 'id']);
    }
}
