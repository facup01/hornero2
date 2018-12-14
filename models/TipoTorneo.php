<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%TipoTorneo}}".
 *
 * @property int $idTipo
 * @property string $Tipo
 *
 * @property Torneo[] $torneos
 */
class TipoTorneo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%TipoTorneo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tipo'], 'required'],
            [['Tipo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipo' => 'Id Tipo',
            'Tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasMany(Torneo::className(), ['idTipo' => 'idTipo']);
    }
}
