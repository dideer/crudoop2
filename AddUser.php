<?php 	

 include 'database.php';
 $obj=new query();



$name='';
$email='';
$id='';

 	if (isset($_GET['id']) && $_GET['id']!='') {
 		# code...
 		$id=$obj->get_safe_str($_GET['id']);
 		$conditionArr=array('id'=>$id);
 		$result=$obj->getData('emp','*',$conditionArr,'','','','');

 		 $name=$result['0']['name'];
 		 $email=$result['0']['email'];

 	}







 	if (isset($_POST['add'])) {
 		# code...

 		
 		$name=$obj->get_safe_str($_POST['name']);
 		$email=$obj->get_safe_str($_POST['email']);


 		$conditionArr=array('name'=>$name,'email'=>$email);
 			if ($id=='') {
 				# code...
 				$obj->insertData('emp',$conditionArr);

 			}
 			else{
 				$obj->UpdateData('emp',$conditionArr,'id',$id);
 			}

 		


 		header('location:display.php');

 		?>
 		<script>
 			window.location.href='display.php';
 		</script>
 		<?php
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<form method="POST">	

<h3>Namess</h3>
<input type="text" name="name" value="<?php echo $name ?>">

<h3>Email</h3>
<input type="text" name="email" value="<?php echo $email ?>">


<br>
<br>
 
<button type="submit" name="add">Update</button>
</form>
</body>
</html>