<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model {
    function get_student($email) {
        return $this->db->query("SELECT * FROM students WHERE email = ?", array($email))->row_array();
    }

    function add_student($student_details) {
        $query = "INSERT INTO students (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($student_details['first_name'], $student_details['last_name'], $student_details['email'], $student_details['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
}