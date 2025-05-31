<?php
require_once '../config/db.php';

$get_artisans = "SELECT 
    a.id,
    a.name,
    a.about,
    a.phone,
    a.email,
    a.location,
    a.yoe,
    a.completed_project,
    a.image,
    a.national_id,
    a.national_id_front,
    a.national_id_back,
    a.is_verified,
    a.joined_at,
    a.views,
    a.rating,
    p.slug AS category,
    p.name AS categoryName,
    COUNT(r.id) AS reviews
FROM artisans a
JOIN profession p ON a.profession_id = p.id
LEFT JOIN ratings r ON a.id = r.artisan_id
GROUP BY a.id";

$result_artisans = $conn->query($get_artisans);
$professionals = [];
if ($result_artisans->num_rows > 0) {
    while ($row = $result_artisans->fetch_assoc()) {
        $professionals[] = $row;
    }
}
header('Content-Type: application/json');

echo json_encode($professionals, JSON_UNESCAPED_UNICODE);
?>