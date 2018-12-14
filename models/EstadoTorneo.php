<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%EstadoTorneo}}".
 *
 * @property int $idEstado
 * @property string $Estado
 *
 * @property Torneo[] $torneos
 */
class EstadoTorneo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%EstadoTorneo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Estado'], 'required'],
            [['Estado'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEstado' => 'Id Estado',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasMany(Torneo::className(), ['idEstado' => 'idEstado']);
    }
}
