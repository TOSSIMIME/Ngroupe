<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('jquery.toast.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('pnotify.custom.min'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css_url('horloge'); ?>" />
<script src="<?php echo js_url('jquery.form'); ?>"></script>
 <script src="<?php echo js_url('pnotify.custom.min'); ?>"></script>
 <script src="<?php echo js_url('PNotify'); ?>"></script>
 <script src="<?php echo js_url('PNotifyButtons'); ?>"></script>
 <script src="<?php echo js_url('PNotifyMobile'); ?>"></script>
 <script src="<?php echo js_url('PNotifyConfirm'); ?>"></script>
 <script src="<?php echo js_url('PNotifyStyleMaterial'); ?>"></script>
 <script src="<?php echo js_url('jquery'); ?>" ></script>
  <div class="container-fluid">
  <div class="row">
  
  <div class="col-md-2" style="float:left;">
  
  </div>
   <div class="col-md-7">
   <div class="panel panel-primary" >
    <div class="panel-heading "><span class="glyphicon glyphicon-user"> NOUVEAU USERS</div>
  <div class="panel-body">
 <center><div class="row">
  <?php echo $info;?>
 <form class="online" method="post" action="<?php echo site_url('Welcome/accounte') ?>" enctype="multipart/form-data">
 <?php if($user_edit){ foreach($user_edit as $loop){?>
 <div class="col-md-12">
 <div class="form-group input-group">

	<img width="112" height="50" src="<?php 
                     $photo = $loop->USER_PHOTO;
                  echo   image_user($photo);?>" title="Photo user" alt="ma photo"/>
	</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Nom</span>
					</span>
					<input type="hidden" id="nom" value="<?php echo $loop->USER_ID;?>" name="id" class="form-control" />
	<input type="text" id="nom" placeholder=" Votre Nom" name="noms" value="<?php echo $loop->USER_NOM;?>"  class="form-control form-control-sm" required />
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span > Prénom</span>
					</span>
	<input type="text" id="nom" placeholder=" Votre Prenom" name="prenom" value="<?php echo $loop->USER_PRENOM;?>"class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Télephone</span>
					</span>
	<input type="number" id="nom" placeholder=" Votre numero de telephone" name="phone" value="<?php echo $loop->USER_PHONE;?>" class="form-control" required/>
	</div>
 
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Email</span>
					</span>
	<input type="email" id="nom" placeholder=" Votre email" name="email" value="<?php echo $loop->USER_MAIL;?>" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
  <div class="form-group input-group">
<span class="input-group-addon">
						<span >Votre Agence</span>
					</span>
	<select name="idag"class="form-control" required/>
	<option ></option>
<option value="<?php echo $_SESSION['id_ag'];?>"><?php echo $_SESSION['agence'];?></option>
</select>
</div>
 </div>
  
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Login</span>
					</span>
	<input type="text" id="nom" placeholder=" Votre nom utilisateur" name="login" value="<?php echo $loop->USER_LOGIN;?>" class="form-control" required/>
	</div>
 
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Password</span>
					</span>
	<input type="password" id="nom" placeholder=" Votre Nom" name="password" class="form-control" required/>
	</div>
 </div>
  <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
						<span >Confirme Password</span>
					</span>
	<input type="password"   name="passwords"  class="form-control" required>
	</div>
 </div>
  
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
<span >Type</span>
</span>
	<select class="form-control" name="type" >
<?php if($_SESSION['type']==2){ ?>
<option value="2">Administrateur</option>
<?php }elseif($_SESSION['type']==3){?>
<option value="3">Agent</option>
<?php }elseif($_SESSION['type']==4){?>
	<option value="4">Caissier(e)</option>
<?php }elseif($_SESSION['type']==5){?>
		<option value="5">Consultant</option>
	<?php }else{?>
		<option value="5">Consultant</option>
		<?php }?>
</select>
</div>
 </div>
 <div class="col-md-6">
 <div class="form-group input-group">
<span class="input-group-addon">
	<span >Photo user</span>
					</span>
	<input type="file"  name="userphoto" class="form-control required">
	</div>
 </div>  
 <div class="col-md-12">
 <div class="form-group input-group">
	<input type="submit" id="nom"value="Envoyer"  class="form-control btn btn-primary">
	</div>
 </div>
  <?php }}?>
 </form>
 </center>
  
  </div>
  </div>
   
   </div>
  <div class="col-md-1" style="float:right;">

  </div>
  
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script>
         $('.myPopover').popover({
         html : true,
         content: function() {
          var elementId = $(this).attr("data-popover-content");
          return $(elementId).html();
         }
         });
      </script>
</body>
</html>