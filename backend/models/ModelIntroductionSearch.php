<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModelIntroduction;

/**
 * ModelIntroductionSearch represents the model behind the search form of `common\models\ModelIntroduction`.
 */
class ModelIntroductionSearch extends ModelIntroduction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_model_introduction', 'id_model_platform'], 'integer'],
            [['introduction', 'what_I_like_the_most', 'what_I_do_not_like'], 'safe'],
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
        $query = ModelIntroduction::find();

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
            'id_model_introduction' => $this->id_model_introduction,
            'id_model_platform' => $this->id_model_platform,
        ]);

        $query->andFilterWhere(['like', 'introduction', $this->introduction])
            ->andFilterWhere(['like', 'what_I_like_the_most', $this->what_I_like_the_most])
            ->andFilterWhere(['like', 'what_I_do_not_like', $this->what_I_do_not_like]);

        return $dataProvider;
    }
}
