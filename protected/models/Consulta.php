<?php
/**
 * This is the model class for table "consulta".
 *
 * The followings are the available columns in table 'consulta':
 * @property integer $idcapacitacion
 * @property string $Nombres_y_Apellidos
 * @property string $Empresa
 * @property string $Telefono
 * @property string $Celular
 * @property string $E_mail
 * @property string $Capacitacion
 * @property string $Mensaje
 * @property string $tipo
 */
class Consulta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Consulta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consulta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Nombres_y_Apellidos, Empresa, Telefono, Celular, E_mail, Capacitacion, Mensaje, tipo', 'required'),
			array('Nombres_y_Apellidos, Empresa, Telefono, Celular, E_mail, Capacitacion, Mensaje', 'required'),
			array('Nombres_y_Apellidos, Empresa, E_mail, Capacitacion, Mensaje', 'length', 'max'=>255),
			//array('Empresa', 'match', 'pattern'=>'/ /'),
			//array('Celular', 'length', 'min'=>10,'max'=>10),
			//array('Telefono','length', 'min'=>7,'max'=>7),
			//array('Telefono, Celular', 'numerical', 'integerOnly'=>true),
			//array('Telefono, Celular', 'unique'),
			array('E_mail','email'),
			array('E_mail','unique'),
			//array('Nombres_y_Apellidos','match','pattern'=>'/ /'),
			//array('tipo', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('idcapacitacion, Nombres_y_Apellidos, Empresa, Telefono, Celular, E_mail, Capacitacion, Mensaje, tipo', 'safe', 'on'=>'search'),
			array('idcapacitacion, Nombres_y_Apellidos, Empresa, Telefono, Celular, E_mail, Capacitacion, Mensaje', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcapacitacion' => 'Idcapacitacion',
			'Nombres_y_Apellidos' => 'Nombres Y Apellidos',
			'Empresa' => 'Empresa',
			'Telefono' => 'Telefono',
			'Celular' => 'Celular',
			'E_mail' => 'E Mail',
			'Capacitacion' => 'Capacitacion',
			'Mensaje' => 'Mensaje',
			'tipo' => 'Tipo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idcapacitacion',$this->idcapacitacion);
		$criteria->compare('Nombres_y_Apellidos',$this->Nombres_y_Apellidos,true);
		$criteria->compare('Empresa',$this->Empresa,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('Celular',$this->Celular,true);
		$criteria->compare('E_mail',$this->E_mail,true);
		$criteria->compare('Capacitacion',$this->Capacitacion,true);
		$criteria->compare('Mensaje',$this->Mensaje,true);
		//$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}