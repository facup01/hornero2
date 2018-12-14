<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Complejidad}}".
 *
 * @property int $idComplejidad
 * @property string $Complejidad
 *
 * @property Problema[] $problemas
 */
class Complejidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Complejidad}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Complejidad'], 'required'],
            [['Complejidad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idComplejidad' => 'Id Complejidad',
            'Complejidad' => 'Complejidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblemas()
    {
        return $this->hasMany(Problema::className(), ['idComplejidad' => 'idComplejidad']);
    }
}
