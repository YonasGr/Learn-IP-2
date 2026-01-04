<?php
echo "--- Section 3: Working with RDBMS ---\n";

$servername = "localhost";
$username = "root";
$password = "root123";
$database = "test";

// ------------------ Object-Oriented Connection ------------------
echo "\nConnecting using object-oriented method\n";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";
$conn->close();

// ------------------ Procedural Connection ------------------
echo "\nConnecting using procedural method\n";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";
mysqli_close($conn);

// ------------------ Create Database ------------------
echo "\nCreating Database using object-oriented method\n";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS phpO";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}
$conn->close();

echo "\nCreating Database using procedural method\n";

$conn = mysqli_connect($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS phpP";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}
mysqli_close($conn);

// ------------------ Create Table ------------------
echo "\nCreating Table\n";

$conn = new mysqli($servername, $username, $password, $database);

$sql = "CREATE TABLE IF NOT EXISTS ITStudents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    UNIQUE (name, age, gender)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// ------------------ Insert Data ------------------
echo "Inserting Data\n";

$sql = "INSERT INTO ITStudents (name, age, gender) VALUES 
('John Doe', 25, 'Male'),
('Jane Doe', 22, 'Female'),
('Jonah Girma', 22, 'Male'),
('Abebe Girma', 25, 'Female')";

if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully\n";
} else {
    echo "Error inserting records: " . $conn->error . "\n";
}

echo "\nSelecting Data\n";

$sql = "SELECT * FROM ITStudents";
$Results = $conn->query($sql);

while ($row = mysqli_fetch_assoc($Results)) {
    echo "\n";
    echo "ID: " . $row["id"] . " | ";
    echo "Name: " . $row["name"] . " | ";
    echo "Age: " . $row["age"] . " | ";
    echo "Gender: " . $row["gender"] . " ";
}

$conn->close();
?>