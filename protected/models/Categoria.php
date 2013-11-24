<?php


/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property string $titulo
 * @property integer $orden
 * @property integer $activo
 * @property string $fecha_de_creación
 * @property string $usuario_creación
 * @property integer $idplantilla
 * @property integer $idcategoria
 * @property integer $idContenidoRef
 * @property integer $idpadrecategoria
 * @property string $alias
 * @property string $palabrasClave
 * @property string $metaDescripcion
 * @property string $altImage
 * @property string $textoComplementario
 * @property string $fecha_actualizacion
 * 
 *
 * The followings are the available model relations:
 * @property Categoria $idpadrecategoria0
 * @property Categoria[] $categorias
 * @property Contenido $idContenidoRef0
 */
 
class Categoria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categoria the static model class
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
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, orden, activo, fecha_de_creacion, idplantilla, alias, descripcion', 'required'),
			array('orden, activo, idplantilla, idContenidoRef, idpadrecategoria', 'numerical', 'integerOnly'=>true),
			array('titulo, alias, imagen', 'length', 'max'=>255),
			array('alias', 'unique'),
			array('palabrasClave,metaDescripcion,textoComplementario,altImage,subTitulo', 'type', 'allowEmpty'=>true),
			array('alias,', 'match' ,'pattern'=>'/[a-zA-Z0-9_-]*/'),
			// The followin'g rule is used by search().
			// Please remove those attributes that should not be searched.
			array('titulo, orden, activo, fecha_de_creacion, idplantilla, idcategoria, idContenidoRef, idpadrecategoria, imagen, descripcion', 'safe', 'on'=>'search'),
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
			'idpadrecategoria0' => array(self::BELONGS_TO, 'Categoria', 'idpadrecategoria'),
			'categorias' => array(self::HAS_MANY, 'Categoria', 'idpadrecategoria'),
			'idContenidoRef0' => array(self::BELONGS_TO, 'Contenido', 'idContenidoRef'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'titulo' => 'Título',
			'orden' => 'Orden',
			'activo' => 'Activo',
			'alias' => 'Alias (Campo para URL amigable)',
			'fecha_de_creacion' => 'Fecha De Creación',
			
			'idplantilla' => 'Tipo de Categoría',
			'idcategoria' => 'Idcategoria',
			'idContenidoRef' => 'Id Contenido Ref',
			'idpadrecategoria' => 'Categoría Padre',
			'imagen' => 'Imagen',
			'descripcion' => 'Descripción',
			'subTitulo' => 'Resumen',
			'palabrasClave'=> 'Palabras Clave',
			'metaDescripcion'=> 'Meta Descripción',
			'altImage'=> 'Alt Imagen',
			'textoComplementario' => 'Texto Complementario (Para la sección servicios)',
			'fecha_actualizacion'=>"Fecha Actualizacion"
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

		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('fecha_de_creacion',$this->fecha_de_creacion,true);
		
		$criteria->compare('idplantilla',$this->idplantilla);
		$criteria->compare('idcategoria',$this->idcategoria);
		$criteria->compare('idContenidoRef',$this->idContenidoRef);
		$criteria->compare('idpadrecategoria',$this->idpadrecategoria);
		$criteria->compare('imagen',$this->imagen);
		$criteria->compare('descripcion',$this->descripcion);
		$criteria->compare('subTitulo',$this->subTitulo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getCategoria() {
        return CHtml::listData(Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden')), 'idcategoria', 'titulo');
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
	public function getCategoriaMenu() {
		$lista=CHtml::listData(Categoria::model()->findAllByAttributes(array('idpadrecategoria'=>NULL), array('order' => 'orden')), 'idcategoria', 'titulo');
		
			
		$listaFinal = array();
		
		foreach($lista as $ke=>$_categoria)
		{
			$listaFinal[$ke]=$_categoria;
			$criteria2 = new CDbCriteria;
			$criteria2->select = 'idcategoria,titulo';
			$criteria2->condition = "activo=1 and idpadrecategoria =$ke";
			// $criteria->params=array(':prsbs'=>$prsbs);
			$lista2obj = Categoria::model()->findAll($criteria2);
			$lista2 = array();
			foreach($lista2obj as $kb=>$elemento)
				$listaFinal[$elemento->idcategoria]="--".$elemento->titulo;
//			print_r($elemento->idcategoria);
		}
			
        return $listaFinal;
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
	public function getCategoriasPadre() {
        return CHtml::listData(Categoria::model()->findAllByAttributes(array(), array('order' => 'orden')), 'idcategoria', 'titulo');
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
	public function getTipos() {
        return CHtml::listData(Plantilla::model()->findAll(), 'idPlantilla', 'nombrePlantilla');
	}

}