<?php
include('./config.php');

// Determine records per page
$recordsPerPage = 6;

// Validate and sanitize input
$type = isset($_GET['type']) ? $_GET['type'] : '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;

// Calculate offset
$offset = ($page - 1) * $recordsPerPage;

// Build SQL query based on $type
if ($type == 'new lanch') {
    $sql = "SELECT intrested_properties.*, loc.loc_id, loc.location 
            FROM intrested_properties 
            LEFT JOIN locations AS loc ON intrested_properties.locality = loc.loc_id  
            WHERE intrested_properties.created_on >= DATE_SUB(NOW(), INTERVAL 1 YEAR) 
            AND intrested_properties.prpt_sts = 1 
            LIMIT $recordsPerPage OFFSET $offset";

    $countSql = "SELECT COUNT(*) AS total FROM intrested_properties 
                 LEFT JOIN locations AS loc ON intrested_properties.locality = loc.loc_id 
                 WHERE intrested_properties.created_on >= DATE_SUB(NOW(), INTERVAL 1 YEAR) 
                 AND intrested_properties.prpt_sts = 1";
} elseif ($type == 'Ready To move') {
    $sql = "SELECT intrested_properties.*, loc.loc_id, loc.location 
            FROM intrested_properties 
            LEFT JOIN locations AS loc ON intrested_properties.locality = loc.loc_id  
            WHERE intrested_properties.possession <= DATE_SUB(NOW(), INTERVAL 1 MONTH) 
            AND intrested_properties.prpt_sts = 1 
            LIMIT $recordsPerPage OFFSET $offset";

    $countSql = "SELECT COUNT(*) AS total FROM intrested_properties 
                 LEFT JOIN locations AS loc ON intrested_properties.locality = loc.loc_id 
                 WHERE intrested_properties.possession <= DATE_SUB(NOW(), INTERVAL 1 MONTH) 
                 AND intrested_properties.prpt_sts = 1";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countStmt = $conn->prepare($countSql);
$countStmt->execute();
$totalCount = $countStmt->fetchColumn();

// Calculate total pages
$totalPages = ceil($totalCount / $recordsPerPage);

// Prepare response
$response = [
    'properties' => $results,
    'totalPages' => $totalPages
];

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
