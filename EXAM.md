# Internet Programming Midterm Exam

**Course:** CS401 - Advanced Web Methodologies
**Time Allotted:** 180 Minutes
**Maximum Score:** 100 Points

---

## Instructions

- This exam consists of **100 questions**.
- **Section 1**: 90 Multiple Choice Questions (90 Points). Select the single best answer.
- **Section 2**: 10 Short Answer & Code Questions (10 Points).
- Read each question carefully. Logic and specific PHP/MySQL behaviors are tested.

---

## Section 1: Multiple Choice (90 Points)

### Topic: File Modes & Opening

**1.** You need to open a file `data.txt` to read its content from the beginning, but you also need to be able to write to it. The file must NOT be truncated (erased) when opened. Which mode is correct?

   A) `r`  
   B) `r+`  
   C) `w+`  
   D) `a+`

**2.** What happens if you try to open a file in `w` mode that does not exist?

   A) PHP throws a Fatal Error.  
   B) PHP returns `FALSE`.  
   C) PHP attempts to create the file.  
   D) PHP opens the directory instead.

**3.** What is the primary difference between `w` and `w+` modes?

   A) `w` is write-only, `w+` is read/write. Both truncate the file.  
   B) `w` appends, `w+` overwrites.  
   C) `w+` creates the file, `w` does not.  
   D) `w` is for text files, `w+` is for binary files.

**4.** Which mode should you use if you want to strictly **fail** if the file already exists, but create it if it doesn't?

   A) `w`  
   B) `c`  
   C) `x`  
   D) `a`

**5.** When using `a` (append) mode, where is the file pointer placed immediately after opening?

   A) At the beginning of the file.  
   B) At the end of the file.  
   C) At the middle of the file.  
   D) It depends on the operating system.

**6.** If you open a file in `r` mode and writing is attempted, what happens?

   A) The data is written to the buffer but not saved.  
   B) The file is automatically switched to `r+` mode.  
   C) The operation fails, as `r` is read-only.  
   D) The script pauses to ask for permissions.

**7.** You run `fopen("log.txt", "w")`. The file `log.txt` contained 500 lines of important data. What is the state of the file now?

   A) The file is unchanged until `fwrite` is called.  
   B) The file is deleted.  
   C) The file size is 0 bytes (content is erased).  
   D) The file pointer is at the end, preserving content.

**8.** Which mode allows Reading and Writing, preserves file content, and creates the file if it doesn't exist?

   A) `r+`  
   B) `w+`  
   C) `a+`  
   D) `x+`

**9.** Using `x+` mode is useful for:

   A) Overwriting existing files securely.  
   B) atomic lock creation where correct file existence is critical.  
   C) Appending data to binary files.  
   D) Opening files in "Exclusive" read-only mode.

**10.** What character is often added to the mode string (e.g., `rb`) on Windows systems?

   A) `b` for Binary mode.  
   B) `t` for Text mode.  
   C) `s` for Secure mode.  
   D) `w` for Windows mode.

### Topic: File I/O Functions

**11.** The `fopen()` function returns what data type on success?

   A) Boolean `TRUE`.  
   B) String (File path).  
   C) Resource (File Handle).  
   D) Integer (File ID).

**12.** If `fopen()` fails to open a file, what does it return?

   A) `NULL`  
   B) `FALSE`  
   C) Resource  
   D) The error message string.

**13.** Which function reads a file completely into a string variable?

   A) `fread_all()`  
   B) `file_get_contents()`  
   C) `read_file_string()`  
   D) `fgets_all()`

**14.** The `fgetc()` function reads:

   A) One line at a time.  
   B) One word at a time.  
   C) One character at a time.  
   D) The entire file.

**15.** What is the purpose of `feof()`?

   A) To find the End Of Function.  
   B) To check if the file pointer has reached the End Of File.  
   C) To force the file to close.  
   D) To format the End Of File marker.

**16.** Which loop structure is most commonly used with `fgets()` to read a file line-by-line?

   A) `for` loop counting lines.  
   B) `do-while` loop.  
   C) `while(!feof($file))` loop.  
   D) `foreach` loop.

**17.** `readfile()` is unique because:

   A) It reads the file and returns it as an array.  
   B) It opens, reads, and outputs the content to the buffer in one step.  
   C) It requires no parameters.  
   D) It only works on binary files.

