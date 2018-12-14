<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Torneo}}".
 *
 * @property int $idTorneo
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property int $idEstado
 * @property int $idTipo
 *
 * @property Resolucion[] $resolucions
 * @property EstadoTorneo $estado
 * @property TipoTorneo $tipo
 * @property TorneoProblema[] $torneoProblemas
 * @property TorneoUsuario[] $torneoUsuarios
 */
class Torneo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Torneo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Descripcion', 'FechaInicio', 'FechaFin', 'idEstado', 'idTipo'], 'required'],
            [['Descripcion'], 'string'],
            [['FechaInicio', 'FechaFin'], 'safe'],
            [['idEstado', 'idTipo'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoTorneo::className(), 'targetAttribute' => ['idEstado' => 'idEstado']],
            [['idTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTorneo::className(), 'targetAttribute' => ['idTipo' => 'idTipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTorneo' => 'Id Torneo',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
            'idEstado' => 'Id Estado',
            'idTipo' => 'Id Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolucions()
    {
        return $this->hasMany(Resolucion::className(), ['idTorneo' => 'idTorneo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoTorneo::className(), ['idEstado' => 'idEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoTorneo::className(), ['idTipo' => 'idTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneoProblemas()
    {
        return $this->hasMany(TorneoProblema::className(), ['idTorneo' => 'idTorneo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneoUsuarios()
    {
        return $this->hasMany(TorneoUsuario::className(), ['idTorneo' => 'idTorneo']);
    }
}
