Files and Directories In PHP, File handling is the process of interacting with files on the
server, such as reading files, writing to a file, creating new files, or
deleting existing ones.
 File handling is essential for applications that require the storage and
retrieval of data, such as logging systems, user-generated content, or
file uploads.
 Several types of file operations can be performed in PHP:
 Reading Files: reading data from files either entirely or line by line.
 Writing to Files: overwriting existing content or appending to the end.
 File Metadata: gathering information about files, such as their size, type,
and last modified time.
 File Uploading: enabling users to submit files to the server.
04-Dec-25
2 You can store data in two basic ways: in flat files or in
a database.
 A flat file can have many formats, but in general,
when we refer to a flat file, we mean a simple text file.
 The processes of writing to and reading from files is
very similar to many programming languages.
 Common File Handling Functions in PHP:
 fopen() - Opens a file
 fclose() - Closes a file
 fread() - Reads data from a file
 fwrite() - Writes data to a file
 file_exists() - Checks if a file exists
 unlink() - Deletes a file
04-Dec-25
3 Writing data to a file requires three steps:
 Open the file. If the file does not already exist, you need to create it.
 Write the data to the file.
 Close the file.
 To open a file in PHP, you use the fopen() function.
 The fclose() function is used to close an open file.
 It requires the name of the file (or a variable that holds the
filename) we want to close.
 When you open the file, you need to specify how you intend to use
it. This is known as the file mode.
 The operating system on the server needs to know what you want
to do with a file that you are opening.
 It needs to know whether the file can be opened by another script
while you have it open and whether you (or the script owner) have
permission to use it in that way.
04-Dec-25
4Example
<?php
$a=fopen('ka.txt', 'w');
fwrite($a,'hello students' );
?>
<?php
readfile('ka.txt');
?>
04-Dec-25
5 Essentially, file modes give the operating system a mechanism
to determine how to handle access requests from other people
or scripts and a method to check that you have access and
permission to a particular file.
 You need to make three choices when opening a file:
 You might want to open a file for reading only, for writing only, or for
both reading and writing.
 If writing to a file, you might want to overwrite any existing contents
of a file or append new data to the end of the file. You also might like
to terminate your program gracefully instead of overwriting a file if
the file already exists.
 If you are trying to write to a file on a system that differentiates
between binary and text files, you might need to specify this fact.
 The fopen() function supports combinations of these
three options.
04-Dec-25
604-Dec-25
7 Writing to a file in PHP is relatively simple. You can use either of
the functions fwrite() (file write) or fputs() (file put string); fputs()
is an alias to fwrite().
 You call fwrite() in the following way:
 fwrite($fp, $outputstring);
 This function call tells PHP to write the string stored in
$outputstring to the file pointed to by $fp.
 Example:
 <?php
