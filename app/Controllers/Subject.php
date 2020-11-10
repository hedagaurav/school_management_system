<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Subject extends Controller
{

	public function index()
	{
		return view('subject/add');
	}

	public function sub_add()
	{
		$request = \Config\Services::request();
		print_r($request->getGet());
	}
}