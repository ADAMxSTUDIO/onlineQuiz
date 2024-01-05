CREATE TABLE User (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    has_passed BOOLEAN
);

CREATE TABLE Quiz (
    id INT PRIMARY KEY,
    title VARCHAR(255),
    duration INT,
    professor_name VARCHAR(100),
    module_name VARCHAR(100)
);

CREATE TABLE Question (
    id INT PRIMARY KEY,
    content TEXT,
    grade INT,
    correct_answers INT,
    quiz_id INT,
    FOREIGN KEY (quiz_id) REFERENCES Quiz(id)
);

CREATE TABLE Answer (
    id INT PRIMARY KEY,
    content TEXT,
    is_correct BOOL,
    question_id INT,
    FOREIGN KEY (question_id) REFERENCES Question(id)
);

CREATE TABLE Record (
    id INT PRIMARY KEY,
    quiz_id INT,
    user_id INT, -- Assuming a user_id field to identify the user who took the quiz
    score INT,
    completion_time DATETIME, -- To track when the quiz was completed
    FOREIGN KEY (quiz_id) REFERENCES Quiz(id)
);
