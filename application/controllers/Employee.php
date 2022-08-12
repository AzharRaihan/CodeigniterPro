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


	/**
	 * Employee List Method
	 * Param 'No',
	 * return $data
	 */
	public function employeeList()
	{
		$data['title'] = 'Home Page';
		$data['html_content'] = $this->load->view('employee/employee-list', '', TRUE);
		$this->load->view('index', $data);
	}
	/**
	 * Fatch All Data
	 * Param 'No',
	 * return $all_data
	 */
	public function fatchAllData()
	{
		$all_data = $this->common->getAllData('employees');
		echo json_encode(['status'=> 200, 'all_data'=> $all_data]);
	}
	/**
	 * Employee Add Edit
	 * Param $d = '',
	 * return $response
	 */
	public function employeeAddEdit($id = '')
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('employee_id', 'Employee Id', 'required|is_unique[employees.employee_id]');
		if ($id == TRUE) {
			if ($this->form_validation->run() == FALSE) {
				$response = [
					'ststus' => 'errors',
					'message' => validation_errors()
				];
			} else {
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['gender'] = $this->input->post('gender');
				$data['employee_id'] = $this->input->post('employee_id');
				$this->common->updateData($data, $id, 'employees');
				$response = [
					'status' => 'success',
					'message' => 'Data Successfully Saved',
				];
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			if ($this->form_validation->run() == FALSE)
			{
				$response = [
					'ststus' => 'errors',
					'message' => validation_errors()
				];
			} else {
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['gender'] = $this->input->post('gender');
				$data['employee_id'] = $this->input->post('employee_id');
				$this->common->insertData('employees', $data);
				$response = [
					'status' => 'success',
					'message' => 'Data Successfully Saved',
				];
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}

		
	}
	/**
	 * Edit
	 * Param 'No',
	 * return $response
	 */
	public function employeeEdit($id){
    $data = $this->common->editData($id, 'employees');
		$response = [
			'status' => 'success',
			'data' => $data,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	/**
	 * Delete
	 * Param $id,
	 * return $response
	 */
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
	/**
	 * Generate Employee Id
	 * Param $id,
	 * return $response
	 */
	public function employeeIdGenerate($param)
	{
		// $gender = htmlspecialchars($this->input->post($this->security->xss_clean('gender')));

		$counts = $this->db->query("SELECT count(*) as counts 
			FROM employees 
			WHERE employee_id = '$param' ")->row('counts');
		if($param == 'M'){
			$genEmpId = 'M-'.str_pad($counts + 1, 6, '0', STR_PAD_LEFT);   
		}elseif($param == 'F'){
			$genEmpId = 'F-'.str_pad($counts + 1, 6, '0', STR_PAD_LEFT);
		}
		else{
			$genEmpId = 'O-'.str_pad($counts + 1, 6, '0', STR_PAD_LEFT);
		}
		$response = [
			'status' => 200,
			'data' => $genEmpId,
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



}



