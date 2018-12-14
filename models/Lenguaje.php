<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Lenguaje}}".
 *
 * @property int $idLenguaje
 * @property string $Lenguaje
 *
 * @property Stub[] $stubs
 * @property Usuario[] $usuarios
 */
class Lenguaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Lenguaje}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Lenguaje'], 'required'],
            [['Lenguaje'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLenguaje' => 'Id Lenguaje',
            'Lenguaje' => 'Lenguaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStubs()
    {
        return $this->hasMany(Stub::className(), ['idLenguaje' => 'idLenguaje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idLenguaje' => 'idLenguaje']);
    }
}
