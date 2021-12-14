<?php

namespace app\models;

use common\models\ModeloInfoPersonal;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ModeloInfoPersonalSearch represents the model behind the search form of `app\models\ModeloInfoPersonal`.
 */
class ModeloInfoPersonalSearch extends ModeloInfoPersonal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo', 'edad'], 'integer'],
            [['nombres', 'apellidos', 'fecha_nacimiento', 'cedula_front', 'cedula_back', 'direccion', 'correo_electronico', 'estado_civil', 'foto'], 'safe'],
            [['cedula', 'celular'], 'number'],
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
        $query = ModeloInfoPersonal::find();

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
            'id_modelo' => $this->id_modelo,
            'edad' => $this->edad,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'cedula' => $this->cedula,
            'celular' => $this->celular,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'cedula_front', $this->cedula_front])
            ->andFilterWhere(['like', 'cedula_back', $this->cedula_back])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
