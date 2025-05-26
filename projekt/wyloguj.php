<?php
session_start(); // Musisz wystartować sesję, żeby ją potem zniszczyć

// Usuwanie wszystkich zmiennych sesji
$_SESSION = array();

// Jeśli chcesz dodatkowo usunąć ciasteczko sesji (dla pewności)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Zniszczenie sesji
session_destroy();

// Przekierowanie na stronę logowania
header("Location: site.php");
exit();
?>