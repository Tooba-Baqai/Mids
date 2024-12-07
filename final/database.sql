-- Use the correct database
USE new_pottery;

-- Drop the table if it exists (optional, for testing purposes)
DROP TABLE IF EXISTS pottery;

-- Create the table structure for 'pottery'
CREATE TABLE pottery (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  Num VARCHAR(12) NOT NULL,
  material ENUM('clay', 'ceramic') NOT NULL,
  address VARCHAR(255) NOT NULL,
  type ENUM('vase', 'ptry', 'clay plate', 'clay matka') NOT NULL,
  email VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY Num_unique (Num)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into 'pottery'
INSERT INTO pottery (name, Num, material, address, type, email) VALUES
('John Doe', 'G64190021', 'clay', '123 Street', 'vase', 'john@example.com');
