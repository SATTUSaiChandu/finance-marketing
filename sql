-- CREATE TABLE users (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   name VARCHAR(100) NOT NULL,
--   email VARCHAR(150) UNIQUE NOT NULL,
--   password_hash VARCHAR(255) NOT NULL,
--   dob DATE,
--   pin_hash VARCHAR(255),
--   role ENUM('borrower','financier','agent','admin') NOT NULL,
--   status ENUM('active','inactive','blocked') DEFAULT 'active',
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );



-- CREATE TABLE borrower_profiles (
--   user_id INT PRIMARY KEY,
--   address TEXT,
--   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- );


-- CREATE TABLE financier_profiles (
--   user_id INT PRIMARY KEY,
--   address TEXT,
--   FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- );


-- CREATE TABLE agents (
--   user_id INT PRIMARY KEY,
--   FOREIGN KEY (user_id) REFERENCES users(id)
-- );

-- CREATE TABLE admins (
--   user_id INT PRIMARY KEY,
--   FOREIGN KEY (user_id) REFERENCES users(id)
-- );


-- CREATE TABLE agents (
--   user_id INT PRIMARY KEY,
--   FOREIGN KEY (user_id) REFERENCES users(id)
-- );

-- CREATE TABLE admins (
--   user_id INT PRIMARY KEY,
--   FOREIGN KEY (user_id) REFERENCES users(id)
-- );


-- CREATE TABLE loan_requests (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   borrower_id INT NOT NULL,
--   amount DECIMAL(12,2) NOT NULL,
--   term INT NOT NULL,
--   interest_rate DECIMAL(5,2),
--   monthly_income DECIMAL(10,2),
--   employment_status VARCHAR(50),
--   company_name VARCHAR(100),
--   experience_years INT,
--   description TEXT,
--   status ENUM('pending','verified','approved','rejected','funded') DEFAULT 'pending',
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   FOREIGN KEY (borrower_id) REFERENCES users(id)
-- );



-- CREATE TABLE documents (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   user_id INT NOT NULL,
--   loan_request_id INT NULL,
--   doc_type VARCHAR(50),
--   title VARCHAR(100),
--   file_path VARCHAR(255),
--   uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   FOREIGN KEY (user_id) REFERENCES users(id),
--   FOREIGN KEY (loan_request_id) REFERENCES loan_requests(id)
-- );


-- CREATE TABLE wishlists (
--   financier_id INT,
--   loan_request_id INT,
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (financier_id, loan_request_id),
--   FOREIGN KEY (financier_id) REFERENCES users(id),
--   FOREIGN KEY (loan_request_id) REFERENCES loan_requests(id)
-- );


-- CREATE TABLE plans (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   plan_name VARCHAR(50),
--   monthly_price DECIMAL(8,2),
--   limits TEXT
-- );


-- CREATE TABLE subscriptions (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   financier_id INT NOT NULL,
--   plan_id INT NOT NULL,
--   start_date DATE,
--   end_date DATE,
--   status ENUM('active','expired','cancelled') DEFAULT 'active',
--   FOREIGN KEY (financier_id) REFERENCES users(id),
--   FOREIGN KEY (plan_id) REFERENCES plans(id)
-- );



-- CREATE TABLE faqs (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   question TEXT,
--   answer TEXT,
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );



-- CREATE TABLE terms_conditions (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   content TEXT,
--   version VARCHAR(20),
--   published_at DATE
-- );


-- ===============================
-- DATABASE
-- ===============================
CREATE DATABASE IF NOT EXISTS financehub
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE financehub;

-- ===============================
-- USERS (AUTH CORE)
-- ===============================
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  dob DATE NULL,
  pin_hash VARCHAR(255) NULL,
  role ENUM('borrower','financier','agent','admin') NOT NULL,
  status ENUM('active','inactive','blocked') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_role (role),
  INDEX idx_status (status)
);

