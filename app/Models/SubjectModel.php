<?php namespace App\Models;

	use CodeIgniter\Model;

	class SubjectModel extends Model{
		protected $table = "tbl_subjects";
		protected $primaryKey = "id";

		protected $returnType = "array";
		protected $useSoftDeletes = false;

		protected $allowedFields = ["subject_name","passing_marks","maximum_marks","class_id"];

		public function getSubjectWithClass($class_id){
			$builder = $this->db->table($this->table);
			$builder->select('tbl_subjects.*,tbl_class.class_name');
			$builder->join('tbl_class','tbl_class.id = tbl_subjects.class_id');
			$builder->where('tbl_subjects.class_id',$class_id);
			$query = $builder->get();
			return $query->getResultArray();

		}
	}
