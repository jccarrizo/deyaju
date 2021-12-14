<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ModeloImagenPerfil;

/**
 * ModeloImagenPerfilSearch represents the model behind the search form of `common\models\ModeloImagenPerfil`.
 */
class ModeloImagenPerfilSearch extends ModeloImagenPerfil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modelo_imagen_perfil', 'id_modelo_info_plataforma', 'estado_foto', 'aprobacion_foto', 'orientacion_foto'], 'integer'],
            [['adjunto_foto_perfil'], 'safe'],
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
        $query = ModeloImagenPerfil::find();

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
            'id_modelo_imagen_perfil' => $this->id_modelo_imagen_perfil,
            'id_modelo_info_plataforma' => $this->id_modelo_info_plataforma,
            'estado_foto' => $this->estado_foto,
            'aprobacion_foto' => $this->aprobacion_foto,
            'orientacion_foto' => $this->orientacion_foto,
        ]);

        $query->andFilterWhere(['like', 'adjunto_foto_perfil', $this->adjunto_foto_perfil]);

        return $dataProvider;
    }
}
