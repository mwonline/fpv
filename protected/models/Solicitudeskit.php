<?php

/**
 * This is the model class for table "solicitudeskit".
 *
 * The followings are the available columns in table 'solicitudeskit':
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $ciudad
 * @property string $direccion
 * @property string $cedula
 * @property string $correo
 */
class Solicitudeskit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitudeskit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, ciudad, direccion, cedula, correo', 'required'),
			array('nombre, apellidos, ciudad, direccion, correo', 'length', 'max'=>100),
			array('cedula', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('acepto', 'in', 'range'=>array("true"),'allowEmpty'=>false,'message'=>'Debe aceptar los términos y condiciones' ),
			array('id, nombre, apellidos, ciudad, direccion, cedula, correo', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'ciudad' => 'Ciudad',
			'direccion' => 'Direccion',
			'cedula' => 'Cedula',
			'correo' => 'Correo',
			'acepto'=>"Acepto",
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('correo',$this->correo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitudeskit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
