<?php 
interface BluePrint_model{
	public function getAllData();
	public function insertData($data);
	public function updateData($id, $data);
	public function deleteData($id);

	public function checkExistById($id);
	public function getTotalRows();

}
?>