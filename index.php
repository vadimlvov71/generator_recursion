<?php
//PHP code that generates an array of days of the week with a random selection of breakfast options for each day.
//string of days
$daysOfWeekString = "mon tues wednes thurs fri satur sun";

 //generated of days       
$generatedArray = generateArray($daysOfWeekString);

$randomOptionsArray = randomUniqueSelectedOptions();

$result = [];
$i = 0;
foreach ($generatedArray as $day) {
    $result[$day] = $randomOptionsArray[$i];
    $i++;
}
echo "<pre>";
print_r($result);
echo "</pre>";


function generateArray(string $daysOfWeekString): object
{
    $daysOfWeekArray = explode(" ", $daysOfWeekString);
    for ($i = 0; $i <= 6; $i++) {
        yield $daysOfWeekArray[$i]."day";
    }
}
function randomUniqueSelectedOptions(array $result = []): array 
{
    $breakfastOptions = ['soup', 'porridge', 'fried potatoes', 'stew', 'barbecue', 'broiled fish', 'pudding'];

    foreach ($breakfastOptions as $option) {
        $randomValue = $breakfastOptions[array_rand($breakfastOptions, 1)];
        if (!in_array($randomValue, $result)) {
            $result[] = $randomValue;
        }
    }

    if (count($result) < 7) {
        return randomUniqueSelectedOptions($result);
    }

    return $result;
}
