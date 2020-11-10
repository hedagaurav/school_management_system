<?php namespace App\Models;

use CodeIgniter\Model;

class SectionModel extends Model{
	// class is called as section.
	protected $table = "tbl_class";
	protected $primaryKey = "id";

	protected $returnType = "array";
	//protected $useSoftDeletes = true;

	protected $allowedFields = ['class_name','list_of_sub'];

	protected $useTimestamps = false;
	protected $createdField = "created_at";
	protected $updatedField = "updated_at";
	protected $deletedField = "deleted_at";

	public function getAllSectionWithSubjects(){
		$builder = $this->db->table($this->table);
		//$builder->select();
		$builder->join('tbl_subjects','tbl_subjects.id = tbl_class.id');
		$result = $builder->get();
		return $result->getResultArray();
	}


}