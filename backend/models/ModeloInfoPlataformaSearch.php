<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloInfoPlataforma;

/**
 * ModeloInfoPlataformaSearch represents the model behind the search form of `app\models\ModeloInfoPlataforma`.
 */
class ModeloInfoPlataformaSearch extends ModeloInfoPlataforma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo_plataforma', 'id_modelo', 'edad', 'tipo_cuenta', 'estado'], 'integer'],
            [['nickname', 'genero', 'pais_origen', 'descripcion'], 'safe'],
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
        $query = ModeloInfoPlataforma::find();

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
            'id_modelo_plataforma' => $this->id_modelo_plataforma,
            'id_modelo' => $this->id_modelo,
            'edad' => $this->edad,
            'tipo_cuenta' => $this->tipo_cuenta,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'pais_origen', $this->pais_origen])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
