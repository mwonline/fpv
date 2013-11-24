<?php

/**
 * This is the model class for table "contenido".
 *
 * The followings are the available columns in table 'contenido':
 * @property integer $idContenido
 * @property string $titulo
 * @property string $resumen
 * @property string $descripcion
 * @property string $descripcion2
 * @property string $fecha_creacion
 * @property string $activo
 * @property string $usuario_creacion
 * @property string $imagen
 * @property string $Metadescripcion
 * @property string $Meta_tags
 * @property string $alias
 * @property string $orden
 * @property string $destacado
 * @property string $tags
 * @property string $imagen2
 * @property string $imagen3
 * @property string $altImage2
 * @property string $altImage3
 *
 * The followings are the available model relations:
 * @property Categoria[] $categorias
 * @property Destacados $destacados
 */
 
class Contenido extends CActiveRecord
{
	public $idCategoria;
	public $archivo=array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contenido the static model class
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
		return 'contenido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo,alias,idCategoria', 'required'),
			array('orden','numerical','integerOnly'=>true),
			array('titulo, usuario_creacion, Metadescripcion, Meta_tags, alias', 'length', 'max'=>255),
			array('activo','length', 'max'=>1),
			array('imagen,fecha_creacion, descripcion,imagen2,tags,resumen', 'type', 'allowEmpty'=>true),
			array('alias,', 'match' ,'pattern'=>'/[a-zA-Z0-9_-]*/'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idContenido, titulo, resumen, descripcion,  activo, usuario_creacion, imagen, Metadescripcion, Meta_tags, alias,tags,imagen2', 'safe', 'on'=>'search'),
			array('destacado','numerical','integerOnly'=>true),	
			array('alias', 'unique'),
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
			'categorias' => array(self::HAS_MANY, 'Categoria', 'idContenidoRef'),
			'destacados' => array(self::HAS_ONE, 'Destacados', 'id_destacado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCategoria' => 'Categor&iacute;a',
			'idContenido' => 'Id Contenido',
			'titulo' => 'T&iacute;tulo',
			'resumen' => 'Resumen',
			'descripcion' => 'Contenido',
			'fecha_creacion' => 'Fecha (Para blog le fecha de la noticia, para aliados la fecha de ingreso)',
			'activo' => 'Activo',
			'usuario_creacion' => 'Usuario Creaci&oacute;n',
			'imagen' => 'Imagen',
			'imagen2' => 'Imagen 2 (Solo para aliados, logo para el home)',
			'imagen3' => 'Imagen 3',
			'Metadescripcion' => 'Metadescripci&oacute;n',
			'Meta_tags' => 'Meta Tags',
			'alias' => 'Alias',
			'tags' => 'Tags',
			'orden' => 'Orden',
			'destacado' => 'Destacado (Cero por defecto)',
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

		$criteria->compare('idContenido',$this->idContenido);
		$criteria->compare('idCategoria',$this->idCategoria,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('alias',$this->alias,true);
 		//$criteria->compare('destacado',$this->alias,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getCategoria() {
        return CHtml::listData(Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden')), 'idcategoria', 'titulo');
    }
	
	public function getContenido() {
		return CHtml::listData(Contenido::model()->findAllByAttributes(array('activo' => 1)), 'idContenido', 'titulo');
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
	public function getArchivo() {
		 $criteria2 = new CDbCriteria;
        
            $criteria2->condition = " idContenidomul = '" . $this->idContenido . "' AND tipo='A' order By orden LIMIT 0,1";
        	$archivo = Multimedia::model()->findAll($criteria2);
    		return $archivo[0]['url'];
	}
	
	//formulario capacitacion
	public function getContenidoformcapacitacion() {
    
       return CHtml::listData(Contenido::model()->findAllByAttributes(array('idCategoria'=>'13')),'titulo', 'titulo');
		//return CHtml::listData(Contenido::model()->findAllByAttributes(array('idContenido' => $numeros,'activo' => 1)),'titulo','titulo');
    //return Categoria::model()->findAllByAttributes(array('activo' => 1), array('order' => 'orden'));
	}
	
	
	
	public function create()
	{
		echo 'contenido';
	}


}