 <?php 

 include 'database.php';
 $obj=new query();

 	if (isset($_GET['type']) && $_GET['type']=='delete') {
 		# code...
 		$id=$obj->get_safe_str($_GET['id']);


 $conditionArr=array('id'=>$id);

 		$obj->DeleteData('emp',$conditionArr);
 	}

 $result=$obj->getData('emp','*','','','id','desc','');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<a href='AddUser.php'>Add User</a>



<table>

<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Email</th>
	<th colspan="2">option</th>
</tr>	

<?php 

	if (isset($result['0'])) {
		# code...
			$id=1;
		foreach ($result as $list) {
			# code...
	

 ?>
<tr>
	<td><?php 	echo $id; ?></td>
	<td><?php 	echo $list['name']; ?></td>	
	<td><?php 	echo $list['email']; ?></td>	
	<td><a href="AddUser.php?id=<?php 	echo $list['id'] ?>">Edit</a></td>	
	<td><a href="?type=delete&id=<?php 	echo $list['id'] ?>">delete</a></td>	

</tr>
<?php 
		$id++;
		}

		
 }else{ ?>

	<tr>
		<td colspan="4" align="center">No Record Found</td>
	</tr>
<?php } ?>
</table>




</body>
</html>