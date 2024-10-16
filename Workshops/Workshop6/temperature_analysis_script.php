<?php
$temperatures = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

$average_temp = array_sum($temperatures) / count($temperatures);
echo "Average Temperature is : " . round($average_temp, 1) . "\n";

$unique_temps = array_unique($temperatures);
sort($unique_temps);

$lowest_temps = array_slice($unique_temps, 0, 5);
echo "List of 5 lowest temperatures (no duplicates) : " . implode(', ', $lowest_temps) . "\n";

$highest_temps = array_slice($unique_temps, -5);
echo "List of 5 highest temperatures (no duplicates) : " . implode(', ', $highest_temps) . "\n";
?>