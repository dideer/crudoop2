<?php 

class database{


	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;


	protected function connect(){

		$this->host='localhost';
		$this->dbusername='root';
		$this->dbpassword='';
		$this->dbname='crud';

		$con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);

		return $con;

	}
}

class query extends database{
	public function getData($table,$field='*',$conditionArr='',$like='',$order_by_field='',$order_by_type='',$limit){
		$sql="SELECT * from $table";

		if ($conditionArr!='') {
			# code...
			$sql.=' where ';
			$c=count($conditionArr);
			$i=1;

			foreach ($conditionArr as $key => $value) {

				if ($i==$c) {
					# code...
					$sql.="$key='$value' ";
				}
				else{
				# code...
				$sql.="$key='$value' and ";
					
				}
				$i++;
			}
		}


		if ($order_by_field!='') {
			# code...
			$sql.=" order by $order_by_field $order_by_type ";
		}

		if ($limit!='') {
			# code...
			$sql.=" limit $limit ";
		}


		$result=$this->connect()->query($sql);

		if ($result->num_rows>0) {
			# code...
			$arr=array();
			while ($row=$result->fetch_assoc()) {
				# code...
				$arr[]=$row;
			}
			return $arr;
		}
		else{
			return 0;
		}


	}




	public function insertData($table,$conditionArr=''){

		if ($conditionArr!='') {
			# code...

			foreach($conditionArr as $key => $value) {
				# code...
				$fieldArr[]=$key;
				$valueArr[]=$value;

			}

			$field=implode(",",$fieldArr);
			$val=implode("','",$valueArr);

			$val="'".$val."'";

			$sql="INSERT INTO $table ($field) values($val) ";
			$insertResult=$this->connect() ->query($sql);


		}

	}





	public function DeleteData($table,$conditionArr=''){

		if ($conditionArr!='') {
			# code...

			$sql="DELETE from $table where ";

			$c=count($conditionArr);
			$i=1;

			foreach ($conditionArr as $key => $value) {

				if ($i==$c) {
					# code...
					$sql.="$key='$value' ";
				}
				else{
				# code...
				$sql.="$key='$value' and ";
					
				}
				$i++;
			}





			$DeleteResult=$this->connect() ->query($sql);


		}

	}





	public function UpdateData($table,$conditionArr,$where_field,$where_value){

		if ($conditionArr!='') {
			# code...

			$sql="UPDATE $table set ";

			$c=count($conditionArr);
			$i=1;

			foreach ($conditionArr as $key => $value) {

				if ($i==$c) {
					# code...
					$sql.="$key='$value' ";
				}
				else{
				# code...
				$sql.="$key='$value' , ";
					
				}
				$i++;
			}



			$sql.=" where $where_field='$where_value' ";

		 $sql;

			$UpdateResult=$this->connect() ->query($sql);


		}

	}





		public function get_safe_str($str)
		{
			# code...

			if ($str!='') {
				# code...
				return mysqli_real_escape_string($this->connect(),$str);
			}
		}






}








 ?>