**18.** After using `fgetc($handle)`, what happens to the file pointer?

   A) It moves to the next character.  
   B) It resets to the start.  
   C) It stays on the same character.  
   D) It closes the stream.

**19.** `fwrite($handle, $string)` returns:

   A) `TRUE` or `FALSE`.  
   B) The number of bytes written.  
   C) The file resource.  
   D) The new file size.

**20.** `file_put_contents()` is equivalent to calling which sequence of functions?

   A) `fopen`, `fread`, `fclose`.  
   B) `fopen`, `fwrite`, `fclose`.  
   C) `file_exists`, `unlink`, `touch`.  
   D) `readfile`, `echo`.

**21.** If `fread($handle, $length)` is given a length greater than the file size, what happens?

   A) It returns a Fatal Error.  
   B) It reads until the End Of File and stops.  
   C) It pads the output with NULL characters.  
   D) It waits for more data to be written.

**22.** Why is `fclose()` important?

   A) To save the filename.  
   B) To free up system resources and release locks.  
   C) To encrypt the file data.  
   D) To allow the user to download the file.

**23.** Can `fopen()` open URLs (like `http://...`)?

   A) Never.  
   B) Yes, if `allow_url_fopen` is enabled in `php.ini`.  
   C) Only if the URL is on the same server.  
   D) Only for FTP URLs.

**24.** `fputs()` is an alias for which function?

   A) `fgets()`  
   B) `file_put_contents()`  
   C) `fwrite()`  
   D) `fprint()`

**25.** To get the file size to pass to `fread()`, which function should you use?

   A) `sizeof()`  
   B) `count()`  
   C) `filesize()`  
   D) `filelength()`

### Topic: Directories & Operations

**26.** Which function deletes a file?

   A) `delete()`  
   B) `remove()`  
   C) `del()`  
   D) `unlink()`

**27.** Which function creates a new directory?

   A) `makedir()`  
   B) `dir_create()`  
   C) `mkdir()`  
   D) `new_dir()`

**28.** How do you check if a specific path is a directory and not a file?

   A) `is_file()` (checking for false)  
   B) `is_dir()`  
   C) `file_type()`  
   D) `dir_exists()`

**29.** `rmdir()` will fail if:

   A) The directory is empty.  
   B) The directory is not empty.  
   C) The directory name contains spaces.  
   D) The directory was created by another user.

**30.** The `rename()` function can be used to:

   A) Rename files only.  
   B) Rename directories only.  
   C) Rename both files and directories, and move them (change path).  
   D) Change the file extension only.

**31.** To check if a file exists before opening it, use:

   A) `file_check()`  
   B) `file_exists()`  
   C) `check_file()`  
   D) `fopen_check()`

**32.** `scandir()` returns:

   A) A string of filenames.  
   B) An array of files and directories inside the specified path.  
   C) The number of files in a directory.  
   D) A resource handle.

**33.** When deleting a file using `unlink()`, does it go to the Recycle Bin/Trash?

   A) Yes, always.  
   B) No, it is permanently deleted.  
   C) Only on Windows.  
   D) Only if configured in php.ini.

**34.** Which function returns the directory name component of a path?

   A) `basename()`  
   B) `dirname()`  
   C) `pathinfo()`  
   D) `folder()`

**35.** To rename `old.txt` to `new.txt`, the correct syntax is:

   A) `rename("new.txt", "old.txt");`  
   B) `move("old.txt", "new.txt");`  
   C) `rename("old.txt", "new.txt");`  
   D) `cp("old.txt", "new.txt");`

### Topic: File Uploads

**36.** What HTTP Method must be used for file uploads?

   A) GET  
   B) POST  
   C) PUT  
   D) HEAD

**37.** Which attribute is mandatory in the `<form>` tag for file uploads?

   A) `enctype="multipart/form-data"`  
   B) `enctype="text/plain"`  
   C) `type="file"`  
   D) `upload="true"`

**38.** PHP stores information about uploaded files in which superglobal?

   A) `$_POST`  
   B) `$_GET`  
   C) `$_FILES`  
   D) `$_UPLOAD`

