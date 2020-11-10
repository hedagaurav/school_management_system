<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class StudentModel extends Model{
	protected $table = "tbl_students";
	protected $primaryKey = "id";

	protected $returnType = "array";
	//protected $useSoftDeletes = true;

	protected $allowedFields = ["student_name","student_email","student_dob","student_class",];

	public function getAllStudentsWithClassName(){
		$builder = $this->db->table($this->table);
		$builder->select($this->table.'.*,tbl_class.id as class_id,tbl_class.class_name');
		$builder->join('tbl_class','tbl_class.id = tbl_students.student_class');
		$query = $builder->get();
		return $query->getResultArray();
	}
	public function getStudentWithClass($id){

		$builder = $this->db->table($this->table);
		//$select = [tbl_class.id];
		$builder->select(
			'tbl_class.id as class_id,tbl_class.class_name, 
			tbl_students.id as student_id, tbl_students.student_name,
			tbl_students.student_email,tbl_students.student_dob,tbl_students.student_status');
		//$builder->from('tbl_subjects');
		$builder->join('tbl_class','tbl_class.id = tbl_students.student_class','left');
		//$builder->join('tbl_subjects','tbl_class.id = tbl_subjects.class_id','left');

		$builder->where('tbl_students.id',$id);
		$query = $builder->get();
		return $query->getRowArray();
	}

	public function getResult($id,$status){

		$builder = $this->db->table($this->table);
		$query = $builder->update(["student_status"=>$status],["id"=>$id]);
		return $query;
		//return $query->getResultArray();
	}


}