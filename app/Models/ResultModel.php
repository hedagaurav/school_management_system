<?php namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model{
	protected $table = "tbl_result";
	protected $primaryKey = "result_id";

	protected $returnType = "array";
	//protected $useSoftDeletes = true;

	protected $allowedFields = ["student_id","class_id","subject_id","marks_obtained"];
	protected $useTimestamps = false;


	// this will get the student result without the status.
	public function generateResultForStudnet($id){

		$builder = $this->db->table($this->table);
		$builder->select('
			tbl_students.id as student_id,tbl_students.student_name,tbl_students.student_dob,
			tbl_students.student_email,
			tbl_class.class_name,
			tbl_subjects.id as subject_id,tbl_subjects.subject_name,tbl_subjects.passing_marks,
			tbl_subjects.maximum_marks,
			tbl_result.marks_obtained,tbl_students.student_status,			
		');
		$builder->join('tbl_class','tbl_class.id = tbl_result.class_id');
		$builder->join('tbl_subjects','tbl_subjects.id = tbl_result.subject_id');
		$builder->join('tbl_students','tbl_students.id = tbl_result.student_id');
		$builder->where('tbl_result.student_id',$id);
		$query = $builder->get();
		return $query->getResultArray();
	}
}