CREATE DATABASE budget_manager;

USE budget_manager;

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Primary key: unique ID for each transaction
    transaction_date DATE NOT NULL,            -- Date of the transaction
    check_number VARCHAR(50),                  -- Optional check number
    description VARCHAR(255) NOT NULL,         -- Transaction description
    amount DECIMAL(10, 2) NOT NULL,            -- Amount (negative for expenses, positive for income)
    transaction_type ENUM('income', 'expense') NOT NULL  -- Type of transaction: 'income' or 'expense'
);

-- Dummy Data

-- INSERT INTO transactions (transaction_date, check_number, description, amount, transaction_type)
-- VALUES
-- ('2024-09-01', '12345', 'Grocery Shopping', -50.75, 'expense'),  -- Expense example
-- ('2024-09-03', NULL, 'Freelance Work Payment', 500.00, 'income'), -- Income example (no check number)
-- ('2024-09-05', '67890', 'Utility Bill Payment', -100.00, 'expense');  -- Expense with check number
