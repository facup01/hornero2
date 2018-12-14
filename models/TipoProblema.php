<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%TipoProblema}}".
 *
 * @property int $idTipo
 * @property string $Tipo
 *
 * @property Problema[] $problemas
 */
class TipoProblema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%TipoProblema}}';
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
    public function getProblemas()
    {
        return $this->hasMany(Problema::className(), ['idTipo' => 'idTipo']);
    }
}
