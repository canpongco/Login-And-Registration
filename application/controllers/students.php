<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index() {
		$this->load->view('index');
	}

	public function get_student($email) {
		return $this->Student->get_student($email);
	}

	public function register() {
		$this->session->unset_tempdata('success');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('index');
		}else {
			$student_details['first_name'] = $this->input->post('first_name');
			$student_details['last_name'] = $this->input->post('last_name');
			$student_details['email'] = $this->input->post('email');
			$student_details['password'] = md5($this->input->post('password'));
			$add_student = $this->Student->add_student($student_details);

			if ($add_student == TRUE) {
				$this->session->set_tempdata('success', 'Successfully registered!', 1);
				redirect('/');
			}
		}
	}

	public function login_validation($email) {
		$student_details['email'] = $this->input->post('login_email');
		$student_details['password'] = md5($this->input->post('login_password'));

		$student = $this->get_student($email);

		if($student['password'] == $student_details['password'] && $student['email'] == $student_details['email']) {
			var_dump($student);
			$this->session->set_userdata('email', $student['email']);
			return TRUE;
		}else {
			$this->form_validation->set_message('login_validation', "Account doesn't exists.");
			return FALSE;
		}
	}

	public function login() {
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_rules('login_email', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('index');
		}else {
			$this->form_validation->set_rules('login_email', 'Email Address', 'callback_login_validation');

			if($this->form_validation->run() == FALSE) {
				$this->load->view('index');
			}else {
				redirect('students/log');
			}
		}
	}

	public function log() {
		$student['student'] = $this->get_student($this->session->userdata('email'));
		
		$this->load->view('login_page', $student);
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect('/');   
    }
}