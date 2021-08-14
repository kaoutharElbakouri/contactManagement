<html>
<head>

	<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
	rel="stylesheet">

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
</body>
</html>

<?php  require_once('functions.php');?>
<div class="container text-secondary">
<form  method="post" enctype="multipart/form-data">
    <div class="mb-3">
    <label>Enter the Name of your Group :</label><br>
    <input type="text" class="form-control border-top-0 border-end-0 border-start-0 mt-2 "  name="groupeName">
    </div>
    <div class="mb-3">
    <label>Upload an Icon for your Group:</label><br>
    <input type="file" class="form-control border-top-0 border-end-0 border-start-0"  name="uploadfile">
      <br><mark>  Who you want to add ?</mark><br>
     </div>
     <div>
     
     <?php

$userList = getuser(); //kanakhdo les users li f bd nqdro ndiro nfs lhaja f mini projet
foreach($userList as $it){
    echo printcheckbox($it['id'], $it['firstName'].' '.$it['lastName']); //les infos dyal personne f BD
}
?>	
</div>
    <button type="submit" class="btn btn-danger mt-3 mb-3">Create</button>
    </form>
    </div>
    <?php 
    
    
    

    
    if(isset($_POST['groupeName'])){
        $folder = "upload/";
        $file = basename( $_FILES['uploadfile']['name']);
        $full_path = $folder.$file;       
         $nom=$_POST['groupeName'];
         $groupe= $_POST['group'];        
         move_uploaded_file($_FILES['uploadfile']['tmp_name'], $full_path);
    
        try{
            $bd=connexionDB();
            $stmt = $bd->prepare("insert into groupe(groupeName,Icon) values (:groupeName,:image)");
            $stmt->execute(array('groupeName'=>$nom, 'image'=> $file));
            
            
            
            
            $idgroup = $bd->lastInsertId();
            foreach ($groupe as $it) {
                $stmt = $bd->prepare('insert into groupepersonne (id,id1) values(:id,:id1) ');
                        $stmt->execute(array(
                            'id1' => $idgroup,
                            'id' => $it,
                        ));
            }
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
      
    }
   }
    ?>
</body>
</html>

   