$myfile = fopen("newfile.txt", "w") or die("Unable to
open file!");
$txt = “Welcome\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
04-Dec-25
8<?php
file_put_contents('kaa.txt', ‘Easy Programming
');
echo file_get_contents('kaa.txt');
?>// Easy Programming
File_put_contents function used to write php
file like that of fwrite.
File_get_contents also used to read file from
the dirctory.
04-Dec-25
9 Similarly, reading data from a file takes three steps:
 Open the file. If you cannot open the file (for example, if it doesn’t exist), you
need to recognize this and exit gracefully.
 Read data from the file.
 Close the file.
 When you want to read data from a file, you have many choices about how
much of the file to read at a time.
 Again, you open the file by using fopen(). In this case, you open the file for
reading only, so you use the file mode r.
 The fread() function reads from an open file.
 The first parameter of fread() contains the name of the file to read from
and the second parameter specifies the maximum number of bytes to
read.
 The readfile() function is useful if all you want to do is open up a file and
read its contents.
04-Dec-25
10 The readfile() function also reads a file and writes it to the output
buffer.
 fgets() and fgetc() are functions used to read single line at a time
and single character at a time respectively.
 feof() function is used along with these functions to check if the
"end-of-file" (EOF) has been reached. The feof() function is also
useful for looping through data of unknown length.
 Example:
 <?php
$myfile = fopen("web.txt", "r") or
die("Unable to open file!");
echo fread($myfile,filesize("web.txt"));
fclose($myfile);
?>
04-Dec-25
11 <?php
echo readfile("web.txt");
?>
 <?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
 //read single line from the file
fclose($myfile);
?>
 <?php
$myfile = fopen("web.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
echo fgets($myfile);
 //can read whole file using while loop and feof
}
 ?>
04-Dec-25
12 <?php
$myfile = fopen("web.txt", "r") or die("Unable to open
file!");
// Output one character until end-of-file
while(!feof($myfile)) {
echo fgetc($myfile);
}
fclose($myfile);
?>
 // After a call to the fgetc() function, the file pointer
moves to the next character.
04-Dec-25
13 The mkdir() and rmdir() functions are used to create a new
directory and remove the created directory respectively.
 mkdir(“directory name”)
 Rmdir(“directory name”)
 The is_dir() function is used to check if the directory exists before
creating or removing it.
 Example:
 <?php
if(!is_dir("NewDirectory")){
mkdir("NewDirectory");
echo "the new directory is created!!";
}
?>
04-Dec-25
14 The rename() function is used to give a new name for your file.
 rename (“old name”, “new name”).
 <?php
rename("/tmp/tmp_file.txt", "/home/user/login/do
cs/my_file.txt");
?>
 If you want to delete the order file after the orders have been processed, you
can do so by using unlink(). (here
is no function called delete)
 unlink($fp)
 <?php
 $fh=fopen('test.txt','a');
 fwrite($fh,'Hello world!');
 fclose($fh);
unlink('test.txt');
?>
04-Dec-25
15 <?php
if(is_dir("NewDirectory")){
rmdir("NewDirectory");
echo "the new directory is removed!!";
}
?>
 Like in files the rename () function is used to rename the name of
directories.
04-Dec-25
1604-Dec-25
17 With PHP, it is easy to upload files to the server
 However, with ease comes danger, so always be careful
when allowing file uploads!
 Configure The "php.ini" File
 First, ensure that PHP is configured to allow file uploads.
 In your "php.ini" file, search for the file_uploads
directive, and set it to On:
04-Dec-25
18 Create The HTML Form
 Next, create an HTML form that allow users to choose the image file
they want to upload:
 <!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-
data">
Select image to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
04-Dec-25
19 Some rules to follow for the HTML form above:
 Make sure that the form uses method="post"
 The form also needs the following attribute:
enctype="multipart/form-data". It specifies which content-type
to use when submitting the form
 Without the requirements above, the file upload will not work.
 Other things to notice:
 The type="file" attribute of the <input> tag shows the input
field as a file-select control, with a "Browse" button next to the
input control
 The form above sends data to a file called "upload.php", which
we will create next.
04-Dec-25
20 Create The Upload File PHP Script
 The "upload.php" file contains the code for uploading a file:
 <?php
$target_dir = "uploads/";
$target_file = $target_dir .
basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
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
04-Dec-25
21 PHP script explained:
 $target_dir = "uploads/" - specifies the directory
where the file is going to be placed
 $target_file specifies the path of the file to be
uploaded
 $imageFileType holds the file extension of the file
 Next, check if the image file is an actual image or a
fake image
04-Dec-25
22 When a file grows large, working with it can be very slow.
 Searching for a particular record or group of records in a
flat file is difficult.
 Dealing with concurrent access can become problematic.
With enough traffic on a site, a large group of users may
be waiting for the file to be unlocked before they can
place their order. If the wait is too long, people will go
elsewhere.
 The file processing deals with a file using sequential
processing; that is, you start from the beginning of the file
and read through to the end. Random access can be
difficult because you end up reading the whole file into
memory, making the changes, and writing the whole file
out again. With a large data file, having to go through all
these steps becomes a significant overhead.
 Beyond the limits offered by file permissions, there is no
easy way of enforcing different levels of access to data.
04-Dec-25
23Relational database management systems address all these
issues:
 RDBMSs can provide much faster access to data than flat files.
And MySQL, the database system we use in this course, has
some of the fastest benchmarks of any RDBMS.
 RDBMSs can be easily queried to extract sets of data that fit
certain criteria.
 RDBMSs have built-in mechanisms for dealing with concurrent
access.
 RDBMSs provide random access to your data.
 RDBMSs have built-in privilege systems. MySQL has particular
strengths in this area.
04-Dec-25
24End of the Chapter
04-Dec-25
25

Chapter Four
PHP AND MYSQLI
DATABASEMysqli
MySQLi is one of the most popular relational database system being
used on the Web today. It is freely available and easy to install,
however if you have installed Wampserver/Xampp server it already
there on your machine. MySQL database server offers several
advantages:
 MySQLi is easy to use, yet extremely powerful, fast, secure, and
scalable.
 MySQLi runs on a wide range of operating systems, including UNIX
or Linux, Microsoft Windows, Apple Mac OS X, and others.
 MySQLi supports standard SQL (Structured Query Language).
 MySQLi is ideal database solution for both small and large
applications.
 MySQLi is developed, and distributed by Oracle Corporation.
 MySQLi includes data security layers that protect sensitive data
from intruders…counts
 MySQLi is currently the most popular open source
database server in existence. On top of that, it is very
commonly used in conjunction with PHP scripts to
create powerful and dynamic server-side
applications.
 we can use either apache or IIS server to connect our
Php code to database. For now we are going to use
apache server.Connecting to MySqli Database
 PHP provides mysqli_connect function to open a
database connection. This function takes three
parameters and returns a MySQLi link identifier on
success, or FALSE on failure.
 Mysqli function parameters :

Server , username, password
mysqli_connect(server,username,password);Php and MySqli
 The first step for interacting with MySQL connecting to
the server requires the appropriately named
mysqli_connect( ) function:
 $dbc = mysqli_connect (hostname,username, password,
db_name);
 The first three arguments sent to the function
(hostname, username, and password) are based
upon the users and privileges established within MySQL.
 The fourth argument is the name of the database to use.
This is the equivalent of saying USE databasename
within the mysql client.
 If the connection was made, the $dbc variable, short for
database connection (but you can use any name you
want, of course)...count
 We can connect to mysql database by using either object oriented or
procedural methods.
 Connecting using object oriented
 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$database= " DbName";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
 $conn->close(); // for closing connctionCreating Database
 // Create database using object oriented
$sql = "CREATE DATABASE DbName";
if ($conn->query($sql) === TRUE) {
echo "Database created successfully";
} else {
echo "Error creating database: " . $conn->error;
}..count's
 Connect mysql using procedural methods
 <?php
$servername = "localhost";
$username = "username";
$password = "password";
$database= " DbName";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
 mysqli_close($conn); // for closing connection..count’s
 // creating database using procedural
 $sql = "CREATE DATABASE DbName";
if (mysqli_query($conn, $sql)) {
echo "Database created successfully";
} else {
echo "Error creating database: " .
mysqli_error($conn);
}Creating tables
 The CREATE TABLE statement is used to create a
table in MySQL.
 $sql=“CREATE TABLE IT (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
) ”;…Count's
 After the data type, you can specify other optional attributes for
each column:
 NOT NULL - Each row must contain a value for that column, null
values are not allowed
 DEFAULT value - Set a default value that is added when no other
value is passed
 UNSIGNED - Used for number types, limits the stored data to
positive numbers and zero
 AUTO INCREMENT - MySQL automatically increases the value of
the field by 1 each time a new record is added
 PRIMARY KEY - Used to uniquely identify the rows in a table. The
column with PRIMARY KEY setting is often an ID number, and is
often used with AUTO_INCREMENT
 Each table should have a primary key column (in this case: the "id"
column). Its value must be unique for each record in the table.Insert data to database table
 After a database and a table have been created, we
can start adding data in them.
 Some tips when insert data to DB
 The SQL query must be quoted in PHP
 String values inside the SQL query must be quoted
 Numeric values must not be quoted
 The word NULL must not be quoted…coun’t
 $sql = "INSERT INTO IT (firstname, lastname,
email)
VALUES (‘Kim', ‘Jung', ‘kimjun@gmail.com')";
if (mysqli_query($conn, $sql)) {
echo “ one New record created successfully";
} else {
echo "Error: " . $sql . "<br>" .
mysqli_error($conn);
}Inserting Multiple values
 Multiple SQL statements must be executed with the mysqli_multi_query()
function.
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES (‘abebe', ‘kebede', ‘mama@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mikiyas', ‘alemu', ‘myemail@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES (‘chala', 'Diriba', ‘cha@example.com')";
if (mysqli_multi_query($conn, $sql)) {
echo "New records created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}Retrieving Data From Db
 The SELECT statement is used to Extract data from one or more tables:
 SELECT column_name(s) FROM table_name or
 SELECT * FROM table_name
 The * used to select all columns from the table.

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "id: " . $row["id"]. " Name: " . $row["firstname"]. " " .
$row["lastname"]. "<br>";
}
} else {
echo "0 results";
}Retrieving
 MySQL provides a LIMIT clause that is used to specify the number of records
to return.
 The LIMIT clause makes it easy to code multi page results or pagination with
SQL, and is very useful on large tables.
 Returning a large number of records can impact on performance.



$sql = "SELECT * FROM Orders LIMIT 30"; // it will return the first 30 records.
$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15"; OR
$sql = "SELECT * FROM Orders LIMIT 15, 10";
// return only 10 records, start on record 16 (OFFSET 15)“ OR select records 16 - 25Modifying data on DB Table
 The UPDATE statement is used to update existing
records in a table:
 UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value
 NB. the WHERE clause in the UPDATE syntax:
The WHERE clause specifies which record or records
that should be updated. If you omit the WHERE clause,
all records will be updated!..count's
 $sql = "UPDATE IT SET lastname=abebe' WHERE
id=2";
if (mysqli_query($conn, $sql)) {
echo "Record updated successfully";
} else {
echo "Error updating record: " .
mysqli_error($conn);
}Removing Data from Db Table
 The DELETE statement is used to delete records
from a table:
 DELETE FROM table_name
WHERE some_column = some_value
 NB. the WHERE clause in the DELETE
syntax: The WHERE clause specifies which record
or records that should be deleted. If you omit the
WHERE clause, all records will be deleted!Database security
 Database security with respect to PHP comes down to three
broad issues:
1. Protecting the MySQL access information
2. Not revealing too much about the database
3. Being cautious when running queries, particularly
those involving user submitted data
 You can accomplish the first objective by securing the
MySQL connection script outside of the Web directory so that
it is never viewable through a Web browser.
 The second objective is attained by not letting the user see
PHP’s error messages or your queries (in these scripts, that
information is printed out for your debugging purposes; you’d
never want to do that on a live site).Cont…
 For the third objective, there are numerous steps you can
and should take, all based upon the premise of never
trusting user-supplied data.
 First, validate that some value has been submitted, or that it is of the
proper type (number, string, etc.).
 Second, use regular expressions to make sure that submitted data
matches what you would expect it to be.
 Third, you can typecast some values to guarantee that they’re
numbers.
 A fourth recommendation is to run user-submitted data through the
mysqli_real_escape_string( ) function.
 This function makes data safe to use in a query by
escaping what could be problematic characters.
 $safe = mysqli_real_escape_string ($dbc, data);End of The Chapter
