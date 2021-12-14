<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "precio_actual".
 *
 * @property int $id
 * @property int $id_producto
 * @property float $precio
 * @property string $created_at
 * @property string $update_at
 *
 * @property Productos $producto
 */
class PrecioActual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'precio_actual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'precio'], 'required'],
            [['id_producto'], 'integer'],
            [['precio'], 'number'],
            [['created_at', 'update_at'], 'safe'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_producto' => 'Id Producto',
            'precio' => 'Precio',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'id_producto']);
    }
}
