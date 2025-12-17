CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  dob DATE,
  pin_hash VARCHAR(255),
  role ENUM('borrower','financier','agent','admin') NOT NULL,
  status ENUM('active','inactive','blocked') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE borrower_profiles (
  user_id INT PRIMARY KEY,
  address TEXT,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE financier_profiles (
  user_id INT PRIMARY KEY,
  address TEXT,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE agents (
  user_id INT PRIMARY KEY,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE admins (
  user_id INT PRIMARY KEY,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE agents (
  user_id INT PRIMARY KEY,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE admins (
  user_id INT PRIMARY KEY,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


CREATE TABLE loan_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  borrower_id INT NOT NULL,
  amount DECIMAL(12,2) NOT NULL,
  term INT NOT NULL,
  interest_rate DECIMAL(5,2),
  monthly_income DECIMAL(10,2),
  employment_status VARCHAR(50),
  company_name VARCHAR(100),
  experience_years INT,
  description TEXT,
  status ENUM('pending','verified','approved','rejected','funded') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (borrower_id) REFERENCES users(id)
);



CREATE TABLE documents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  loan_request_id INT NULL,
  doc_type VARCHAR(50),
  title VARCHAR(100),
  file_path VARCHAR(255),
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (loan_request_id) REFERENCES loan_requests(id)
);


CREATE TABLE wishlists (
  financier_id INT,
  loan_request_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (financier_id, loan_request_id),
  FOREIGN KEY (financier_id) REFERENCES users(id),
  FOREIGN KEY (loan_request_id) REFERENCES loan_requests(id)
);


CREATE TABLE plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plan_name VARCHAR(50),
  monthly_price DECIMAL(8,2),
  limits TEXT
);


CREATE TABLE subscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  financier_id INT NOT NULL,
  plan_id INT NOT NULL,
  start_date DATE,
  end_date DATE,
  status ENUM('active','expired','cancelled') DEFAULT 'active',
  FOREIGN KEY (financier_id) REFERENCES users(id),
  FOREIGN KEY (plan_id) REFERENCES plans(id)
);



CREATE TABLE faqs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question TEXT,
  answer TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE terms_conditions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content TEXT,
  version VARCHAR(20),
  published_at DATE
);
