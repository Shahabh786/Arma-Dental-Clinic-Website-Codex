<?php
$clinicName = "Arma Dental Clinic";
$phone = "7304996569";
$whatsAppLink = "https://wa.me/91{$phone}";
$callLink = "tel:+91{$phone}";
$tagline = "Smile Design & Dental Wellness";

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
$baseUrl = "{$scheme}://{$host}";

function esc(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function page_url(string $path): string
{
  global $baseUrl;
  return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}
