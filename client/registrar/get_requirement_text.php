<?php
include 'conn.php';

if (isset($_POST['optionValue'])) {
    $optionValue = $_POST['optionValue'];
    $requirementText = getRequirementText($optionValue, $connect); // Call the function to fetch requirement text
    echo $requirementText;
}
function getRequirementText($optionValue, $connect)
{
    $query = "SELECT requirement, payment FROM reg_services LEFT JOIN reg_requirements ON reg_requirements.id = reg_services.requirement_id WHERE reg_services.id = '$optionValue'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    return "Requirements: \n" . $row['requirement'] . "\n\nPayments: \n" . $row['payment'];
}