**39.** `$_FILES['file']['tmp_name']` contains:

   A) The name of the file on the user's computer.  
   B) The temporary path where the file is stored on the server.  
   C) The file size.  
   D) The MIME type.

**40.** To move the uploaded file from temporary storage to a permanent location, use:

   A) `copy()`  
   B) `rename()`  
   C) `move_uploaded_file()`  
   D) `file_save()`

**41.** `$_FILES['file']['error']` having a value of `0` means:

   A) The upload failed.  
   B) The file size is 0 bytes.  
   C) There was no error, the upload was successful.  
   D) The file blocked by security.

**42.** `$_FILES['file']['name']` represents:

   A) The name of the input field in the form.  
   B) The original name of the file on the client machine.  
   C) The name of the temporary file.  
   D) The user's username.

**43.** If `php.ini` has `file_uploads = Off`, what happens?

   A) You can only upload images.  
   B) Uploads are completely disabled.  
   C) Uploads are limited to 2MB.  
   D) You must use FTP instead.

**44.** Why should you not trust `$_FILES['file']['type']`?

   A) It is always empty.  
   B) It is sent by the browser and can be spoofed by the user.  
   C) It only supports images.  
   D) It is encrypted.

**45.** What PHP function can check the real MIME type of an image file on the server?

   A) `getimagesize()`  
   B) `check_image()`  
   C) `validate_type()`  
   D) `mime_content()`

### Topic: Flat Files vs Databases

**46.** A "Flat File" is:

   A) A file with no extension.  
   B) A simple text file used to store data.  
   C) A database table.  
   D) A binary executable.

**47.** Which is a major limitation of using flat files for data storage?

   A) They are too easy to edit.  
   B) They don't support text data.  
   C) Lack of built-in concurrent access support (race conditions).  
   D) They are larger than databases.

**48.** For querying complex relationships between data, which is better?

   A) Flat Files.  
   B) CSV files.  
   C) Relational Database (RDBMS).  
   D) Serialized Arrays.

**49.** "Random Access" to data is generally efficient in:

   A) Flat text files.  
   B) Databases.  
   C) Log files.  
   D) XML files.

**50.** Why does a database handle "Concurrent Access" better?

   A) It allows only one user at a time.  
   B) It uses locking mechanisms to queue and manage simultaneous requests.  
   C) It creates a new file for every user.  
   D) It runs on the client side.

### Topic: Database Connecting & MySQLi

**51.** "MySQLi" stands for:

   A) MySQL Improved.  
   B) MySQL Interface.  
   C) MySQL Internal.  
   D) My Structured Query Language Interactive.

**52.** Which paradigm does MySQLi support?

   A) Only Procedural.  
   B) Only Object-Oriented.  
   C) Both Procedural and Object-Oriented.  
   D) Neither.

**53.** In the procedural style, `mysqli_connect()` requires:

   A) Host, User, Password, Database.  
   B) User, Password, Host.  
   C) Database, Table, User.  
   D) Connection String only.

**54.** Which property works in Object-Oriented style to check connection errors?

   A) `$conn->error_list`  
   B) `$mysqli_error`  
   C) `$conn->connect_error`  
   D) `mysqli_connect_error($conn)`

**55.** The standard port for MySQL is:

   A) 80  
   B) 21  
   C) 3306  
   D) 8080

**56.** If you want to switch to a different database after connecting, use:

   A) `mysqli_change_db()`  
   B) `mysqli_select_db()`  
   C) `USE database` query.  
   D) Cannot be done without reconnecting.

**57.** `new mysqli(...)` is syntax for:

   A) Procedural connection.  
   B) Object-Oriented connection.  
   C) PDO connection.  
   D) Legacy connection.

**58.** What is `localhost`?

   A) The internet IP address.  
   B) The address referring to the same computer running the script.  
   C) A remote production server.  
   D) The database username.

**59.** Successful connection via `mysqli_connect` returns a:

   A) `Link Identifier` (Resource/Object).  
   B) String "Connected".  
   C) Boolean `TRUE`.  
   D) Integer `1`.

**60.** Why is it recommended to store connection credentials outside the web root?

   A) To make the site faster.  
   B) To prevent users from viewing them if the server creates a directory listing or fails to parse PHP.  
   C) To allow automatic updates.  
   D) To shared them with other websites easily.

