<?php namespace App\Controllers;

use \App\Models\SubjectModel;
use \App\Models\SectionModel;
class Section extends BaseController{

	// this is the Class for the student
	public function index()
	{
		$data = [
			'title'=>'Class Dashboard',
		];
		$section = new SectionModel();
		//$data['classdata'] = $section->getAllSectionWithSubjects();
		$data['classdata'] = $section->find();
		return view('section\home',$data);

	}

	public function create()
	{
		$data = [];
		helper(['form', 'url']);

		if($this->request->getMethod() == "post"){
			$formdata = $this->request->getPost();
			$sub_list=[];

			// create subject list array.
			foreach ($formdata['subject'] as $sub){
				array_push($sub_list,$sub['subject_name']);
			}

			// insert class with subject id in class table.
			$class_data = [
				'class_name'=>$formdata['section'],
				'list_of_sub'=>implode(',',$sub_list),
			];

			$section = new SectionModel();
			$section->insert($class_data);
			$section_id = $section->getInsertID();

			// insert subjects in to the subject table.
			$subject = new SubjectModel();
			for ($i=0;$i<count($formdata['subject']);$i++) {
				$formdata['subject'][$i]['class_id']=$section_id;
			}

			$subject->insertBatch($formdata['subject']);

			//exit();
			return redirect()->to(base_url('section'))->with('success','Class and Subjects added.');
		}
		view:
		return view('section/create',$data);
	}

	public function edit($id)
	{
		$data = [
			'id'=>$id,
		];
		return view('section\edit',$data);

	}
	public function delete($id)
	{
		$class = new SectionModel();
		if ($class->find($id)) {
			$class->delete($id);
			return redirect()->to(base_url('section'))->with('success', 'Class Deleted Successfully.');
		}
		return redirect()->to(base_url('section'))->with('warning',"Please check what are you trying to delete");
	}
}