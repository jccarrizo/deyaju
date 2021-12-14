<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $id
 * @property int $id_cliente
 * @property int $id_producto
 * @property int $id_user
 * @property float $cantidad
 * @property float $valor_real
 * @property float $valor_venta
 * @property float $valor_unidad
 * @property string $observacion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Productos $producto
 * @property Clientes $cliente
 * @property User $user
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_producto', 'id_user', 'cantidad', 'valor_real', 'valor_venta', 'valor_unidad'], 'required'],
            [['id_cliente', 'id_producto', 'id_user'], 'integer'],
            [['cantidad', 'valor_real', 'valor_venta', 'valor_unidad'], 'number'],
            [['observacion'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['id_cliente' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cliente' => 'Id Cliente',
            'id_producto' => 'Id Producto',
            'id_user' => 'Id User',
            'cantidad' => 'Cantidad',
            'valor_real' => 'Valor Real',
            'valor_venta' => 'Valor Venta',
            'valor_unidad' => 'Valor Unidad',
            'observacion' => 'Observación',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'id_cliente']);
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
}
