<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Stock;

/**
 * StockSearch represents the model behind the search form of `common\models\Stock`.
 */
class StockSearch extends Stock {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'id_producto', 'cantidad'], 'integer'],
            [['precio', 'precio_mayor'], 'number'],
            [['created_at', 'update_at'], 'safe'],
            [['producto'], 'safe']
        ];
    }

    public $producto;

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Stock::find();
        $query->joinWith(['producto']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['producto'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['productos.nombre' => SORT_ASC],
            'desc' => ['productos.nombre' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'id_producto' => $this->id_producto,
            'precio' => $this->precio,
            'precio_mayor' => $this->precio_mayor,
            'cantidad' => $this->cantidad,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ]);
        $query->andFilterWhere(['like', 'productos.nombre', $this->producto]);

        return $dataProvider;
    }

}
