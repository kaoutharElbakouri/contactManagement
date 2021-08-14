<!DOCTYPE html>
<html>
<head>
	<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
	rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
<?php 
session_start();
require_once 'functions.php';

//recuperer les donnees issu du formulaire
  
   // Vérifier si le formulaire est soumis
   //if ( isset( $_POST['Submit'] ) ) {
       /* récupérer les données du formulaire en utilisant
        la valeur des attributs name comme clé
        */
       $firstName = $_POST["firstName"];
       $lastName = $_POST['lastName'];
       $address = $_POST['address'];
       $perEmail = $_POST['perEmail'];
       $proEmail = $_POST['proEmail'];
       $telNo1 = $_POST['telNo1'];
       $telNo2 = $_POST['telNo2'];
       $idg=$_POST['idg'];
       //le chemin vers le fichier ou se trouve nos images
       $image = $_FILES['image']['name'];
       $folder = "upload/"; 
      // $file = basename( $_FILES['image']['name']); 
      //fournit le nom de la derniere composante du fichier
       $file = basename($image); 
      
       $full_path = $folder.$file; 
       move_uploaded_file($_FILES['image']['tmp_name'], $full_path) ;
           
  
       
         
      //se connecter a la base de donnees via la fonction connexionDB()
        $db=connexionDB(); 
       //insertion des donnees recuperes dans la base de donnees
        $stmt = $db->prepare('INSERT into personne(firstName, lastName,perEmail,proEmail,address,telNo1,telNo2,image,idg) values (:firstName, :lastName,:perEmail,:proEmail,:address,:telNo1,:telNo2,:image,:idg)');
        $stmt->execute(array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'perEmail'=>$perEmail ,
            'proEmail'=>$proEmail ,
            'address'=>$address,
            'telNo1'=>$telNo1,
            'telNo2'=>$telNo2,
            'image'=>$image,
            'idg' =>$idg
         )); ?>
         <body class="bg-secondary.bg-gradient"> 
         <br><br><br>
         <div class="container bg-info font-weight-bold fs-1"><br>
         Hi <?php echo $firstName ?><br><br>
            WELCOME TO OUR ONLINE SHOP STORE !<br><br>
            ENJOY YOUR SHOPPING !<br><br><br>
           <hr style="height:2px; width:50%; border-width:0; color:red; background-color:red"> 
                    <div>
<p class="font-weight-bold ">Do you want to create a group?</p>
<button type="submit" class="bi bi-box">
     <a href="createGroups.php">Create Group</a>
  </button>
  <br><br><br>
</div>
</div>
</body>
</html>
