<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Torneo;

/**
 * TorneoSearch represents the model behind the search form of `app\models\Torneo`.
 */
class TorneoSearch extends Torneo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTorneo', 'idEstado', 'idTipo'], 'integer'],
            [['Nombre', 'Descripcion', 'FechaInicio', 'FechaFin'], 'safe'],
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
        $query = Torneo::find();

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
            'idTorneo' => $this->idTorneo,
            'FechaInicio' => $this->FechaInicio,
            'FechaFin' => $this->FechaFin,
            'idEstado' => $this->idEstado,
            'idTipo' => $this->idTipo,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
