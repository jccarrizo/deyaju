<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "medidas".
 *
 * @property int $id
 * @property string $medida
 * @property string $descripcion
 * @property string $simbolo
 */
class Medidas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medidas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['medida', 'descripcion', 'simbolo'], 'required'],
            [['descripcion'], 'string'],
            [['medida', 'simbolo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'medida' => 'Medida',
            'descripcion' => 'Descripcion',
            'simbolo' => 'Simbolo',
        ];
    }
}
