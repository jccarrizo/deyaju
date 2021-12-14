<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "devoluciones".
 *
 * @property int $id
 * @property int $id_producto
 * @property int $qty
 * @property string $motivo
 * @property string $fecha
 * @property int $fuera_inventario
 *
 * @property Productos $producto
 */
class devoluciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'devoluciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'qty', 'motivo', 'fuera_inventario'], 'required'],
            [['id_producto', 'qty', 'fuera_inventario'], 'integer'],
            [['motivo'], 'string'],
            [['fecha'], 'safe'],
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
            'qty' => 'Cantidad',
            'motivo' => 'Motivo',
            'fecha' => 'Fecha',
            'fuera_inventario' => 'Fuera Inventario',
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
