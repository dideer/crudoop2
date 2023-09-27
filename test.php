 <?php 

 include 'database.php';

 $obj=new query();

 $conditionArr=array('name'=>'Nshut','email'=>'nshuti@gmail.com');
 /*$result=$obj->getData('emp','*',$conditionArr,'','id','asc',7);
*/

 /*$insertResult=$obj->insertData('emp',$conditionArr);*/


/* $DeleteResult=$obj->DeleteData('emp',$conditionArr);*/

 $UpdateResult=$obj->UpdateData('emp',$conditionArr,'id',4);

  ?>