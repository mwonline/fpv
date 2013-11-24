<div id="fb-root"></div>
<script>
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        alert('Good to see you, ' + response.name + '.');
    });
}
	
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '360340927395738', // App ID
      channelUrl : '//www.inteligenciavial.com/channel.php', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

	FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {
		// connected
		//alert("1");
		//testAPI();
	  } else if (response.status === 'not_authorized') {
		// not_authorized
		//alert("2");
		//login()
	  } else {
		// not_logged_in
		//alert("3");
		//login()
	  }
	 });
    // Additional init code here

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   
   function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
			window.location="<?php echo $this->createUrl("form/createf");?>";
        } else {
            // cancelled
			//alert(2);
        }
    }, {scope: 'email,publish_stream'});
   } 
</script>
<?php
/* @var $this ExcusasController */
/* @var $model Excusas */

/*$this->breadcrumbs=array(
	'Excusases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Excusas', 'url'=>array('index')),
	array('label'=>'Manage Excusas', 'url'=>array('admin')),
);*/
?>
            
            <div class="main wrapper clearfix">
                
              <article>
                    
                    <section>
                        
					  <div class="formulario">
                       <div class="top">
                        <span class="titulo">Únase</span>
                        <div class="texto1"> Sus acciones también cuentan. Deje aquí su excusa y comprométase a usar su Inteligencia Vial.</div>
                          <div class="texto2">Ingrese con su cuenta de Facebook para dejar su excusa</div>
                            <div class="bt-fb"><a href="javascript:void(0)" onclick="login()"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/bt-fb.png" width="211" height="28" alt="Conectarse"></a></div>
                            
                             </div><!-- fin top -->
                            
                            
                       <div class="bottom">
                     <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                      </div>   <!-- fin bottom --> 
                      </div><!-- fin formulario -->

                    </section>
                    
                    
                </article>

                

            </div>

