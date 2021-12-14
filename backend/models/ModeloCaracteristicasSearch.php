<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloCaracteristicas;

/**
 * ModeloCaracteristicasSearch represents the model behind the search form of `app\models\ModeloCaracteristicas`.
 */
class ModeloCaracteristicasSearch extends ModeloCaracteristicas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo_caracteristicas', 'id_modelo_plataforma'], 'integer'],
            [['region', 'color_piel', 'color_ojos', 'color_cabello', 'tipo_cabello', 'tipo_cuerpo'], 'safe'],
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
        $query = ModeloCaracteristicas::find();

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
            'id_modelo_caracteristicas' => $this->id_modelo_caracteristicas,
            'id_modelo_plataforma' => $this->id_modelo_plataforma,
        ]);

        $query->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'color_piel', $this->color_piel])
            ->andFilterWhere(['like', 'color_ojos', $this->color_ojos])
            ->andFilterWhere(['like', 'color_cabello', $this->color_cabello])
            ->andFilterWhere(['like', 'tipo_cabello', $this->tipo_cabello])
            ->andFilterWhere(['like', 'tipo_cuerpo', $this->tipo_cuerpo]);

        return $dataProvider;
    }
}
