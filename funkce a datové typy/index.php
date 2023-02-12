<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>

<?php
function test_conversion($input, $expected_type) {
  try {
    settype($input, $expected_type);
    $output = gettype($input);
  } catch (Throwable $t) {
    $output = $t->getMessage();
  }
  return $output;
}

$input_types = array(1, 1.5, "1.5", true, [1, 2, 3], new stdClass());
$expected_types = array("int", "float", "string", "bool");
$results = array();

foreach ($input_types as $input_type) {
  foreach ($expected_types as $expected_type) {
    $output = test_conversion($input_type, $expected_type);
    $results[] = array(
      "input" => $input_type,
      "expected" => $expected_type,
      "output" => $output
    );
  }
}

$table = '<table>
            <tr>
                <th>Input</th>
                <th>Expected</th>
                <th>Output</th>
            </tr>';
foreach ($results as $result) {
  $table .= "<tr>";
  $table .= "<td>" . htmlspecialchars(gettype($result['input'])) . "</td>";
  $table .= "<td>" . htmlspecialchars($result['expected']) . "</td>";
  $table .= "<td>" . htmlspecialchars($result['output']) . "</td>";
  $table .= "</tr>";
}
$table .= "</table>";

echo $table;
?>

</body>
</html>