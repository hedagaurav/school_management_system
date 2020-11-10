<?php namespace App\Controllers;

use App\Models\ResultModel;
use App\Models\SectionModel;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use CodeIgniter\Controller;

class Student extends Controller{

	public function index(){
		$student = new StudentModel();
		$data['students'] = $student->getAllStudentsWithClassName();
		//echo "<pre>";
		//print_r ($data);
		//echo "</pre>";

		return view('student/home',$data);
	}

	public function register(){
		$data = [];
		if ($this->request->getMethod() == 'post'){
			$form_data = $this->request->getPost();
			if (!empty($form_data)){
				foreach ($form_data as $key => $value){
					if(empty(trim($form_data[$key]))){
						echo $key." is empty.<br>";
						goto view;
					}
				}
			} else{
				//print_r($form_data);
				goto view;
			}
			//echo "<pre>";
			//print_r ($form_data);
			//echo "</pre>";

			$student = new StudentModel();
			$student->insert($form_data);
			echo "student registered.";

			//exit("data saved");
			return redirect()->to(base_url('student'))->with('success','Studnet Registered Successfully.');
		} else {

		view:
			$section = new SectionModel();
			$section_table_data = $section->find();

			if(empty($section_table_data)){
				return redirect()->to(base_url('section'))->with('warning',"Please Create one or more Class before Registering student.");
			}
			$data["section"] = $section_table_data;
			return view('student/register',$data);
		}
	}

	public function grade(){

		if($this->request->getMethod() == 'post'){
			$formdata = $this->request->getPost();
			//echo "<pre>";
			//print_r($formdata);
			//echo "</pre>";

			$tabledata = [];
			for($i=0;$i<count($formdata['subject_id']);$i++){
				array_push($tabledata,
					[
						"student_id" => $formdata['student_id'],
						"class_id" => $formdata['class_id'],
						"subject_id"=> $formdata['subject_id'][$i],
						"marks_obtained"=> $formdata['marks_obtained'][$i],
					]
				);
			}
			echo "<pre>";
			print_r ($tabledata);
			echo "</pre>";

			//$student_id = $this->request->uri->getSegment(3);
			//exit('before inserting');

			$result = new ResultModel();
			$result->insertBatch($tabledata);

			//exit('after inserting');
			return redirect()->to(base_url('student'))->with('success','Student Exams are Graded.');
		} else{

		$student = new StudentModel();
		$subject = new SubjectModel();

		$student_id = $this->request->uri->getSegment(3);
		$class_id = $this->request->uri->getSegment(5);
		$data['student'] = $student->getStudentWithClass($student_id);
		$data['subjects'] = $subject->getSubjectWithClass($class_id);

		}
		view:
		return view('student/grade',$data);
	}

	public function result(){
		$data['title'] = "Student Result";
		$student_id = $this->request->uri->getSegment(3);
		// get student details.
		$student = new StudentModel();
		$record = $student->getWhere(['id'=>$student_id],1)->getRowArray();

		if(!empty($record)){
			//echo "student found<br>";
			$result = new ResultModel();
			// check if student status is set or not
			if(!isset($record['student_status'])){
				//echo "status not set calculate result<br>";
				//exit();
				// get all subjects marks and calculate result.
				$raw_sub_data = $result->generateResultForStudnet($student_id);

				$total_sub = count($raw_sub_data);
				$passed_sub = 0;
				for($i=0;$i<count($raw_sub_data);$i++){
					if($raw_sub_data[$i]['marks_obtained'] >= $raw_sub_data[$i]['passing_marks']){
						$passed_sub++;
					}
				}
				$percent = ($passed_sub/$total_sub)*100;

				// update student status : pass or fail
				$status = $percent >= 50 ? "pass" : "fail" ;
				$student->getResult($student_id,$status);
				//echo "<br>Student status updated";
			}
			//	print result
			$record = $student->getStudentWithClass($student_id);
			$data['result']=$record;

		} else{
			echo("student not found");
			return redirect()->to(base_url('student'));
		}
		return view('student/result',$data);
	}

	public function edit($id)
	{
		$data = [
			'id'=>$id,
		];
		return view('student\edit',$data);

	}

	public function delete($id)
	{
		$student = new StudentModel();

		if ($student->find($id)) {
		//	exit();
			$student->delete($id);
			return redirect()->to(base_url('student'))->with('success', 'Student Deleted Successfully.');
		}
		return redirect()->to(base_url('student'))->with('warning',"Please check what are you trying to delete");
	}
}