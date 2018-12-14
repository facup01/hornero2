<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Problema;

/**
 * ProblemaSearch represents the model behind the search form of `app\models\Problema`.
 */
class ProblemaSearch extends Problema
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProblema', 'idTipo', 'idComplejidad'], 'integer'],
            [['Nombre', 'Archivo', 'Enunciado'], 'safe'],
            [['TiempoEjecucionMax'], 'number'],
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
        $query = Problema::find();

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
            'idProblema' => $this->idProblema,
            'idTipo' => $this->idTipo,
            'idComplejidad' => $this->idComplejidad,
            'TiempoEjecucionMax' => $this->TiempoEjecucionMax,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Archivo', $this->Archivo])
            ->andFilterWhere(['like', 'Enunciado', $this->Enunciado]);

        return $dataProvider;
    }
}
