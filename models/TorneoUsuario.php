<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%TorneoUsuario}}".
 *
 * @property int $idTorneoUsuario
 * @property int $idTorneo
 * @property int $idUsuario
 * @property int $Puntos
 * @property int $Tiempo
 * @property string $Token
 *
 * @property Usuario $usuario
 * @property Torneo $torneo
 */
class TorneoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%TorneoUsuario}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTorneo', 'idUsuario', 'Tiempo', 'Token'], 'required'],
            [['idTorneo', 'idUsuario', 'Puntos', 'Tiempo'], 'integer'],
            [['Token'], 'string', 'max' => 32],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
            [['idTorneo'], 'exist', 'skipOnError' => true, 'targetClass' => Torneo::className(), 'targetAttribute' => ['idTorneo' => 'idTorneo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTorneoUsuario' => 'Id Torneo Usuario',
            'idTorneo' => 'Id Torneo',
            'idUsuario' => 'Id Usuario',
            'Puntos' => 'Puntos',
            'Tiempo' => 'Tiempo',
            'Token' => 'Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneo()
    {
        return $this->hasOne(Torneo::className(), ['idTorneo' => 'idTorneo']);
    }
}
