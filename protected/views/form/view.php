<div id="fb-root"></div>
<script>
function publicaAPI() {
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
		publicarPost();
		_gaq.push(['_trackPageview', '/registro-facebook/']);
	  } else{
		_gaq.push(['_trackPageview', '/registro-tradicional/']); 
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
   
</script>

<script>
publicarPost=function()
{	
var nombreUsuario;  
	FB.api('/me', function(response) {
			nombreUsuario=response.name;
			FB.ui(
			  {
				method: 'feed',
				name: 'Inteligencia Vial',
				link: 'http://www.inteligenciavial.com',
				picture: 'http://www.inteligenciavial.com/logoFace.png',
				caption: '',
				description: 'Ahora '+nombreUsuario+' hace parte del 57% de colombianos que usan la Inteligencia Vial. Unáse a la campaña y deje su excusa',
			  });
	});
	  /*,
  function(response) {
    if (response && response.post_id) {
      alert('Tu anuario ha sido compartido.');
    } else {
      alert('No fue publicado.');
    }
  }*/
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
                        <div class="texto1"><br />
Gracias por unirse</div>
                          <div class="texto2">
                            
                            Su excusa fue registrada correctamente
                          </div>
                            <div class="bt-fb"></div>
                            
                        </div><!-- fin top -->
                            
                            
                       <div class="bottom">
                       <form id="excusa">
                       <div class="titulo2">Excusa registrada</div>
 <label>Nombre</label>
<?php 
echo $model->nombre_usuario;
 ?>
  <label>Excusa</label>
  <textarea name="excusa" disabled="disabled"><?php 
echo $model->excusa;
 ?></textarea>
 

                     </form>
                      </div>   <!-- fin bottom --> 
                      </div><!-- fin formulario -->

                    </section>
                    
                    
                </article>

                

            </div>