-- ===============================
-- BORROWER PROFILE
-- ===============================
CREATE TABLE borrower_profiles (
  user_id INT PRIMARY KEY,
  address TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_borrower_user
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- ===============================
-- FINANCIER PROFILE
-- ===============================
CREATE TABLE financier_profiles (
  user_id INT PRIMARY KEY,
  address TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_financier_user
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- ===============================
-- LOAN REQUESTS
-- ===============================
CREATE TABLE loan_requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  borrower_id INT NOT NULL,
  amount DECIMAL(12,2) NOT NULL,
  term INT NOT NULL,
  interest_rate DECIMAL(5,2) NULL,
  monthly_income DECIMAL(10,2) NULL,
  employment_status VARCHAR(50) NULL,
  company_name VARCHAR(100) NULL,
  experience_years INT NULL,
  description TEXT NULL,
  status ENUM('pending','verified','approved','rejected','funded') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_borrower (borrower_id),
  INDEX idx_status (status),
  CONSTRAINT fk_loan_borrower
    FOREIGN KEY (borrower_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

-- ===============================
-- DOCUMENTS
-- ===============================
CREATE TABLE documents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  loan_request_id INT NULL,
  doc_type VARCHAR(50),
  title VARCHAR(100),
  file_path VARCHAR(255) NOT NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_user (user_id),
  INDEX idx_loan (loan_request_id),
  CONSTRAINT fk_document_user
    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_document_loan
    FOREIGN KEY (loan_request_id)
    REFERENCES loan_requests(id)
    ON DELETE SET NULL
);

-- ===============================
-- WISHLIST (FINANCIER ↔ LOANS)
-- ===============================
CREATE TABLE wishlists (
  financier_id INT NOT NULL,
  loan_request_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (financier_id, loan_request_id),
  CONSTRAINT fk_wishlist_financier
    FOREIGN KEY (financier_id)
    REFERENCES users(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_wishlist_loan
    FOREIGN KEY (loan_request_id)
    REFERENCES loan_requests(id)
    ON DELETE CASCADE
);

-- ===============================
-- SUBSCRIPTION PLANS
-- ===============================
CREATE TABLE plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plan_name VARCHAR(50) NOT NULL,
  monthly_price DECIMAL(8,2) NOT NULL,
  limits TEXT NULL
);

-- ===============================
-- SUBSCRIPTIONS
-- ===============================
CREATE TABLE subscriptions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  financier_id INT NOT NULL,
  plan_id INT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  status ENUM('active','expired','cancelled') DEFAULT 'active',
  CONSTRAINT fk_subscription_user
    FOREIGN KEY (financier_id)
    REFERENCES users(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_subscription_plan
    FOREIGN KEY (plan_id)
    REFERENCES plans(id)
    ON DELETE RESTRICT
);

-- ===============================
-- FAQ
-- ===============================
CREATE TABLE faqs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question TEXT NOT NULL,
  answer TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===============================
-- TERMS & CONDITIONS
-- ===============================
CREATE TABLE terms_conditions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content TEXT NOT NULL,
  version VARCHAR(20) NOT NULL,
  published_at DATE NOT NULL
);




ALTER TABLE users
ADD first_name VARCHAR(100),
ADD last_name VARCHAR(100);

CREATE TABLE loan_matches (
  id INT AUTO_INCREMENT PRIMARY KEY,

  loan_request_id INT NOT NULL,
  financier_id INT NOT NULL,

  status ENUM('requested','accepted','rejected') 
    DEFAULT 'requested',

  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  responded_at TIMESTAMP NULL,

  UNIQUE KEY uniq_match (loan_request_id, financier_id),

  CONSTRAINT fk_match_loan
    FOREIGN KEY (loan_request_id)
    REFERENCES loan_requests(id)
    ON DELETE CASCADE,

  CONSTRAINT fk_match_financier
    FOREIGN KEY (financier_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

ALTER TABLE loan_requests
DROP COLUMN status;

ALTER TABLE users DROP COLUMN name;

ALTER TABLE loan_requests DROP COLUMN status;


CREATE TABLE investments (
  id INT AUTO_INCREMENT PRIMARY KEY,

  loan_request_id INT NOT NULL,
  financier_id INT NOT NULL,
  borrower_id INT NOT NULL,

  amount DECIMAL(12,2) NOT NULL,
  interest_rate DECIMAL(5,2) NULL,
  term INT NOT NULL,

  status ENUM('active','completed','defaulted') DEFAULT 'active',

  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT fk_investment_loan
    FOREIGN KEY (loan_request_id)
    REFERENCES loan_requests(id)
    ON DELETE CASCADE,

  CONSTRAINT fk_investment_financier
    FOREIGN KEY (financier_id)
    REFERENCES users(id)
    ON DELETE CASCADE,

  CONSTRAINT fk_investment_borrower
    FOREIGN KEY (borrower_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


INSERT INTO loan_matches (loan_request_id, financier_id)
VALUES (?, ?);


ALTER TABLE faqs
ADD COLUMN admin_id INT,
ADD CONSTRAINT fk_faqs_admin
FOREIGN KEY (admin_id) REFERENCES users(id);

ALTER TABLE terms_conditions
ADD COLUMN admin_id INT,
ADD CONSTRAINT fk_terms_admin
FOREIGN KEY (admin_id) REFERENCES users(id);
