<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fichas;

/**
 * FichasSearch represents the model behind the search form of `backend\models\Fichas`.
 */
class FichasSearch extends Fichas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'cantidad'], 'integer'],
            [['origen_fichas', 'origen_ficha_user', 'createa_at', 'update_at'], 'safe'],
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
        
        $query = Fichas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $query->where(['id_user'=>$id_user]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'cantidad' => $this->cantidad,
            'createa_at' => $this->createa_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'origen_fichas', $this->origen_fichas])
            ->andFilterWhere(['like', 'origen_ficha_user', $this->origen_ficha_user]);

        return $dataProvider;
    }
}
