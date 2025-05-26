<?php
include 'password.php';

// Tworzenie połączenia z bazą danych
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Funkcja dodająca produkt
function AddProduct($conn, $nazwa, $opis, $cena, $img) {
    if (isset($img) && $img['error'] == 0) {
        // Informacje o pliku
        $nazwa_pliku = $img['name'];
        $tmp_nazwa_pliku = $img['tmp_name'];
        $rozmiar_pliku = $img['size'];
        $typ_pliku = $img['type'];

        // Sprawdzanie typu pliku (tylko obrazki)
        $dopuszczalne_typy = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($typ_pliku, $dopuszczalne_typy)) {
            die("Tylko obrazy są dozwolone.");
        }

        // Sprawdzanie rozmiaru pliku (np. max 5 MB)
        if ($rozmiar_pliku > 5 * 1024 * 1024) {
            die("Plik jest za duży. Maksymalny rozmiar to 5 MB.");
        }

        // Generowanie unikalnej nazwy pliku
        $unikalna_nazwa = uniqid() . '-' . basename($nazwa_pliku);
        $sciezka_docelowa = 'uploads/' . $unikalna_nazwa;

        // Przenoszenie pliku do folderu
        if (move_uploaded_file($tmp_nazwa_pliku, $sciezka_docelowa)) {
            // Przygotowanie zapytania do bazy (zapisujemy ścieżkę do zdjęcia)
            if (!empty($nazwa) && !empty($opis) && !empty($cena)) {
                $stmt = mysqli_prepare($conn, "INSERT INTO produkty (nazwa, opis, cena, img) VALUES (?, ?, ?, ?)");

                if ($stmt) {
                    // Powiązanie parametrów z zapytaniem
                    mysqli_stmt_bind_param($stmt, "ssss", $nazwa, $opis, $cena, $sciezka_docelowa);

                    // Wykonanie zapytania
                    mysqli_stmt_execute($stmt);

                    echo "Produkt został dodany!";

                    // Zamknięcie zapytania
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Błąd przygotowania zapytania: " . mysqli_error($conn);
                }
            } else {
                echo "Uzupełnij wszystkie pola!";
            }
        } else {
            echo "Błąd podczas przesyłania pliku.";
        }
    } else {
        echo "Nie wybrano pliku lub wystąpił błąd.";
    }
}

// Sprawdzanie, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nazwa = $_POST['nazwa'] ?? '';
    $opis = $_POST['opis'] ?? '';
    $cena = $_POST['cena'] ?? '';
    $img = $_FILES['img'] ?? null;

    AddProduct($conn, $nazwa, $opis, $cena, $img);
}

// Zamknięcie połączenia
mysqli_close($conn);
?>
