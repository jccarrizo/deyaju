<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloContrato;

/**
 * ModeloContratoSearch represents the model behind the search form of `app\models\ModeloContrato`.
 */
class ModeloContratoSearch extends ModeloContrato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_contrato', 'id_modelo'], 'integer'],
            [['tipo_contrato', 'disponibilidad_laboral', 'contrato_adjunto'], 'safe'],
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
        $query = ModeloContrato::find();

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
            'id_contrato' => $this->id_contrato,
            'id_modelo' => $this->id_modelo,
        ]);

        $query->andFilterWhere(['like', 'tipo_contrato', $this->tipo_contrato])
            ->andFilterWhere(['like', 'disponibilidad_laboral', $this->disponibilidad_laboral])
            ->andFilterWhere(['like', 'contrato_adjunto', $this->contrato_adjunto]);

        return $dataProvider;
    }
}
