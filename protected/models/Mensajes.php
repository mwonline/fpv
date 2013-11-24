<?php

/**
 * This is the model class for table "mensajes".
 *
 * The followings are the available columns in table 'mensajes':
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $mensaje
 */
class Mensajes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mensajes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, tipo,acepto', 'required'),
			array('mensaje', 'required','message'=>''),
			array('nombre, apellidos', 'length', 'max'=>100),
            array('mensaje', 'length', 'max'=>140,"tooLong"=>"El mensaje debe tener maximo 140 catacteres",'on'=>'twitter'),
			array('mensaje', 'length', 'max'=>300,"tooLong"=>"El mensaje debe tener maximo 300 catacteres",'on'=>'facebook'),
			array('mensaje', 'length', 'max'=>300,"tooLong"=>"El mensaje debe tener maximo 300 catacteres",'on'=>'cliente'),
            array('tipo', 'length', 'max'=>1),
			array('acepto', 'in', 'range'=>array("true"),'allowEmpty'=>false,'message'=>'Debe aceptar los términos y condiciones' ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellidos, mensaje, tipo', 'safe', 'on'=>'search'),
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
			'mensaje' => 'Escriba su mensaje',
            'tipo' =>'Tipo',
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
		$criteria->compare('mensaje',$this->mensaje,true);
        $criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mensajes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
