<!--
Robin Pindel
440 mod11 Programming Assignment
2023-09-26

This program exports the database information from mod8 and mod9 into a PDF output.

References
  FPDF error: Some data has already been output, can’t send PDF. (n.d.-b). Stack Overflow. https://stackoverflow.com/questions/9475686/fpdf-error-some-data-has-already-been-output-cant-send-pdf

  Tatroe, K., & MacIntyre, P. (2020b). Programming PHP: Creating Dynamic Web Pages, Chapter 11 Pages 283 - 285.
-->


<?PHP

ob_start();  // To avoid FPDF output error along with Line 100

require("./fpdf/fpdf.php");

class TablePDF extends FPDF {
  function buildTable($header, $data) {
    // Table color scheme and setup
    $this -> SetFillColor(196,129,153);
    $this -> SetTextColor(255);
    $this -> SetDrawColor(128, 0, 0);
    $this -> SetLineWidth(0.3);
    $this -> SetFont("", "B");
  
    // Header creation
    // Make array for column widths
    // Must match the expected column count from database results
    $widths = array(35, 35, 35, 35, 40);
    // Send headers to PDF document
    for ($i = 0; $i < count($header); $i++) {
      $this -> cell($widths[$i], 7, $header[$i], 1, 0 , "C", 1);
    }
  
    $this -> ln();

    //Color and font restoration
    $this -> SetFillColor(175);
    $this -> SetTextColor(0);
    $this -> SetFont("");
  
    // Spool data from $data array
    // Must match the expected column output from database results
    $fill = 0;
    foreach ($data as $row) {
      $this -> cell($widths[0], 6, $row[0], "LR", 0, "C", $fill);
      $this -> cell($widths[1], 6, $row[1], "LR", 0, "C", $fill);
      $this -> cell($widths[2], 6, $row[2], "LR", 0, "C", $fill);
      $this -> cell($widths[3], 6, $row[3], "LR", 0, "C", $fill);
      $this -> cell($widths[4], 6, $row[4], "LR", 0, "C", $fill);

      $this -> ln();

      $fill = ($fill) ? 0 : 1;
    }
    
    $this -> cell(array_sum($widths), 0, "", "T");
  }
  function header() { //Footer needed per assignment but needs to be in a class as it needs to be an extended empty method
    // Position at 1.5 cm from bottom
    $this -> SetFont("Times", "I", 10);
    $this -> cell(0, 10, "Pindel Pokemon Database | I am the Header | 2023 CSD-440 Mod11 Assignment", 0, 0, "C");
}
  function footer() { //Footer needed per assignment but needs to be in a class as it needs to be an extended empty method
      // Position at 1.5 cm from bottom
      $this -> setY(-15);
      $this -> SetFont("Times", "I", 10);
      $this -> cell(0, 10, "Pindel Pokemon Database | I am the Footer | 2023 CSD-440 Mod11 Assignment", 0, 0, "C");
  }
}

// Database connection and data query
$host = "localhost";
$username = "student1";
$password = "pass";
$databaseName = "baseball_01";

$dbConnection = new mysqli ($host, $username, $password, $databaseName);

$sql = "SELECT * FROM pokemon";
$results = $dbConnection -> query($sql);

// Build $data array from database $results
while ($row = $results -> fetch_assoc()) {
  $data[] = array(
    $row["Pokedex"],
    $row["Name"],
    $row["Type_1"],
    $row["Type_2"],
    $row["Home_Region"]
  );
}

// Start and build the PDF document
$pdf = new TablePDF();

// Column titles
$header = array("Pokedex", "Name", "Type 1", "Type 2", "Home Region");

$pdf -> SetFont("Arial", "B", 14);

$pdf -> AddPage();

// PDF document title
$pdf -> ln(20);
$pdf -> cell(0, 0, "What is this data?", 0, 0, "L");
$pdf -> ln(10);

// PDF document information description
$pdf -> SetFont("Arial", "", 14);
$pdf -> cell(0, 0, "These are the last nine (9) Pokemon found in the original Kanto region pokedex", 0, 0, "L");
$pdf -> ln(6);
$pdf -> cell(0, 0, "presented in a PHP-generated PDF.", 0, 0, "L");
$pdf -> ln(10);

$pdf -> buildTable($header, $data);

$pdf -> ln(10);
$pdf -> SetFont("Arial", "", 8);
$pdf -> cell(0, 0, "(Scroll down for bottom-of-page footer)", 0, 0, "C");

$pdf -> Output();

ob_end_flush();  // To avoid FPDF output error along with Line 100

?>