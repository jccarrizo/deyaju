<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloServicios;

/**
 * ModeloServiciosSearch represents the model behind the search form of `app\models\ModeloServicios`.
 */
class ModeloServiciosSearch extends ModeloServicios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo_servicio', 'id_modelo_plataforma'], 'integer'],
            [['nombre_servicio'], 'safe'],
            [['valor_en_fichas'], 'number'],
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
        $query = ModeloServicios::find();

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
            'id_modelo_servicio' => $this->id_modelo_servicio,
            'id_modelo_plataforma' => $this->id_modelo_plataforma,
            'valor_en_fichas' => $this->valor_en_fichas,
        ]);

        $query->andFilterWhere(['like', 'nombre_servicio', $this->nombre_servicio]);

        return $dataProvider;
    }
}
