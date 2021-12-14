<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloGaleria;

/**
 * ModeloGaleriaSearch represents the model behind the search form of `app\models\ModeloGaleria`.
 */
class ModeloGaleriaSearch extends ModeloGaleria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo_galeria', 'id_modelo_plataforma'], 'integer'],
            [['adjunto_galeria'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ModeloGaleria::find()->where(['id_modelo_plataforma'=>$params['id']]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_modelo_galeria' => $this->id_modelo_galeria,
            'id_modelo_plataforma' => $this->id_modelo_plataforma,
        ]);

        $query->andFilterWhere(['like', 'adjunto_galeria', $this->adjunto_galeria]);

        return $dataProvider;
    }
}
