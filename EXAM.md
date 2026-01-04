# Internet Programming Midterm Exam

**Course:** CS401 - Advanced Web Methodologies
**Time Allotted:** 120 Minutes
**Maximum Score:** 100 Points

---

## Instructions

This exam is designed to test your **analytical**, **evaluative**, and **creative** capabilities regarding PHP File Handling and MySQLi Database interactions.

- Read each question carefully.
- Ensure your code snippets are syntactically correct.
- For multiple-choice questions, select the **best** possible answer based on the provided course material.

---

## Section 1: Complex Multiple Choice (25 Points)

_Select the single best answer. Each question is worth 5 points._

**1. File Mode Analysis**
You are developing a high-contention logging system where multiple users might trigger write operations simultaneously. You need a file mode that allows you to write to the end of a file `system.log` if it exists, and create it if it does not. Furthermore, you want to avoid accidentally truncating existing logs. Which `fopen()` mode is the most logically robust choice?
A) `w+`
B) `a`
C) `r+`
D) `x`

**2. Object-Oriented Connection Logic**
Analyze the following connection snippet intended for an Object-Oriented MySQLi approach:

```php
$conn = new mysqli($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed.");
}
```

Why is this error handling mechanism logically flawed?
A) `die()` cannot accept string arguments when used with objects.
B) The `$conn` variable will always be an object (even on failure), so `!$conn` evaluates to false.
C) The `mysqli` constructor requires parameters to be passed as an associative array.
D) It fails to close the connection before dying, causing a resource leak.

**3. Security & Validation**
A junior developer proposes the following validation for a profile image upload:

```php
if ($_FILES['userfile']['type'] == 'image/jpeg') {
    // Process upload...
}
```

Evaluating this against security best practices, what is the primary vulnerability?
A) It fails to check if the file size exceeds the `php.ini` limit.
B) It does not verify if the destination directory exists.
C) The `['type']` value is provided by the client's browser and can be easily spoofed.
D) It implies the use of `$_GET` instead of `$_POST` in the form handlers.

**4. Data Consistency in Flat Files**
Your application uses a flat file `inventory.txt` to store product quantities. Users report that occasionally, after two purchases happen at the exact same time, the inventory count reflects only one purchase. Based on the "Limitations of Flat Files," what is the root cause?
A) The file permission was set to "Read-Only" by the OS.
B) Flat files lack built-in concurrent access mechanisms (locking), leading to race conditions.
C) PHP's `fwrite()` function is synchronous and blocks the second request indefinitely.
D) The file system reached its inode limit.

**5. SQL Injection Mechanics**
Consider the following query construction:

```php
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = "SELECT * FROM products WHERE id = $id";
```

Assuming `id` is expected to be an integer, why does this code fail to fully prevent SQL Injection?
A) `mysqli_real_escape_string` only escapes string characters (like quotes); it does not validate that expectations are met (integers).
B) Variables cannot be interpolated directly into double-quoted strings in PHP.
C) `$_POST` data is immutable and cannot be passed to escape functions.
D) The `mysqli` object does not support procedural escaping functions.

---

## Section 2: Scenario-Based Application (30 Points)

_Read the scenarios and answer the questions. Each question is worth 10 points._

**6. Scenario: The "Missing" Upload**
**Context:** You have created a form with `<form action="upload.php">` containing an `<input type="file" name="doc">`. When you submit the form, `print_r($_FILES)` returns an empty array, even though you selected a file. The `php.ini` setting `file_uploads` is set to `On`.
**Task:** Diagnose the issue based on HTML protocol requirements for file uploads. What specific attribute is missing from your form tag, and why is it technically required for the server to recognize the payload?

**7. Scenario: The "Silent" Update**
**Context:** You are reviewing a colleague's code for updating user passwords.

```php
$sql = "UPDATE users SET password = '$new_password'";
$conn->query($sql);
```

**Task:** Predict the catastrophic outcome of running this specific line of code in a production database with 10,000 users. How does the logic of SQL `UPDATE` statements dictate this result?

**8. Scenario: Migration Architecture**
**Context:** A client has a 500MB `sales.txt` file where every line is a transaction. They want to search for all sales by "John Doe". Using PHP's `file_get_contents()` causes the server to crash with a "Memory Exhausted" error.
**Task:** Propose a more memory-efficient file reading strategy using a specific PHP function mentioned in the course material. Explain _why_ your chosen function solves the memory issue compared to `file_get_contents()`.

---

## Section 3: Critical Analysis (20 Points)

_Analyze the code snippets and identify flaws. Each question is worth 10 points._

**9. Security Audit**
**Snippet:**

```php
$user = $_POST['username'];
$query = "INSERT INTO logs (user, action) VALUES ('$user', 'login')";
$conn->query($query);
echo "Log entry added for " . $user;
```

**Critique:** Identify the two major security/best-practice violations in this snippet. One relates to _Database Security_ (Input) and the other relates to _Information Disclosure_ (Output/XSS).

**10. Logic Analysis: Procedural vs OO**
**Snippet:**

```php
$conn = new mysqli("localhost", "root", "", "mydb");
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_error();
}
$result = mysqli_query($conn, "SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}
```

