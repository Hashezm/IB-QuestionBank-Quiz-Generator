# Questionbank

### Introduction
The Questionbank focuses on allowing search and upload of questions, along with the creation of precisely timed practice tests based on user input. The primary languages implemented are HTML for the framework, PHP for scripting and database connections, and Structured Query Language (SQL) for database management. This solution allows client X to navigate and upload filtered questions based on topic (unit) and section (A or B), along with the creation of practice tests for their students.

### Structure of the Program
The `questionbank` folder contains all files of the project. The `questions` folder contains the question and mark scheme images saved in the database, allowing them to be displayed in the web application. Other `.php` files are the web pages the user has access to.

### Summary List of All Techniques
- Parameter Passing
- Random Index Selection from Array
- Foreach / While Loop
- Conditionals and Nested Conditionals
- Methods
- String Arrays
- 2D Arrays
- Stacks
- Searching
- Error Handling
- Structured Query Language
- Database Connection
- Reading from/to Database and Database Updating
- Selection Sort
- Array to String and String to Array Conversion
- Session Management

### Key Features
1. **Database Connection, Session Management, and Error Handling**
2. **Method Implementation and Parameter Passing**
3. **String to Array Conversion**
4. **Database Retrieval and Filtering Using Nested Conditionals**
5. **Random Selection in Stack Data Structure**
6. **Selection Sort on 2D Array**

### Software Tools Used
- **Atom IDE**: Friendly layout, free of cost, easy theme customization, clear navigation of project folders.
- **XAMPP**: Free web server stack solution, local Apache hosting, database management with phpMyAdmin.
- **phpMyAdmin**: Easy-to-use interface for managing databases, tables, and records, built-in designer tool for relational model demonstration.

### Installation Instructions
1. **Download and Install XAMPP**:
   - Go to the [XAMPP website](https://www.apachefriends.org/index.html) and download the XAMPP installer for your operating system.
   - Follow the installation instructions on the website.

2. **Download the Project**:
   - Download the ZIP file of this project from the [GitHub repository](URL_TO_GITHUB_REPO).
   - Extract the ZIP file to the `htdocs` directory of your XAMPP installation. Typically, this is located at `C:\xampp\htdocs` on Windows or `/Applications/XAMPP/htdocs` on macOS.

3. **Set Up the Database**:
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your web browser.
   - Create a new database for the project.
   - Import the provided SQL file into this database to set up the necessary tables and data. The SQL file is located in the project directory.

4. **Run the Project**:
   - Open your web browser and navigate to `http://localhost/your_project_folder/firstpage.php`.
   - This will open the web application, and you can start using the Questionbank.

### Usage
- **Account Management**: Create an account and log in to access the features.
- **Question Management**: Upload new questions, search for existing questions by unit and section, and manage question details.
- **Practice Test Creation**: Generate practice tests based on user-defined criteria, such as specific topics and time constraints.

### Contribution
Feel free to fork this project, submit pull requests, and report any issues. Contributions are welcome!

### License
This project is licensed under the MIT License. See the LICENSE file for details.

### Acknowledgments
Thanks to Ms. X for her invaluable feedback and support in the development of this project.
