<?php
/**
 * manifest.php
 * ─────────────────────────────────────────────────────────────
 * Apne folder mein automatically .glb aur .usdz files dhundh
 * kar JSON return karta hai. index.html isko fetch karta hai.
 *
 * Koi configuration nahi chahiye — bas isi folder mein rakho.
 * ─────────────────────────────────────────────────────────────
 */

header('Content-Type: application/json');
header('Cache-Control: no-cache');

// Jis folder mein yeh file hai, usi mein models dhundho
$dir = __DIR__;

// Saari .glb files
$glbFiles  = glob($dir . '/*.glb')  ?: [];
// Saari .usdz files
$usdzFiles = glob($dir . '/*.usdz') ?: [];

// Sirf filename chahiye, full path nahi
$glbFiles  = array_map('basename', $glbFiles);
$usdzFiles = array_map('basename', $usdzFiles);

// Pehli milne wali file use karo (agar multiple hain toh bhi kaam karega)
$result = [
    'glb'   => count($glbFiles)  > 0 ? $glbFiles[0]  : null,
    'usdz'  => count($usdzFiles) > 0 ? $usdzFiles[0] : null,
    'allGlb'  => $glbFiles,
    'allUsdz' => $usdzFiles,
    'status'  => 'ok'
];

echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
