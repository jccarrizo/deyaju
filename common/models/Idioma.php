<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "idioma".
 *
 * @property int $id_idioma
 * @property string $nombre
 *
 * @property ModeloIdioma[] $modeloIdiomas
 */
class Idioma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idioma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_idioma' => 'Id Idioma',
            'nombre' => 'Idioma',
        ];
    }

    /**
     * Gets query for [[ModeloIdiomas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModeloIdiomas()
    {
        return $this->hasMany(ModeloIdioma::className(), ['id_idioma' => 'id_idioma']);
    }
}
