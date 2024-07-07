# tailwebs-teacher-portal

A robust teacher portal built with PHP, featuring login functionality, student management, and the ability to add new students.

## Features

- **Login Functionality**: login for teachers.
- **Student Management**: List, edit, and delete student records.
- **Add New Student**: Add new students with modal form and validation.
- **Inline Editing**: Edit student details inline with validation.

## Technology Stack

- **Front-end**: HTML, CSS, JavaScript (vanilla)
- **Back-end**: PHP, MySQL

## Getting Started

Follow these instructions to set up the project locally.

### Prerequisites

- PHP 7.4 or higher
- MySQL
- Web server (e.g., Apache, Nginx)

### Installation

1. **Clone the repository**:

    ```sh
    git clone https://github.com/satish-singh-devbha/tailwebs-teacher-portal
    cd tailwebs-teacher-portal
    ```

2. **Set up the database**:

    - Import the database schema:

        ```sh
        mysql -u your-username -p tailwebs-teacher-portal < database/tailwebs-teacher-portal.sql
        ```

3. **Configure the application**:

    - Update the `config.php` file with your database credentials


4. **Set up the web server**:

    - Make sure your web server is set up to serve the files from the `tailwebs-teacher-portal` directory.
    - For Apache, you might need to configure a virtual host.

5. **Run the application**:

    - Open your web browser and navigate to `http://localhost/tailwebs-teacher-portal`.

### Usage

- **Login**: Use the login credentials provided in the `teacher` table of the database. username: teacher, password: 12345678
- **Student Management**: Add, edit, and delete student records through the teacher portal interface.

### File Structure

teacher-portal/
- ├──auth/
│ └── login.php
│ └── logout.php
├── config/
│ └── config.php
├── css/
│ └── home.css
│ └── styles.css
├── database/
│ └── tailwebs-teacher-portal.sql
├── includes/
│ ├── functions.php
├── js/
│ └── index.js
├── module/student/
│ └── add_student.php
│ └── delete_student.php
│ └── edit_student.php
├── home.php
├── index.php
└── README.md
