<!-- Database creating -->
CREATE DATABASE task_management;

<!-- Employer Table -->
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Personal Details
    profile_image VARCHAR(255),
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    fathers_name VARCHAR(150) NOT NULL,
    
    -- Present Address
    present_street1 VARCHAR(255) NOT NULL,
    present_street2 VARCHAR(255),
    present_city VARCHAR(100) NOT NULL,
    present_state VARCHAR(100) NOT NULL,
    present_zipcode VARCHAR(20) NOT NULL,
    present_country VARCHAR(100) DEFAULT 'USA',
    
    -- Permanent Address
    permanent_street1 VARCHAR(255) NOT NULL,
    permanent_street2 VARCHAR(255),
    permanent_city VARCHAR(100) NOT NULL,
    permanent_state VARCHAR(100) NOT NULL,
    permanent_zipcode VARCHAR(20) NOT NULL,
    permanent_country VARCHAR(100) DEFAULT 'USA',
    
    -- Contact Info
    contact_number VARCHAR(20) NOT NULL,
    
    -- Essential Documents
    passport_no VARCHAR(50),
    passport_photo VARCHAR(255),
    driving_license_no VARCHAR(50),
    driving_license_front VARCHAR(255),
    driving_license_back VARCHAR(255),
    voter_card_no VARCHAR(50),
    voter_card_front VARCHAR(255),
    voter_card_back VARCHAR(255),
    
    -- Personal Identification
    ssn_no VARCHAR(50),
    ssn_photo VARCHAR(255),
    itin_no VARCHAR(50),
    itin_photo VARCHAR(255),
    
    -- Emergency Contacts
    e_full_name_one VARCHAR(150) NOT NULL,
    e_full_relation_one VARCHAR(100) NOT NULL,
    e_full_contact_one VARCHAR(20) NOT NULL,
    
    e_full_name_two VARCHAR(150),
    e_full_relation_two VARCHAR(100),
    e_full_contact_two VARCHAR(20),
    
    e_full_name_three VARCHAR(150),
    e_full_relation_three VARCHAR(100),
    e_full_contact_three VARCHAR(20),
    
    -- Meta
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

<!-- Employee log -->
 CREATE TABLE employee_log(
	id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id VARCHAR(10) NOT NULL,
    password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
)