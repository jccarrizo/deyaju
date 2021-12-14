<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $sobre_nombre
 * @property float $precio
 * @property float $precio_mayor
 * @property int $medida_id
 * @property float $medida_valor
 * @property int $id_marca
 * @property string $created_at
 * @property string $update_at
 *
 * @property Marcas $marca
 * @property Medidas $medida
 * @property Stock[] $stocks
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'precio_mayor', 'medida_id', 'medida_valor', 'id_marca'], 'required'],
            [['precio', 'precio_mayor', 'medida_valor'], 'number'],
            [['medida_id', 'id_marca'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['nombre'], 'string', 'max' => 150],
            [['sobre_nombre'], 'string', 'max' => 255],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marcas::className(), 'targetAttribute' => ['id_marca' => 'id']],
            [['medida_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medidas::className(), 'targetAttribute' => ['medida_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sobre_nombre' => 'Sobre Nombre',
            'precio' => 'Precio',
            'precio_mayor' => 'Precio Mayor',
            'medida_id' => 'Medida ID',
            'medida_valor' => 'Medida Valor',
            'id_marca' => 'Id Marca',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marcas::className(), ['id' => 'id_marca']);
    }

    /**
     * Gets query for [[Medida]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedida()
    {
        return $this->hasOne(Medidas::className(), ['id' => 'medida_id']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['id_producto' => 'id']);
    }
}