### Topic: SQL Syntax (DDL & DML)

**61.** To create a new database called `shop`:

   A) `NEW DATABASE shop`  
   B) `CREATE DATABASE shop`  
   C) `ADD DATABASE shop`  
   D) `MAKE DATABASE shop`

**62.** What does `AUTO_INCREMENT` do?

   A) Automatically sorts the table.  
   B) Automatically generates a unique number for a column when a new record is inserted.  
   C) Increases the database size.  
   D) Updates the timestamp.

**63.** `VARCHAR(255)` means:

   A) A variable character string with a maximum length of 255.  
   B) A fixed string of exactly 255 characters.  
   C) A number up to 255.  
   D) A generic text field with no limit.

**64.** Which SQL keyword is used to retrieve data?

   A) GET  
   B) FETCH  
   C) SEARCH  
   D) SELECT

**65.** To filter records in a SELECT statement, use the \_\_\_ clause.

   A) `FILTER BY`  
   B) `WHERE`  
   C) `IF`  
   D) `WHEN`

**66.** Correct syntax to insert data:

   A) `INSERT INTO table (col1) VALUES ('val1')`  
   B) `INSERT table SET col1 = 'val1'`  
   C) `ADD TO table VALUES ('val1')`  
   D) `INSERT INTO table VALUES (col1, 'val1')`

**67.** How do you select ALL columns from a table?

   A) `SELECT ALL FROM table`  
   B) `SELECT columns FROM table`  
   C) `SELECT * FROM table`  
   D) `SELECT % FROM table`

**68.** Data returned by `mysqli_query` for a SELECT statement is called a:

   A) Result Set.  
   B) Data Array.  
   C) Query String.  
   D) Table Copy.

**69.** The `UPDATE` statement without a `WHERE` clause will:

   A) Throw an error.  
   B) Update only the first row.  
   C) Update ALL rows in the table.  
   D) Ask for confirmation.

**70.** To delete a specific record:

   A) `REMOVE FROM table WHERE id=1`  
   B) `DELETE FROM table WHERE id=1`  
   C) `ERASE FROM table WHERE id=1`  
   D) `DELETE * FROM table`

**71.** `mysqli_fetch_assoc()` returns:

   A) An enumerated array (indexes 0, 1, 2...).  
   B) An object.  
   C) An associative array (column names as keys).  
   D) A single string.

**72.** `mysqli_num_rows()` is used to:

   A) Count columns in a table.  
   B) Count how many rows were returned by a SELECT query.  
   C) Count how many rows were affected by an UPDATE.  
   D) Limit the results.

**73.** To limit the number of results returned:

   A) `STOP 10`  
   B) `LIMIT 10`  
   C) `MAX 10`  
   D) `COUNT 10`

**74.** `OFFSET` is used with `LIMIT` for:

   A) Sorting.  
   B) Pagination (skipping records).  
   C) Filtering.  
   D) Hiding columns.

**75.** `ORDER BY id DESC` means:

   A) Sort by ID in Descending order (High to Low).  
   B) Sort by ID in Ascending order (Low to High).  
   C) Sort by Description.  
   D) Descriptive sort.

### Topic: Review of Provided Scenarios (Converted to MC)

**76.** (Scenario Recap) You try to `fopen("log.txt", "a")` but the file permissions are set to Read-Only by the OS. What happens?

   A) PHP overrides the OS permission.  
   B) PHP returns `FALSE` and issues a Warning.  
   C) The file acts like `/dev/null` (writes disappear).  
   D) The script crashes the server.

**77.** (Scenario Recap) In a login system, why is `SELECT * FROM users WHERE user='$u' AND pass='$p'` dangerous?

   A) It is slow.  
   B) It is vulnerable to SQL Injection if variables aren't escaped.  
   C) It retrieves too much data.  
   D) Passwords should be stored in plain text.

**78.** (Scenario Recap) A form has `<input type="file">` but the uploaded file never appears in `$_FILES`. What is the most likely missing HTML attribute?

   A) `method="post"`  
   B) `action="upload.php"`  
   C) `enctype="multipart/form-data"`  
   D) `required`

