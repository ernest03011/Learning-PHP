CREATE DATABASE budget_manager;

USE budget_manager;

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Primary key: unique ID for each transaction
    transaction_date DATE NOT NULL,            -- Date of the transaction
    check_number VARCHAR(50),                  -- Optional check number
    description VARCHAR(255) NOT NULL,         -- Transaction description
    amount DECIMAL(10, 2) NOT NULL             -- Amount (negative for expenses, positive for income)
);
