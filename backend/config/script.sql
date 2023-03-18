CREATE TABLE Courses
(
    Course_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Course_name VARCHAR(100),
    Course_description VARCHAR(100),
    Course_distance INT,
    Course_note INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Steps
(
    Step_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Step_name VARCHAR(100),
   	Step_longitude float,
    Step_latitude float,
    Course_id INT,
    FOREIGN KEY (Course_id) REFERENCES Courses(Course_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Reviews
(
    Review_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Review_date DATE,
   	Review_Message VARCHAR(255),
    Course_id INT,
    FOREIGN KEY (Course_id) REFERENCES Courses(Course_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Pictures
(
    Picture_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Picture_name VARCHAR(100),
   	Picture_description VARCHAR(100),
    Course_id INT,  
    FOREIGN KEY (Course_id) REFERENCES Courses(Course_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Categories
(
    Category_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Category_name VARCHAR(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE CoursesCategories (
    Course_id INT NOT NULL,
    Category_id INT NOT NULL,
    PRIMARY KEY (Course_id, Category_id),
    FOREIGN KEY (Course_id) REFERENCES Courses(Course_id),
    FOREIGN KEY (Category_id) REFERENCES Categories(Category_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Users
(
    User_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    User_firstName VARCHAR(100),
    User_lastName VARCHAR(100),
    User_email VARCHAR(100),
    User_password VARCHAR(100),
    User_creationDate DATE,
    User_bio VARCHAR(255),
    User_icon VARCHAR(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE UsersCourses (
    Course_id INT NOT NULL,
    User_id INT NOT NULL,
    UsersCourses_date DATE,
    PRIMARY KEY (Course_id, User_id),
    FOREIGN KEY (Course_id) REFERENCES Courses(Course_id),
    FOREIGN KEY (User_id) REFERENCES Users(User_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Partners
(
    Partner_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Partner_name VARCHAR(100),
    Partner_description VARCHAR(100),
    Partner_date DATE,
    Partner_longitude float,
    Partner_latitude float
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
