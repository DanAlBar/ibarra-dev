<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names.txt';
$fullNames = load_full_names($fileName);

// $findMe = ',';
// echo $fullNames[0] . '<br>';
// echo strpos($fullNames[0], $findMe) . '<br>';
// echo substr($fullNames[0], 0, strpos($fullNames[0], $findMe));
// exit();

$firstNames = load_first_names($fullNames);
$lastNames = load_last_names($fullNames);

// Get valid names
for($i = 0; $i < sizeof($fullNames); $i++) {
    // jam the first and last name toghether without a comma, then test for alpha-only characters
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
}

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
        echo "<li>$uniqueValidNames</li>";
    }

// ~~~~~~~~~~~~ Unique last names ~~~~~~~~~~~~ //
$uniqueValidLastNames = array_unique($validLastNames);
echo '<h2>Unique Last Names</h2>';
echo "<p>There are " . sizeof($uniqueValidLastNames) . " unique last names</p>";
echo '<ul style="list-style-type:none">';
foreach($uniqueValidLastNames as $lastName) {
    echo "<li>$lastName</li>";
}
echo "</ul>";

// ~~~~~~~~~~~~ Unique first names ~~~~~~~~~~~~ //
$uniqueValidFirstNames = array_unique($validFirstNames);
echo '<h2>Unique First Names</h2>';
echo "<p>There are " . sizeof($uniqueValidFirstNames) . " unique first names</p>";
echo '<ul style="list-style-type:none">';
foreach($uniqueValidFirstNames as $firstName) {
    echo "<li>$firstName</li>";
}
echo "</ul>";

// ~~~~~~~~~~~~ Most common last names ~~~~~~~~~~~~ //
$lastNameCounts = array_count_values($validLastNames);
arsort($lastNameCounts);
echo '<h2>Most Common Last Names</h2>';
echo '<ul style="list-style-type:none">';
foreach($lastNameCounts as $name => $count) {
    echo "<li>$name: $count</li>";
}
echo "</ul>";

// ~~~~~~~~~~~~ Most common first names ~~~~~~~~~~~~ //
$firstNameCounts = array_count_values($validFirstNames);
arsort($firstNameCounts);
echo '<h2>Most Common First Names</h2>';
echo '<ul style="list-style-type:none">';
foreach($firstNameCounts as $name => $count) {
    echo "<li>$name: $count</li>";
}
echo "</ul>";


?>








