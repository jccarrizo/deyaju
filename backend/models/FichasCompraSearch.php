<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FichasCompra;

/**
 * FichasCompraSearch represents the model behind the search form of `app\models\FichasCompra`.
 */
class FichasCompraSearch extends FichasCompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ficha_compra', 'id_usuario', 'id_plan', 'estado'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = FichasCompra::find();

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
            'id_ficha_compra' => $this->id_ficha_compra,
            'id_usuario' => $this->id_usuario,
            'id_plan' => $this->id_plan,
            'fecha' => $this->fecha,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
