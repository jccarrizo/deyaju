<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FichasGasto;

/**
 * FichasGastoSearch represents the model behind the search form of `app\models\FichasGasto`.
 */
class FichasGastoSearch extends FichasGasto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ficha_gasto', 'id_usuario', 'id_modelo_servicio', 'cantidad'], 'integer'],
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
        $id_user = $params['id'];
        $query = FichasGasto::find();
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->where(['id_usuario'=>$id_user]);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_ficha_gasto' => $this->id_ficha_gasto,
            'id_usuario' => $this->id_usuario,
            'id_modelo_servicio' => $this->id_modelo_servicio,
            'cantidad' => $this->cantidad,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