**Critique:** This code functions correctly but exhibits a stylistic inconsistency often found in legacy codebases. Analyze the specific lines where Procedural style and Object-Oriented style are mixed. Why is maintaining a consistent style (pure OO or pure Procedural) preferred for long-term maintenance?

---

## Section 4: Short Answer & Code (25 Points)

_Briefly answer or write the requested code. Each question is 2.5 points._

11. **Code:** Write the PHP command to delete a file named `temp_cache.txt`.
12. **Concept:** Explain the specific purpose of the `w` mode in `fopen()`. What happens to the file content if it already exists?
13. **SQL:** Write a SQL statement to create a database named `SchoolManagement`.
14. **SQL:** Write a SQL statement to select all columns from a table `Students` where the `grade` column is greater than 90.
15. **Code:** Write a PHP snippet that uses a `while` loop and `feof()` to read a file `story.txt` line-by-line using `fgets`.
16. **Concept:** Why must you use `mysqli_real_escape_string()` (or prepared statements) instead of just checking if a string contains quotes?
17. **Code:** Write a procedural style `mysqli_connect` call to a local server (user: 'admin', pass: '1234', db: 'inventory').
18. **Concept:** Describe one specific advantage of using a Relational Database (MySQL) over Flat Files regarding _Access Control_.
19. **Debug:** A script uses `fwrite($fp, "Text")` but nothing appears in the file. You checked generic permissions. What specific step (function call) usually performed at the end of a script ensures the buffer is flushed and the handle is released?
20. **Code:** Write the SQL query to remove a record from the `employees` table where the `id` is 50.

---

\pagebreak

## Answer Key & Logical JMS (Justification for Marking Scheme)

### Section 1: Multiple Choice

1.  **B (a)**
    - _Justification:_ `w+` truncates (erases) content. `r+` errors if file doesn't exist. `x` errors if file exists. `a` (append) preserves content and creates the file if missing.
2.  **B**
    - _Justification:_ In OO MySQLi, `new mysqli()` returns an object representing the connection attempt. Even if it fails, it returns an object, so the boolean check `!$conn` is false. You must check `$conn->connect_error`.
3.  **C**
    - _Justification:_ The MIME type in `$_FILES` is provided by the HTTP request header, which the user can manipulate. It is not verified by the server.
4.  **B**
    - _Justification:_ Flat files do not have an internal database engine to queue requests. Without manual file locking (`flock`), two scripts can write simultaneously, overwriting each other.
5.  **A**
    - _Justification:_ If `$id` is not quoted in the SQL string (`id = $id`), an attacker can simply input `1 OR 1=1`. Escaping quotes doesn't help when quotes aren't required for the syntax to be valid (integers).

### Section 2: Scenario-Based

6.  **Missing `method="post"` and `enctype="multipart/form-data"`**
    - _Justification:_ File uploads require the POST method and the multipart encoding to transmit binary data. Without `enctype`, only the filename is sent, not the file itself.
7.  **All passwords will be reset to the same value.**
    - _Justification:_ The `UPDATE` statement lacks a `WHERE` clause. In SQL, omitting `WHERE` applies the change to every row in the table.
8.  **Use `fgets()` in a loop.**
    - _Justification:_ `file_get_contents()` loads the entire file into RAM. `fgets()` reads a single line at a time, moving the file pointer, allowing you to process 500MB using only a few kilobytes of RAM.

### Section 3: Critical Analysis

9.  **Security Audit:**
    - 1. _SQL Injection:_ Direct insertion of `$user` variable without escaping.
    - 2. _XSS:_ Echoing the raw `$user` input back to the browser (`echo ... $user`). If the username contains `<script>`, it executes XSS.
10. **Style Mixing:**
    - _Analysis:_ Line 1 uses OO (`new mysqli`). Line 2/3 uses Procedural (`mysqli_connect_errno`). Line 5 uses Procedural (`mysqli_query`). Line 6 uses OO (`$result->fetch_assoc()`).
    - _Why bad:_ It makes code harder to read and debug. You have to switch mental models between passing connection handles as arguments vs calling methods on objects.

### Section 4: Short Answer

11. `unlink('temp_cache.txt');`
12. `w` opens for writing only. **It clears (truncates) the file content to zero length** if it exists.
13. `CREATE DATABASE SchoolManagement;`
14. `SELECT * FROM Students WHERE grade > 90;`
15. ```php
    $f = fopen("story.txt", "r");
    while(!feof($f)) { echo fgets($f); }
    fclose($f);
    ```
16. Because attackers can inject SQL commands using characters other than simple quotes, or manipulate the logic (like boolean injection) if the context allows. `real_escape` handles specific characters like `\x00`, `\n`, `\r`, `\`, `'`, `"`.
17. `$conn = mysqli_connect('localhost', 'admin', '1234', 'inventory');`
18. MySQL has a built-in **privilege system** (Users/Grants) that can restrict access to specific tables or columns. Flat files rely on OS permissions which are usually "all or nothing" for the file.
19. `fclose($fp);`
20. `DELETE FROM employees WHERE id = 50;`
