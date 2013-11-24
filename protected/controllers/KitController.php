<?php

class KitController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/master';
    public $body = "pida-su-kit";
    public $bodyClass = "";
    public $excusas, $listadoExcusas, $totalExcusas;
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

      /**
     * @return array action filters
     */

    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'pedir','nohaykit', 'validarkits'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'pedir', 'update', 'view'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    protected function beforeAction($action) {
        $this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count($this->listadoExcusas);
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
    public function actionView($id) {
		$this->bodyClass=" class='alerta'";
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionPedir() {
        $model=new Solicitudeskit;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        //si entra por post
        if(isset($_POST['Solicitudeskit']))
        {
                $model->attributes=$_POST['Solicitudeskit'];
                if($model->save()){
                    //enviar correo a dicional
                    //enviar correo adicional
                    $nombre=$_POST['Solicitudeskit']['nombre'];
                    $apellidos=$_POST['Solicitudeskit']['apellidos'];
                    $ciudad=$_POST['Solicitudeskit']['ciudad'];
                    $direccion=$_POST['Solicitudeskit']['direccion'];
                    $cedula=$_POST['Solicitudeskit']['cedula'];
                    $correo=$_POST['Solicitudeskit']['correo'];

                    $msg = "<p>Nombre: $nombre</p>";
                    $msg .= "<br>";
                    $msg .= "<p>Apellidos: $apellidos</p>";
                    $msg .= "<br>";
                    $msg .= "<p>Ciudad: $ciudad</p>";
                    $msg .= "<br>";
                    $msg .= "<p>Direccion: $direccion</p>";
                    $msg .= "<br>";
                    $msg .= "<p>Cedula: $cedula</p>";
                    $msg .= "<br>";
                    $msg .= "<p>Correo: $correo</p>";
                    

                    $message = new YiiMailMessage;
                    $message->setBody($msg, 'text/html');
                    $message->subject = "Solicitud de Kit";
                    
                    $message->from="contacto@inteligenciavial.com";
                    $message->addTo('pidasukitfpv@gmail.com');
                    $message->addTo('lmartinez@contenidoselrey.com');
                    $message->addTo('jcastro@contenidoselrey.com');
                    if (! Yii::app()->mail->send($message))
                        echo "error en el envio";

                    $this->redirect(array('view','id'=>$model->id));
                }
        }
        
        
        //si entra por link
        
        // obtener el numero de kits solicitados
        $criteria = new CDbCriteria;
        $criteria->condition="nombre != ''";
        $kits_pedidos = Solicitudeskit::model()->count($criteria);
            
        // obtener el numero de kits disponibles
        $criteria = new CDbCriteria;
        $criteria->condition = "id='1'";
        $kits_disponibles = Kits::model()->find($criteria)->numero;
        
        if($kits_pedidos < $kits_disponibles){
            //mostrar formulario de solicitud  
            $this->render('create',array(
                'model'=>$model,
            ));
            
        }else{
            //mostrar ventana de no hay mas
            $this->render('nohaykit');
        }
            
    }
    
    public function actionNohaykit(){
        $this->render('nohaykit');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Solicitudeskit'])) {
            $model->attributes = $_POST['Solicitudeskit'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Solicitudeskit;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Solicitudeskit'])) {
            $model->attributes = $_POST['Solicitudeskit'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Solicitudeskit('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Solicitudeskit']))
            $model->attributes = $_GET['Solicitudeskit'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Solicitudeskit the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Solicitudeskit::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Solicitudeskit $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'solicitudeskit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPedirkit() {
        //cargar los datos de los menu
        echo "fomulario de pedir kit";
    }
    
}
