CREATE TABLE transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    payment_type VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    customer_id INT NOT NULL,   
    receiver_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (receiver_id) REFERENCES customers(id)
);