**79.** (Scenario Recap) You need to process a 1GB text file line-by-line. Using `file_get_contents()` causes a memory error. Which function is the correct alternative?

   A) `fread()` entire file.  
   B) `fgets()` in a loop.  
   C) `fgetc()` in a loop.  
   D) `readfile()` into a variable.

**80.** (Scenario Recap) `mysqli_real_escape_string()` helps prevent injection by:

   A) Encrypting the data.  
   B) Removing all SQL keywords like SELECT/DROP.  
   C) Escaping special characters (like quotes) that could alter the query logic.  
   D) converting integers to strings.

### Topic: Security & Advanced Concepts

**81.** Why must string values in a SQL query be quoted (e.g., `VALUES ('$name')`)?

   A) To make them look nice.  
   B) So the database knows where the string starts and ends.  
   C) To prevent them from being stored.  
   D) It is optional in MySQL.

**82.** Numeric values in SQL (e.g. `WHERE age = 21`) should:

   A) Be quoted.  
   B) NOT be quoted.  
   C) Be enclosed in brackets.  
   D) Be commented out.

**83.** `mysqli_query` returns what for a successful `INSERT`?

   A) The inserted ID.  
   B) The Result Set.  
   C) `TRUE`.  
   D) The number of rows.

**84.** Which function executes multiple SQL statements separated by semicolons?

   A) `mysqli_query()`  
   B) `mysqli_multi_query()`  
   C) `mysqli_exec_batch()`  
   D) `mysqli_run_all()`

**85.** "Sanitizing" input means:

   A) Deleting it.  
   B) Cleaning/Modifying input to ensure it is safe (e.g. escaping).  
   C) Verifying it matches a type (Validation).  
   D) Sending it to the sanitization department.

**86.** A "Primary Key" must be:

   A) A string.  
   B) Unique and Not Null.  
   C) A duplicate value.  
   D) The first column only.

**87.** `TIMESTAMP` data types are useful for:

   A) Recording when a row was created or updated.  
   B) Storing long text.  
   C) Storing currency.  
   D) Calculating physics.

**88.** To run a PHP script on a local server, you typically place files in:

   A) `C:\Windows`  
   B) The web root (e.g., `www` or `htdocs`).  
   C) The Desktop.  
   D) My Documents.

**89.** `die()` or `exit()` are often used after connection failure to:

   A) Restart the server.  
   B) Stop script execution preventing further errors.  
   C) Email the admin.  
   D) Delete the database.

**90.** `mysqli_connect_error()` returns:

   A) The error code (int).  
   B) The error description (string) of the last connection error.  
   C) `TRUE` if there was an error.  
   D) The fixed connection.

---

## Section 2: Short Answer & Code (10 Points)

**91.** Write the PHP command to strictly **delete** a file named `old_data.log`.

**92.** Explain the specific behavior of `w` mode regarding existing file content.

**93.** Write a SQL statement to CREATE a database named `InventoryDB`.

**94.** Write a SQL statement to SELECT all columns from `Products` where `price` is less than 50.

**95.** Write a PHP snippet using a `while` loop and `feof()` to read `notes.txt` line-by-line.

**96.** Why is `mysqli_real_escape_string` insufficient if you don't also quote the variable in SQL? (e.g. `id = $escaped_id` where id is numeric).

**97.** Write a procedural `mysqli_connect` call to localhost with user `root`, password `pass`, and db `test`.

**98.** Describe one advantage of RDBMS over Flat Files regarding **searching** for data.

**99.** A script writes to a file but the changes aren't saved immediately or the file is locked. What function should be called at the end to close the handle?

**100.** Write the SQL query to DELETE the record from `users` whose `email` is 'test@test.com'.

---

\pagebreak

## Answer Key

### Multiple Choice Answers (Questions 1-90)

1. **D** - `a+`
2. **C** - Creates it
3. **A** - `w` is write-only, `w+` is read/write. Both truncate.
4. **C** - `x`
5. **B** - End
6. **C** - Fails
7. **C** - Truncated to 0
8. **C** - `a+` _(Note: w+ truncates. a+ appends/reads/creates.)_
9. **B** - Atomic creation/lock check
10. **A** - `b` _(Note: 'b' for binary mode is the safe standard on Windows systems.)_

