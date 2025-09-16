<!-- Database creating -->
CREATE DATABASE task_management;

<!-- Employer Table -->
CREATE TABLE employees(
	id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(200) DEFAULT '',
    full_name VARCHAR(50) DEFAULT '',
    fathers_name VARCHAR(50) DEFAULT '',
    present_address VARCHAR(200) DEFAULT '',
    permanent_address VARCHAR(200) DEFAULT '',
    contact_no VARCHAR(20) DEFAULT '',
    ssn_no VARCHAR(20) DEFAULT '',
    ssn_photo VARCHAR(200) DEFAULT '',
    itin_no VARCHAR(20) DEFAULT '',
    itin_photo VARCHAR(200) DEFAULT '',
    tin_no VARCHAR(20) DEFAULT '',
    tin_photo VARCHAR(200) DEFAULT '',
    nid_no VARCHAR(20) DEFAULT '',
    nid_photo VARCHAR(200) DEFAULT '',
    passport_no VARCHAR(20) DEFAULT '',
    passport_photo VARCHAR(200) DEFAULT '',
    driving_license_no VARCHAR(20) DEFAULT '',
    driving_license_photo VARCHAR(200) DEFAULT '',
    voter_id_no VARCHAR(20) DEFAULT '',
    voter_id_photo VARCHAR(200) DEFAULT '',
    e_full_name_one VARCHAR(50) DEFAULT '',
    e_full_relation_one VARCHAR(50) DEFAULT '',
    e_full_contact_one VARCHAR(20) DEFAULT '',
    e_full_name_two VARCHAR(50) DEFAULT '',
    e_full_relation_two VARCHAR(50) DEFAULT '',
    e_full_contact_two VARCHAR(20) DEFAULT '',
    e_full_name_three VARCHAR(50) DEFAULT '',
    e_full_relation_three VARCHAR(50) DEFAULT '',
    e_full_contact_three VARCHAR(20) DEFAULT '',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)