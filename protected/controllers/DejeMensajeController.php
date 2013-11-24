<?php
Yii::import('ext.yii-mail.YiiMailMessage');
class DejeMensajeController extends Controller
{
        
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/master';
    public $body = "deje-su-mensaje";
    public $bodyClass = "";
	public $excusas,$listadoExcusas,$totalExcusas;
	var $datosMenu;
    var $datosSubMenu = array();
    var $datosMenuTop;
    var $idCategoriaActual = ""; //Para marcar en el menu el elemento actual
    var $idPadreActual = ""; //Para marcar en el menu el elemento actual cuando es submenu
	public $descripcion;
	public $palabrasClave;
	public $titulo;
	    public $Metadescripcion;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('form'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index','view','guardar','create'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	protected function beforeAction($action)
	{
		$this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count( $this->listadoExcusas);
		$this->generaMenuPrincipal();
		
		return true;
	}
	private function generaMenuPrincipal() {
        //Men? principal
        $criteria = new CDbCriteria;
        $criteria->condition = "idpadrecategoria IS NULL AND activo=1";
        $criteria->order = "orden";

        $model = Categoria::model()->findAll($criteria);



        if (!empty($model)) {
            foreach ($model as $menu) {

                $submenu = Categoria::model()->findAllByAttributes(array('idpadrecategoria' => $menu->idcategoria, 'activo' => 1), array('order' => 'orden ASC'));
                $i = 0;
                if (count($submenu) > 0) {
                    foreach ($submenu as $datossubmenu) {
                        $this->datosSubMenu[$menu->idcategoria][$i]['titulo'] = $datossubmenu->titulo;
                        $this->datosSubMenu[$menu->idcategoria][$i]['idcategoria'] = $datossubmenu->idcategoria;
                        $this->datosSubMenu[$menu->idcategoria][$i]['alias'] = $datossubmenu->alias;
                        $i++;
                    }
                }
                // echo ($menu->titulo);
                //print_r(count($submenu));
            }

            //  print_r($this->datosSubMenu);
        }

        //Menu TOP
        $criteria = new CDbCriteria;
        $criteria->condition = "idplantilla IN (6,7,8) AND activo=1";
        $criteria->order = "orden";

        $modelTop = Categoria::model()->findAll($criteria);

        $this->datosMenu = $model;
        $this->datosMenuTop = $modelTop;
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->bodyClass=" class='alerta'";
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Mensajes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->scenario="cliente";
			$model->attributes=$_POST['Mensajes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Mensajes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$this->render('Z-2-deje-su-mensaje',array(
                'body'=>$this->body,
                'bodyClass'=>$this->bodyClass,
                'content'=>''
                )
            );
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mensajes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mensajes']))
			$model->attributes=$_GET['Mensajes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Mensajes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Mensajes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Mensajes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mensajes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    public function ActionForm(){
            //cargar la plantilla con los menu
           $model=new Mensajes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mensajes']))
		{
			$model->scenario="cliente";
			$_POST['Mensajes']['tipo']="c";
			$model->attributes=$_POST['Mensajes'];
			if($model->save()){
                //enviar correo adicional
                $nombre=$_POST['Mensajes']['nombre'];
                $apellidos=$_POST['Mensajes']['apellidos'];
                $mensaje=$_POST['Mensajes']['mensaje'];

                $msg = "<p>Nombre: $nombre</p>";
                $msg .= "<br>";
                $msg .= "<p>Apellidos: $apellidos</p>";
                $msg .= "<br>";
                $msg .= "<p>Mensaje: $mensaje</p>";
                

                $message = new YiiMailMessage;
                $message->setBody($msg, 'text/html');
                $message->subject = "Mensaje Pida la Calle";
                //$message->from = ('ares987654@gmail.com');

                $message->from="contacto@inteligenciavial.com";
                $message->addTo('formulariopidalacalle@gmail.com');
                $message->addTo('lmartinez@contenidoselrey.com');
                $message->addTo('jcastro@contenidoselrey.com');
                if (! Yii::app()->mail->send($message))
                	echo "error en el envio";
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('Z-2-deje-su-mensaje',array(
			'model'=>$model,
		)); 
   
        }
        
        public function ActionGuardar()
        {
            $nombre='';//obtener nombre desde post;
            $apellidos='';//obtener apellidos desde post
            $mensaje='';//obtener el mensaje desde post
            $tyc='';//obtener terminos y condiciones
            if(tyc=='on'){
                //insertar estos datos en la base de datos;
            }
            echo "<h1>Guardar en la base de datos</h1>";
            
        }

}