11. **C** - Resource
12. **B** - FALSE
13. **B** - file_get_contents
14. **C** - Character
15. **B** - Check End Of File
16. **C** - while !feof
17. **B** - Outputs directly
18. **A** - Next char
19. **B** - Bytes written
20. **B** - fopen, fwrite, fclose

21. **B** - Reads until EOF
22. **B** - Release resources
23. **B** - Yes if allowed
24. **C** - fwrite
25. **C** - filesize
26. **D** - unlink
27. **C** - mkdir
28. **B** - is_dir
29. **B** - Not empty
30. **C** - Rename/Move

31. **B** - file_exists
32. **B** - Array
33. **B** - Permanently deleted
34. **B** - dirname
35. **C** - rename old, new
36. **B** - POST
37. **A** - multipart/form-data
38. **C** - $_FILES
39. **B** - Temp path
40. **C** - move_uploaded_file

41. **C** - Success
42. **B** - Original name
43. **B** - Disabled
44. **B** - Spoofing
45. **A** - getimagesize
46. **B** - Simple text file
47. **C** - Concurrency
48. **C** - RDBMS
49. **B** - Databases
50. **B** - Locking/Queue

51. **A** - MySQL Improved
52. **C** - Both
53. **A** - Host, User, Pass, DB
54. **C** - $conn->connect_error
55. **C** - 3306
56. **B** - mysqli_select_db
57. **B** - OO
58. **B** - Same computer
59. **A** - Link/Object
60. **B** - Security

61. **B** - CREATE DATABASE
62. **B** - Unique number
63. **A** - Var char string
64. **D** - SELECT
65. **B** - WHERE
66. **A** - INSERT INTO...
67. **C** - *
68. **A** - Result Set
69. **C** - Update ALL
70. **B** - DELETE FROM

71. **C** - Associative Array
72. **B** - Count rows SELECT
73. **B** - LIMIT
74. **B** - Pagination
75. **A** - Descending
76. **B** - False/Warning
77. **B** - Injection
78. **C** - enctype
79. **B** - fgets loop
80. **C** - Escaping chars

81. **B** - Delimit string
82. **B** - Not quoted
83. **C** - TRUE
84. **B** - multi_query
85. **B** - Cleaning
86. **B** - Unique Not Null
87. **A** - Dates
88. **B** - Web root
89. **B** - Stop execution
90. **B** - Error description

---

### Short Answer & Code Answers (Questions 91-100)

**91.** Write the PHP command to strictly **delete** a file named `old_data.log`.

   ```php
   unlink('old_data.log');
   ```

**92.** Explain the specific behavior of `w` mode regarding existing file content.

   `w` mode truncates the file size to 0 (erases content) immediately upon opening.

**93.** Write a SQL statement to CREATE a database named `InventoryDB`.

   ```sql
   CREATE DATABASE InventoryDB;
   ```

**94.** Write a SQL statement to SELECT all columns from `Products` where `price` is less than 50.

   ```sql
   SELECT * FROM Products WHERE price < 50;
   ```

**95.** Write a PHP snippet using a `while` loop and `feof()` to read `notes.txt` line-by-line.

   ```php
   while(!feof($f)) { 
       echo fgets($f); 
   }
   ```

**96.** Why is `mysqli_real_escape_string` insufficient if you don't also quote the variable in SQL? (e.g. `id = $escaped_id` where id is numeric).

   Because in a numeric context (e.g. `id=$id`), the database treats input as a number. `1 OR 1=1` is valid SQL without quotes. Escaping quotes doesn't stop this if the attacker doesn't use quotes.

**97.** Write a procedural `mysqli_connect` call to localhost with user `root`, password `pass`, and db `test`.

   ```php
   $conn = mysqli_connect('localhost', 'root', 'pass', 'test');
   ```

**98.** Describe one advantage of RDBMS over Flat Files regarding **searching** for data.

   RDBMS allow powerful query logic (`WHERE`, `LIKE`, Indexing) to find data instantly, whereas flat files require reading/parsing the whole file.

**99.** A script writes to a file but the changes aren't saved immediately or the file is locked. What function should be called at the end to close the handle?

   ```php
   fclose($handle);
   ```

**100.** Write the SQL query to DELETE the record from `users` whose `email` is 'test@test.com'.

   ```sql
   DELETE FROM users WHERE email='test@test.com';
   ```
