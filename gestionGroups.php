<html>
<head>
	<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
     <link rel="stylesheet" href="pro.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-primary" href="#">Welcome to our online store</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="registrationForm.php">Home</a></li>
      <li><a href="gestionContacts.php">Manage Contacts</a></li>
      <li><a href="gestionGroups.php">Manage Groups</a></li>
    </ul>
  </div>
</nav>


			<form class="row g-3" action="gestionGroups.php?searchGroup=searchGroup" method="POST">

				<div class="col-auto">
					<input type="text" class="form-control" name="groupeName">
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary mb-3" name="searchGroup">Search</button>
				</div>
			</form>

			<?php 
   require_once 'functions.php';
   $db=connexionDB();
   
   

   if (isset($_GET['id1'])){
       $id1 = $_GET['id1'];
      
       //preparer une requete de suppression et puis l'executer:
       $stmt=$db->prepare('delete from groupe where id1=:id1');
       $stmt->execute(array(
           'id1'=>$id1
       ));
       
   }
   
   
   
   if(isset($_GET['searchGroup'])){
       ?> <p class="font-weight-bold text-danger">LE Groupe Recherche :</p><?php 
       $groupeName=$_POST['groupeName'];
       $stmt=$db->prepare('select * from groupe where groupeName=:groupeName');
       $stmt->execute(array(
           'groupeName'=>$groupeName
       ));
       
       

       
       echo'<table class="table table-dark">';
       echo '<tr><td>Icon</td><td>Name</td><td>Actions</td></tr>';
       while($data=$stmt->fetch()){
           $linkdel='<a href="gestionGroups.php?id1='.$data['id1'].'">Delete</a>';
          
           
           echo '<tr><td><img src="upload/'.$data['Icon'].'"/></td><td>'.$data['groupeName'].'</td><td>'.$linkdel.'</td></tr>';
       }
       echo '</table>';
       
   }

   //////////////////////////////
   ?> <p class="font-weight-bold text-danger">LA LISTE DE NOS Groupes :</p>
   <?php 
   $stmt=$db->prepare('select * from groupe');
   $stmt->execute();
   echo'<table class="table table-dark">';
   echo '<tr><td>Icon</td><td>Name</td><td>Actions</td></tr>';
   while($data=$stmt->fetch()){
       $linkdel='<a href="gestionGroups.php?id1='.$data['id1'].'">Delete</a>';
      
       
       echo '<tr><td><img src="upload/'.$data['Icon'].'"/></td><td>'.$data['groupeName'].'</td><td>'.$linkdel.'</td></tr>';
   }
   echo '</table>';
 
   
   ?>
			
</body>
</html>
