<?php

include('./config.php');

$term = $_POST['term']; // Term sent from frontend

$properties = "SELECT ip.prpt_id, ip.type ,SUBSTRING(ip.property_name, 1, 3) AS property_name,ip.property_name ,ip.locality,loc.loc_id,loc.location as locationn  FROM intrested_properties AS ip LEFT JOIN locations AS loc ON ip.locality = loc.loc_id WHERE ip.property_name LIKE  '$term%' AND ip.prpt_sts = 1  LIMIT 100";
$stmt = $conn->prepare($properties);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$results_array = array();
// echo $properties;
$matches = array();

foreach ($results as $row) {
    $match = array(
        'value' => $row['property_name'].",".$row['locationn'],
        'label' => $row['property_name'].",".$row['locationn']."(".$row['type'].")",
        'type' => 'project',
        'pro_id' => $row['prpt_id']
    );
    $matches[] = $match;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($matches);
?>