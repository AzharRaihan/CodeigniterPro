<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
    $this->load->helper('form');
		$this->load->model('Common_model', 'common');
	}




	public function employeeList()
	{
		$data['html_content'] = $this->load->view('employee/employee-list', '', TRUE);
		$this->load->view('index', $data);
	}



	public function fatchAllData()
	{
		$all_data = $this->common->getAllData('employees');
		echo json_encode(['status'=> 200, 'all_data'=> $all_data]);
	}


	public function employeeAddEdit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$response = [
				'ststus' => 'errors',
				'message' => validation_errors()
			];
		} else {
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$this->common->insertData('employees', $data);
			$response = [
				'status' => 'success',
				'message' => 'Data Successfully Saved',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function deleteEmployee($id)
	{
		if ($id) {
      $this->common->deleteData('employees', $id);
			$response = [
				'status' => 'success',
				'message' => 'Data Successfully Deleted',
			];
    } else {
      $response = [
				'status' => 404,
				'message' => 'Data Not Found',
			];
    }
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}




}



