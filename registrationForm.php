
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
<form class="container bg-info" action="action.php" method="POST" enctype="multipart/form-data" >

<label class="font-weight-bold" >First Name:</label><br>
<input type="text" name="firstName" required/><br>
<label class="font-weight-bold">Last Name:</label><br>
<input type="text" name="lastName" required/><br>
<label class="font-weight-bold">Personal Email:</label><br>
<input type="text" name="perEmail" required/><br>
<label class="font-weight-bold">Professional Email:</label><br>
<input type="text" name="proEmail" required/><br>
<label class="font-weight-bold">Image:</label><br>
<input type="file" name="image" class="form-control-file border"  accept="image\*" required/><br>
<label class="font-weight-bold">Adress:</label><br>
<input type="text" name="address" required/><br>
<label class="font-weight-bold">Telephone 1:</label><br>
<input  type="text" name="telNo1" ><br>
<label class="font-weight-bold">Telephone 2:</label><br>
<input  type="text" name="telNo2" ><br><br>
<div >
<label class=" font-weight-bold" for="idg">Gender?</label><br>
<select name="idg" id="idg">
    <option value="1"> FEMALE</option>
    <option value="2"> MALE</option>
</select>
</div>
<br><br>




  <div class="col-12" style="text-align:right">
  		<button type="reset" class="btn btn-secondary font-weight-bold">Reset</button>

		<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
  </div>
  <br><br>
    
    </form>
    </body>
    </html>
