<div id="fb-root"></div>
<script>
function infoAPI() {
    FB.api('/me', function(response) {
		$("#nombreFace").html(response.name);
		$("#nombre").val(response.name);
		if(response.email!=""){
			$("#correo").val(response.email);
		}else{
			$("#correo").val(response.username +"@facebook.com");
		}
		$("#id_facebook").val(response.id);		
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
		infoAPI();
	  } else if (response.status === 'not_authorized') {
		// not_authorized
		//alert("2");
		window.location="<?php $this->createUrl("form/crate");?>";
	  } else {
		// not_logged_in
		//alert("3");
		//login()
		window.location="<?php $this->createUrl("form/crate");?>";
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
			//alert(1);
			window.location="<?php $this->createUrl("form/cratef");?>";
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
                        <div class="texto1"><!--<div style="float:left">Hola,&nbsp;</div>--><div id="nombreFace" style="float:left"></div></div>
                          <div class="texto2">Ha ingresado exitosamente con su cuenta de Facebook</div>
                   
                             </div><!-- fin top -->
                            
                            
                       <div class="bottom">
                     <?php echo $this->renderPartial('_formf', array('model'=>$model)); ?>
                      </div>   <!-- fin bottom --> 
                      </div><!-- fin formulario -->

                    </section>
                    
                    
                </article>

                

            </div>

