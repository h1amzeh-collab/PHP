-- im create table Users in database test in phpmyadmin
CREATE TABLE Users (
    user_id INT PRIMARY KEY,          
    user_name VARCHAR(50) NOT NULL,   
    email VARCHAR(100) UNIQUE,       
    city VARCHAR(50),                 
    is_subscriber BOOLEAN DEFAULT FALSE
);
 -- insert data into Users in database test in phpmyadmin
INSERT INTO Users (user_id, user_name, email, city, is_subscriber) VALUES
(1, 'Alice', 'alice@example.com', 'Amman', TRUE),
(2, 'Bob', 'bob@example.com', 'Irbid', FALSE),
(3, 'Charlie', 'charlie@example.com', 'Amman', TRUE),
(4, 'Dana', 'dana@example.com', 'Zarqa', FALSE),
(5, 'Eve', 'eve@example.com', 'Amman', TRUE),
(6, 'Frank', 'frank@example.com', 'Amman', FALSE),
(7, 'Grace', 'grace@example.com', 'Irbid', TRUE),
(8, 'Henry', 'henry@example.com', 'Amman', TRUE),
(9, 'Ian', 'ian@example.com', 'Zarqa', FALSE),
(10, 'Jack', 'jack@example.com', 'Amman', TRUE),
(11, 'Karen', 'karen@example.com', 'Madaba', FALSE),
(12, 'Leo', 'leo@example.com', 'Irbid', TRUE),
(13, 'Mia', 'mia@example.com', 'Amman', FALSE),
(14, 'Nora', 'nora@example.com', 'Zarqa', TRUE),
(15, 'Omar', 'omar@example.com', 'Amman', TRUE),
(16, 'Paul', 'paul@example.com', 'Irbid', FALSE),
(17, 'Quinn', 'quinn@example.com', 'Amman', TRUE),
(18, 'Rita', 'rita@example.com', 'Madaba', FALSE),
(19, 'Steve', 'steve@example.com', 'Amman', TRUE),
(20, 'Tina', 'tina@example.com', 'Zarqa', TRUE);

-- group by city and count users in each city having more than 5 users
-- retrieve city up 5 users
SELECT city, COUNT(*) 
FROM users
GROUP BY city
HAVING COUNT(*) > 5;

-- create Orders table in database test in phpmyadmin
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,  
    user_id INT,                               
    order_date DATE,                           
    total_amount DECIMAL(10,2),                
    FOREIGN KEY (user_id) REFERENCES Users(user_id)  -- link to Users table
);

-- retrieve all users who have not placed any orders
SELECT * FROM Users
LEFT JOIN Order ON
Users.user_id = Orders.user_id;
WHERE order_id IS NULL;  

-- calculate average order amount for each user in phpmyadmin
select Users.user_id ,AVG(Orders.total_amount) from Users
LEFT JOIN Orders ON
Users.user_id = Orders.user_id
GROUP BY Users.user_id , Orders.user_id;



-- List users who spent more than the average.
SELECT Users.user_id, SUM(Orders.total_amount) 
FROM Users 
JOIN Orders  ON Users.user_id = Orders.user_id
GROUP BY Users.user_id;
HAVING SUM(Orders.total_amount) > (SELECT AVG(total_amount) FROM Orders);


--Create a UNION between newsletter subscribers and registered users.
-- هذه تجلب المشتركين
SELECT user_name, email, 'Subscriber' as status
FROM users
WHERE is_subscriber = 1

UNION

-- هذه تجلب غير المشتركين
SELECT user_name, email, 'Not Subscriber' as status
FROM users
WHERE is_subscriber = 0;