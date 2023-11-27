DROP DATABASE `VNG`;
CREATE DATABASE `VNG`;

USE `VNG`;

CREATE TABLE Branch (
    branch_id INT PRIMARY KEY AUTO_INCREMENT,
    branch_name VARCHAR(255),
    location VARCHAR(255),
    employee_count INT
);

CREATE TABLE Employee (
    employee_id INT PRIMARY KEY AUTO_INCREMENT,
    employee_name VARCHAR(255),
    age INT,
    position VARCHAR(255),
    phone_number VARCHAR(15),
    description TEXT,
    department VARCHAR(255),
    gender VARCHAR(10),
    branch_id INT,
    FOREIGN KEY (branch_id) REFERENCES Branch(branch_id)
);

CREATE TABLE Article (
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content TEXT,
    time_published DATETIME,
    category VARCHAR(255),
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES Employee(employee_id)
);

CREATE TABLE Customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(255),
    age INT,
    email VARCHAR(255),
    gender VARCHAR(10)
);

CREATE TABLE Product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(255),
    date_added DATE,
    price DECIMAL(10, 2)
);


CREATE TABLE Comment (
    employee_id INT,
    article_id INT,
    content TEXT,
    time_commented DATETIME,
    PRIMARY KEY(employee_id, article_id, time_commented),
    FOREIGN KEY (employee_id) REFERENCES Employee(employee_id),
    FOREIGN KEY (article_id) REFERENCES Article(article_id)
);

CREATE TABLE Review (
    customer_id INT,
    article_id INT,
    rating INT,
    time_reviewed DATETIME,
    PRIMARY KEY (customer_id, article_id),
    FOREIGN KEY (customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY (article_id) REFERENCES Article(article_id)
);


CREATE TABLE CustomerComment (
    customer_id INT,
    article_id INT,
    content TEXT,
    time_commented DATETIME,
    PRIMARY KEY (customer_id, article_id, time_commented),
    FOREIGN KEY (customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY (article_id) REFERENCES Article(article_id)
);


CREATE TABLE Purchase (
    customer_id INT,
    product_id INT,
    purchase_date DATE,
    PRIMARY KEY (customer_id, product_id, purchase_date),
    FOREIGN KEY (customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id)
);





INSERT INTO Branch (branch_name, location, employee_count) VALUES
('Chi nhánh 1', 'Hanoi', 50),
('Chi nhánh 2', 'Ho Chi Minh City', 30);

INSERT INTO Employee (employee_name, age, position, phone_number, description, department, gender, branch_id) VALUES
('Nguyen Van A', 25, 'Manager', '0123456789', 'Quản lý chi nhánh', 'Management', 'Male', 1),
('Tran Thi B', 30, 'Staff', '0987654321', 'Nhân viên bán hàng', 'Sales', 'Female', 1);

INSERT INTO Article (title, content, time_published, category, author_id) VALUES
('Bài viết 1', 'Nội dung bài viết 1', NOW(), 'Tin tức', 1),
('Bài viết 2', 'Nội dung bài viết 2', NOW(), 'Thể thao', 2);

INSERT INTO Customer (customer_name, age, email, gender) VALUES
('Le Van C', 35, 'levanc@gmail.com', 'Male'),
('Pham Thi D', 28, 'phamthid@gmail.com', 'Female');

INSERT INTO Product (category, date_added, price) VALUES
('Điện thoại', '2023-01-01', 500),
('Laptop', '2023-02-15', 1200);

INSERT INTO Comment (employee_id, article_id, content, time_commented) VALUES
(1, 1, 'Bình luận 1', NOW()),
(2, 2, 'Bình luận 2', NOW());

INSERT INTO Review (customer_id, article_id, rating, time_reviewed) VALUES
(1, 1, 5, NOW()),
(2, 2, 4, NOW());

INSERT INTO CustomerComment (customer_id, article_id, content, time_commented) VALUES
(1, 2, 'Bình luận của khách hàng 1', NOW()),
(2, 1, 'Bình luận của khách hàng 2', NOW());

INSERT INTO Purchase (customer_id, product_id, purchase_date) VALUES
(1, 1, '2023-03-10'),
(2, 2, '2023-04-20');