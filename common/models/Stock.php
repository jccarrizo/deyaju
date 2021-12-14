<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property int $id_producto
 * @property float $precio
 * @property float $precio_mayor
 * @property int $cantidad
 * @property string $created_at
 * @property string $update_at
 *
 * @property Productos $producto
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'precio', 'precio_mayor', 'cantidad'], 'required'],
            [['id_producto', 'cantidad'], 'integer'],
            [['precio', 'precio_mayor'], 'number'],
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
            'precio_mayor' => 'Precio Mayor',
            'cantidad' => 'Cantidad',
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
