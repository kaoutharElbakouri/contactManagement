
<!DOCTYPE html>
<html>
<head>
	<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
	rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

 <?php 
 if(!empty($_POST)){
     require_once 'functions.php';
     $lastName = sanitaze($_POST['lastName']);
     $firstName= sanitaze($_POST['firstName']);
     $address =sanitaze($_POST['address']);
     $perEmail = sanitaze($_POST['perEmail']);
     $proEmail = sanitaze($_POST['proEmail']);
     $telNo1 = sanitaze($_POST['telNo1']);
     $telNo2 = sanitaze($_POST['telNo2']);
//      $image = $_FILES['image']['name'];
     $postedId = sanitaze($_GET['id']);
     try {
         // Se connecter
         
         $db = connexionDB();
         
         $stmt = $db->prepare('update personne set firstName=:fn,
                  lastName=:ln , address=:ad,perEmail=:per,proEmail=:pro,
                   telNo1=:tel1,telNo2=:tel2 where id=:id');
         $stmt->execute(array(
             'id' => $postedId,
             'fn'=>$firstName,
             'ln'=>$lastName,
             'ad'=>$address,
             'per'=>$perEmail,
             'pro'=>$proEmail,
             'tel1'=>$telNo1,
             'tel2'=>$telNo2
         ));
         
         
       
         
     } catch (Exception $ex) {
         
         echo $ex->getMessage();
         
     }
     
     
     
 }
 require_once 'functions.php';
 $id = sanitaze($_GET['id']);
 
 try {
     require_once 'functions.php';
     $db = connexionDB();
     
     
     $stmt = $db->prepare('select  * from personne where id=:id');
     $stmt->execute(array('id' => $id));
     
     
     if($data = $stmt->fetch()){
         
         
         
         ?>
        
 
 <br><br><h1> You can update your informations :</h1>
<form class="container bg-info"  method="POST" enctype="multipart/form-data" >

<label class="font-weight-bold" >First Name:</label><br>
<input type="text" name="firstName" value="<?php echo $data['firstName']?>" required/> <br>
<label class="font-weight-bold">Last Name:</label><br>
<input type="text" name="lastName" value="<?php echo $data['lastName']?>"required/><br>
<label class="font-weight-bold">Personal Email:</label><br>
<input type="text" name="perEmail" value="<?php echo $data['perEmail']?>" required/><br>
<label class="font-weight-bold">Professional Email:</label><br>
<input type="text" name="proEmail" value="<?php echo $data['proEmail']?>" required/><br>
<!-- <label class="font-weight-bold">Image:</label><br> -->
<!-- <input type="file" name="image" class="form-control-file border" required/><br> -->
<label class="font-weight-bold">Adress:</label><br>
<input type="text" name="address" value="<?php echo $data['address']?>" required/><br>
<label class="font-weight-bold">Telephone 1:</label><br>
<input  type="text" name="telNo1" value="<?php echo $data['telNo1']?>"><br>
<label class="font-weight-bold">Telephone 2:</label><br>
<input  type="text" name="telNo2" value="<?php echo $data['telNo2']?>"><br><br>



  <div class="col-12" style="text-align:right">
  		<button type="reset" class="btn btn-secondary font-weight-bold">Reset</button>

		<button type="submit" class="btn btn-primary font-weight-bold">Update</button>
  </div>
  <br><br>
    
    </form>
 
        
        <?php 
        
       
        
    }
  
    
    else{
        echo 'ce client n\'existe pas ';
        
    }
    
    
    
} catch (Exception $ex) {}


?>

</body>
</html>
