<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * seacrchUsuario represents the model behind the search form of `app\models\Usuario`.
 */
class seacrchUsuario extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idRol', 'idLenguaje'], 'integer'],
            [['Institucion', 'NombreUsuario', 'Descripcion', 'Clave', 'Email'], 'safe'],
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
        $query = Usuario::find();

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
            'idUsuario' => $this->idUsuario,
            'idRol' => $this->idRol,
            'idLenguaje' => $this->idLenguaje,
        ]);

        $query->andFilterWhere(['like', 'Institucion', $this->Institucion])
            ->andFilterWhere(['like', 'NombreUsuario', $this->NombreUsuario])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Clave', $this->Clave])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
