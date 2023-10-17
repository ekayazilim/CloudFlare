<?php
$apiKey = "apikey"; // Cloudflare API anahtarınızı buraya ekleyin
$email = "info@ekayazilim.com.tr"; // Cloudflare hesap e-posta adresiniz
$domain = "ekayazilim.com.tr"; // DNS kayıtlarını silmek istediğiniz alan adı
$apiUrl = "https://api.cloudflare.com/client/v4/zones"; // Cloudflare API URL'si

// Zoneleri çek
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "{$apiUrl}?name={$domain}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "X-Auth-Email: {$email}",
    "X-Auth-Key: {$apiKey}",
    "Content-Type: application/json"
));
$response = curl_exec($ch);
curl_close($ch);

$zoneData = json_decode($response, true);

if (isset($zoneData['success']) && $zoneData['success'] && isset($zoneData['result']) && count($zoneData['result']) > 0) {
    $zoneId = $zoneData['result'][0]['id'];

    // Zonun tüm DNS kayıtlarını çek
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "{$apiUrl}/{$zoneId}/dns_records");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "X-Auth-Email: {$email}",
        "X-Auth-Key: {$apiKey}",
        "Content-Type: application/json"
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    $dnsRecords = json_decode($response, true);

    if (isset($dnsRecords['success']) && $dnsRecords['success'] && isset($dnsRecords['result']) && count($dnsRecords['result']) > 0) {
        foreach ($dnsRecords['result'] as $record) {
            // Her bir DNS kaydını sil
            $recordId = $record['id'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "{$apiUrl}/{$zoneId}/dns_records/{$recordId}");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-Auth-Email: {$email}",
                "X-Auth-Key: {$apiKey}",
                "Content-Type: application/json"
            ));
            $response = curl_exec($ch);
            curl_close($ch);

            echo "DNS Record '{$record['name']}' deleted.\n";
        }
    } else {
        echo "No DNS records found for the zone.\n";
    }
} else {
    echo "Zone not found.\n";
}
?>
