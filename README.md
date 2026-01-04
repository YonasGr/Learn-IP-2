# PHP File Handling and MySQLi Database Guide

A comprehensive guide to PHP file operations and MySQLi database management, covering everything from basic file I/O to advanced database security practices.

## Table of Contents

- [Part 1: PHP File Handling](#part-1-php-file-handling)
  - [Introduction to File Handling](#introduction-to-file-handling)
  - [Common File Handling Functions](#common-file-handling-functions)
  - [Writing to Files](#writing-to-files)
  - [Reading from Files](#reading-from-files)
  - [Directory Operations](#directory-operations)
  - [File Upload](#file-upload)
  - [Limitations of Flat Files](#limitations-of-flat-files)
- [Part 2: PHP and MySQLi Database](#part-2-php-and-mysqli-database)
  - [Introduction to MySQLi](#introduction-to-mysqli)
  - [Connecting to Database](#connecting-to-database)
  - [Creating Databases and Tables](#creating-databases-and-tables)
  - [Inserting Data](#inserting-data)
  - [Retrieving Data](#retrieving-data)
  - [Updating Data](#updating-data)
  - [Deleting Data](#deleting-data)
  - [Database Security](#database-security)

---

## Part 1: PHP File Handling

### Introduction to File Handling

File handling is the process of interacting with files on the server, including reading files, writing to files, creating new files, or deleting existing ones.

**Why File Handling is Essential:**
- Logging systems
- User-generated content management
- File uploads
- Data storage and retrieval

**Types of File Operations:**
- **Reading Files**: Reading data from files either entirely or line by line
- **Writing to Files**: Overwriting existing content or appending to the end
- **File Metadata**: Gathering information about files (size, type, last modified time)
- **File Uploading**: Enabling users to submit files to the server

**Data Storage Methods:**
You can store data in two basic ways:
1. **Flat Files**: Simple text files with various formats
2. **Databases**: Structured data storage systems (covered in Part 2)

### Common File Handling Functions

| Function | Description |
|----------|-------------|
| `fopen()` | Opens a file |
| `fclose()` | Closes a file |
| `fread()` | Reads data from a file |
| `fwrite()` | Writes data to a file |
| `file_exists()` | Checks if a file exists |
| `unlink()` | Deletes a file |

### Writing to Files

Writing data to a file requires three steps:
1. **Open the file** (create it if it doesn't exist)
2. **Write the data** to the file
3. **Close the file**

#### File Modes

When opening a file, you need to specify how you intend to use it (file mode):
- **Reading only, writing only, or both**
- **Overwrite existing content** or **append** to the end
- **Binary or text mode** (on systems that differentiate)

The `fopen()` function supports combinations of these options. File modes give the operating system a mechanism to:
- Determine how to handle access requests from other people or scripts
- Check that you have access and permission to a particular file

#### Writing Examples

**Using fwrite():**

```php
<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Welcome\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
```

**Using file_put_contents():**

```php
<?php
file_put_contents('kaa.txt', 'Easy Programming');
echo file_get_contents('kaa.txt'); // Output: Easy Programming
?>
```

> **Note:** `file_put_contents()` is a convenient alternative to `fwrite()`, and `file_get_contents()` can be used to read files from the directory.

**Simple Example:**

```php
<?php
$a = fopen('ka.txt', 'w');
fwrite($a, 'hello students');
fclose($a);
readfile('ka.txt');
?>
```

> **Note:** `fputs()` is an alias of `fwrite()` and can be used interchangeably. The function call `fwrite($fp, $outputstring)` tells PHP to write the string stored in `$outputstring` to the file pointed to by `$fp`.

### Reading from Files

Reading data from a file also takes three steps:
1. **Open the file** (exit gracefully if it doesn't exist)
2. **Read data** from the file
3. **Close the file**

#### Reading Functions

- **`fread()`**: Reads from an open file
  - First parameter: file handle
  - Second parameter: maximum number of bytes to read

- **`readfile()`**: Opens, reads, and outputs file contents directly

- **`fgets()`**: Reads a single line at a time

- **`fgetc()`**: Reads a single character at a time

- **`feof()`**: Checks if "end-of-file" (EOF) has been reached (useful for looping through data of unknown length)

#### Reading Examples

**Using fread():**

```php
<?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
echo fread($myfile, filesize("web.txt"));
fclose($myfile);
?>
```

**Using readfile():**

```php
<?php
echo readfile("web.txt");
?>
```

**Reading Single Line:**

```php
<?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
echo fgets($myfile); // Read single line from the file
fclose($myfile);
?>
```

**Reading Entire File Line by Line:**

```php
<?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
// Output one line at a time until end-of-file
while(!feof($myfile)) {
    echo fgets($myfile);
}
fclose($myfile);
?>
```

**Reading Character by Character:**

```php
<?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
    echo fgetc($myfile);
}
fclose($myfile);
?>
```

> **Note:** After a call to `fgetc()`, the file pointer moves to the next character.

### Directory Operations

#### Creating and Removing Directories

**Functions:**
- `mkdir("directory_name")` - Creates a new directory
- `rmdir("directory_name")` - Removes a directory
- `is_dir()` - Checks if a directory exists

**Creating a Directory:**

```php
<?php
if(!is_dir("NewDirectory")) {
    mkdir("NewDirectory");
    echo "The new directory is created!";
}
?>
```

**Removing a Directory:**

```php
<?php
if(is_dir("NewDirectory")) {
    rmdir("NewDirectory");
    echo "The directory is removed!";
}
?>
```

#### Renaming Files and Directories

The `rename()` function is used to rename files and directories.

**Syntax:** `rename("old_name", "new_name")`

**Example:**

```php
<?php
rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
?>
```

> **Note:** Like with files, the `rename()` function can also be used to rename directories.

#### Deleting Files

To delete a file, use the `unlink()` function (there is no function called `delete` in PHP).

**Syntax:** `unlink($filepath)`

**Example:**

```php
<?php
$fh = fopen('test.txt', 'a');
fwrite($fh, 'Hello world!');
fclose($fh);
unlink('test.txt');
?>
```

### File Upload

#### Configuration

First, ensure PHP is configured to allow file uploads in the `php.ini` file:
```ini
file_uploads = On
```

> **Warning:** With ease comes danger! Always be careful when allowing file uploads.

#### HTML Form

Create an HTML form to allow users to upload files:

```html
<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
```

**Important Form Requirements:**
- Must use `method="post"`
- Must include `enctype="multipart/form-data"` - specifies which content-type to use when submitting the form
- Without these requirements, the file upload will not work

**Other Things to Notice:**
- The `type="file"` attribute shows the input field as a file-select control with a "Browse" button
- The form sends data to a file called `upload.php`

#### Upload Processing Script

Create the `upload.php` file to handle the upload:

```php
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
```

**Script Explanation:**
- `$target_dir = "uploads/"` - Specifies the directory where the file will be placed
- `$target_file` - Specifies the path of the file to be uploaded
- `$imageFileType` - Holds the file extension
- The script checks if the uploaded file is an actual image

### Limitations of Flat Files

While flat files are simple to use, they have several limitations:

1. **Performance Issues**: When files grow large, operations become very slow

2. **Search Difficulty**: Finding specific records or groups of records is challenging

3. **Concurrent Access Problems**: Multiple users may experience delays waiting for file locks. With enough traffic, users may leave if the wait is too long.

4. **Sequential Processing**: Files are read from beginning to end, making random access difficult. You end up reading the whole file into memory, making changes, and writing the whole file out again. With large data files, this becomes a significant overhead.

5. **Limited Access Control**: Beyond basic file permissions, there's no easy way to enforce different levels of data access

**Solution:** Use a **Relational Database Management System (RDBMS)** like MySQL for better performance and capabilities.

---

## Part 2: PHP and MySQLi Database

### Introduction to MySQLi

MySQLi (MySQL Improved) is one of the most popular relational database systems used on the web today. It comes pre-installed with WAMP/XAMPP server packages and is freely available and easy to install.

#### Advantages of MySQLi

- **Easy to use** yet extremely powerful, fast, secure, and scalable
- **Cross-platform**: Runs on UNIX/Linux, Windows, Mac OS X, and others
- **Standard SQL support**: Supports Structured Query Language (SQL)
- **Scalable**: Ideal for both small and large applications
- **Oracle-backed**: Developed and distributed by Oracle Corporation
- **Secure**: Includes data security layers to protect sensitive data from intruders
- **Open source**: Currently the most popular open-source database server in existence
- **PHP integration**: Commonly used with PHP scripts to create powerful and dynamic server-side applications

**Server Options:**
You can use either Apache or IIS server to connect PHP code to databases. This guide uses Apache server.

#### Why Use RDBMS Over Flat Files?

Relational Database Management Systems address all the limitations of flat files:

- **Faster access** to data (MySQL has some of the fastest benchmarks of any RDBMS)
- **Easy querying** to extract datasets matching specific criteria
- **Built-in concurrent access** mechanisms
- **Random access** to data
- **Built-in privilege systems** for access control (MySQL has particular strengths in this area)

### Connecting to Database

#### Connection Function

PHP provides `mysqli_connect()` function to open a database connection.

**Syntax:**
```php
mysqli_connect(hostname, username, password, database_name);
```

**Parameters:**
- **hostname**: Server address (usually "localhost")
- **username**: Database username
- **password**: Database password
- **database_name**: Name of the database to use (equivalent to saying `USE databasename` within the mysql client)

**Returns:** MySQLi link identifier on success, or FALSE on failure

#### Object-Oriented Connection

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "DbName";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close(); // Close connection
?>
```

#### Procedural Connection

```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "DbName";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysqli_close($conn); // Close connection
?>
```

### Creating Databases and Tables

#### Creating a Database

**Object-Oriented Method:**

```php
<?php
$sql = "CREATE DATABASE DbName";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
?>
```

**Procedural Method:**

```php
<?php
$sql = "CREATE DATABASE DbName";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
?>
```

#### Creating a Table

The CREATE TABLE statement is used to create a table in MySQL:

```php
<?php
$sql = "CREATE TABLE IT (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";
?>
```

#### Column Attributes

After the data type, you can specify optional attributes for each column:

- **NOT NULL**: Row must contain a value for this column; null values not allowed
- **DEFAULT value**: Sets a default value when no other value is provided
- **UNSIGNED**: For number types; limits stored data to positive numbers and zero
- **AUTO_INCREMENT**: MySQL automatically increases the field value by 1 for each new record
- **PRIMARY KEY**: Uniquely identifies rows in a table (often used with AUTO_INCREMENT)

> **Best Practice:** Each table should have a primary key column (like "id") with a unique value for each record.

### Inserting Data

#### Single Record Insert

**Important Tips:**
- SQL queries must be quoted in PHP
- String values inside SQL queries must be quoted
- Numeric values must NOT be quoted
- The word NULL must NOT be quoted

**Example:**

```php
<?php
$sql = "INSERT INTO IT (firstname, lastname, email)
        VALUES ('Kim', 'Jung', 'kimjun@gmail.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
```

#### Multiple Records Insert

Multiple SQL statements must be executed with `mysqli_multi_query()` function:

```php
<?php
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('abebe', 'kebede', 'mama@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Mikiyas', 'alemu', 'myemail@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('chala', 'Diriba', 'cha@example.com')";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
```

### Retrieving Data

#### SELECT Statement

The SELECT statement extracts data from one or more tables:

**Syntax:**
```sql
SELECT column_name(s) FROM table_name
SELECT * FROM table_name
```

> **Note:** The asterisk (*) is used to select all columns from the table.

**Example:**

```php
<?php
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}
?>
```

#### Using LIMIT Clause

MySQL provides a LIMIT clause to specify the number of records to return. This is useful for:
- Multi-page results (pagination)
- Performance optimization on large tables
- Preventing performance impact from returning too many records

**Examples:**

```php
<?php
// Return the first 30 records
$sql = "SELECT * FROM Orders LIMIT 30";

// Return 10 records starting from record 16 (OFFSET 15)
$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
// OR
$sql = "SELECT * FROM Orders LIMIT 15, 10";
// Select records 16-25
?>
```

### Updating Data

#### UPDATE Statement

The UPDATE statement modifies existing records in a table:

**Syntax:**
```sql
UPDATE table_name
SET column1=value, column2=value2, ...
WHERE some_column=some_value
```

> **Important:** The WHERE clause specifies which records to update. If you omit it, ALL records will be updated!

**Example:**

```php
<?php
$sql = "UPDATE IT SET lastname='abebe' WHERE id=2";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>
```

### Deleting Data

#### DELETE Statement

The DELETE statement removes records from a table:

**Syntax:**
```sql
DELETE FROM table_name
WHERE some_column = some_value
```

> **Important:** The WHERE clause specifies which records to delete. If you omit it, ALL records will be deleted!

**Example:**

```php
<?php
$sql = "DELETE FROM IT WHERE id=2";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
```

### Database Security

Database security in PHP involves three broad areas:

#### 1. Protecting MySQL Access Information

- Store MySQL connection scripts **outside the web directory**
- Prevents connection details from being viewable through a web browser
- Keep credentials secure and never hardcode them in publicly accessible files

#### 2. Not Revealing Database Information

- Don't display PHP error messages to users on live sites
- Don't show query details to users
- Use error messages only during development/debugging
- Configure proper error handling in production

#### 3. Validating User-Submitted Data

**Never trust user-supplied data!** Follow these security practices:

**a) Validate Input:**
- Check that values have been submitted
- Verify data types (number, string, etc.)

**b) Use Regular Expressions:**
- Ensure submitted data matches expected patterns
- Validate format and structure

**c) Typecast Values:**
- Guarantee that values are the correct type (especially numbers)
- Prevents type juggling vulnerabilities

**d) Use mysqli_real_escape_string():**
- Makes data safe for use in queries
- Escapes potentially problematic characters

**Example:**

```php
<?php
$safe = mysqli_real_escape_string($dbc, $data);
?>
```

**Security Best Practices Summary:**
1. Always validate and sanitize user input
2. Use prepared statements when possible
3. Implement proper error handling
4. Keep database credentials secure
5. Use the principle of least privilege for database users
6. Regularly update and patch your database server
7. Monitor and log database access

---

## Conclusion

This guide covered essential PHP file handling operations and MySQLi database management. By understanding both flat file operations and database interactions, you can build robust PHP applications that efficiently store and retrieve data while maintaining security best practices.

**Key Takeaways:**
- Use flat files for simple, small-scale data storage
- Use databases (MySQLi) for complex, large-scale applications
- Always prioritize security when handling files and database operations
- Follow best practices for input validation and data sanitization
- Properly close connections and file handles to prevent resource leaks

---

*For more information, refer to the official [PHP Documentation](https://www.php.net/manual/en/) and [MySQL Documentation](https://dev.mysql.com/doc/).*
