<?php

/**
 * This is the model class for table "multimedia".
 *
 * The followings are the available columns in table 'multimedia':
 * @property integer $idmultimedia
 * @property string $url
 * @property string $resumen
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property ContenidoMultimedia[] $contenidoMultimedias
 */
class Multimedia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Multimedia the static model class
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
		return 'multimedia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, resumen, fecha_creacion, idContenidomul, tipo', 'required'),
			array('url, resumen, ,idContenidomul', 'length', 'max'=>255),
			array('orden', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmultimedia, url, resumen, fecha_creacion, idContenidomul', 'safe', 'on'=>'search'),
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
			'contenidoMultimedias' => array(self::HAS_MANY, 'ContenidoMultimedia', 'idmultimedia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmultimedia' => 'Multimedia',
			'url' => 'Url',
			'resumen' => 'Resumen',
			'fecha_creacion' => 'Fecha Creacion',
			'idContenidomul'=>'Contenido',
            'tipo' => 'Tipo de Contenido',
			'orden' => 'Orden',
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

		$criteria->compare('idmultimedia',$this->idmultimedia);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('idContenidomul',$this->idContenidomul,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('orden',$this->orden,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getContenido() {
        return CHtml::listData(Contenido::model()->findAllByAttributes(array('activo' => 1)), 'idContenido', 'titulo');
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
}