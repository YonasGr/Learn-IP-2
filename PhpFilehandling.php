<?php
// Section 1: Working with Stream Functions (fopen, fwrite, fclose)
echo "--- Section 1: Stream Functions ---\n";

// Open for writing only first to clear/create it, or append directly.
// "w" opens for writing only; places the file pointer at the beginning of the file and truncates the file to zero length. 
// "a+" opens for reading and writing; places the file pointer at the end of the file.
$filename = "Exam.md";
$myFile = fopen($filename, "a+") or die("Unable to open file!");

echo "File opened successfully.\n";

$text = "Hello world welcome to our exam\n";
fwrite($myFile, $text); // Writes to the end
fwrite($myFile, $text); // Writes to the end
fwrite($myFile, $text); // Writes to the end
fwrite($myFile, $text); // Writes to the end

echo "File written successfully using fwrite.\n\n";

// creating a read handle or rewinding to read with the same handle
rewind($myFile); // Move pointer to start to read what we just wrote (or the whole file)
echo "Reading first line from stream: " . fgets($myFile);
echo "Reading A single character: " . fgetc($myFile) . "\n";
echo "Or we can loop through the file: \n";
while (!feof($myFile)) {
    echo fgetc($myFile);
}
echo "\n";

echo "Using file() to read the file, it is used when we need to read the file line by line or with a specific length: \n" . file($filename);
echo "\n";


echo "Using fread to read the file, it is used when we need to read the file line by line or with a specific length: \n" . fread($myFile, filesize($filename));
echo "\n";

fclose($myFile);
echo "File closed successfully.\n\n";


// Section 2: Working with Convenience Functions
echo "--- Section 2: Convenience Functions ---\n";

echo "Using file_put_contents (Overwriting existing content by default)...\n";
// Note: To append with file_put_contents, you would use the FILE_APPEND flag.
file_put_contents($filename, "Hello world welcome to our exam using file put contents\n");
echo "File written successfully.\n";

echo "Reading file contents:\n";
echo file_get_contents($filename);


// Section 3: File Information Functions
echo "\n--- Section 3: File Checks ---\n";
echo "File exists? " . (file_exists($filename) ? "Yes" : "No") . "\n";
echo "File size: " . filesize($filename) . " bytes\n";
echo "Is directory? " . (is_dir($filename) ? "Yes" : "No") . "\n";
echo "Readfile output:\n";
readfile($filename);
echo "\n";
echo "";
echo "Working with directories\n";

if (!is_dir("NewDirectory")) {
    mkdir("NewDirectory");
    echo "Directory created successfully.\n";
} else {
    echo "Directory already exists.\n";
}

rename("NewDirectory", "RenamedDirectory");
echo "Directory renamed successfully.\n";

if (is_dir("NewDirectory")) {
    rmdir("NewDirectory");
    echo "Directory deleted successfully.\n";
} else {
    echo "Directory does not exist.\n";
}
?>