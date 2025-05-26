<?php
include 'password.php';
$dbname='aplijk';
// Tworzenie połączenia z bazą danych
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Funkcja dodająca produkt

/*
function AddProduct($conn,$user_id, $nazwa, $opis, $cena, $img) {
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
                    // Pobierz ID nowo dodanego produktu
                    $product_id = $stmt->insert_id;
                    $stmt->close();

                    // Przypisz produkt do użytkownika w tabeli pośredniej
                    $stmt2 = $conn->prepare("INSERT INTO produkty_usera (id_user, id_produkt) VALUES (?, ?)");
                    $stmt2->bind_param("ii", $user_id, $product_id);
                    $stmt2->execute();
                    $stmt2->close();
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
?>*/
function AddProduct($conn, $user_id, $nazwa, $opis, $cena, $img) {
    if (isset($img) && $img['error'] == 0) {
        $nazwa_pliku = $img['name'];
        $tmp_nazwa_pliku = $img['tmp_name'];
        $rozmiar_pliku = $img['size'];
        $typ_pliku = $img['type'];

        $dopuszczalne_typy = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($typ_pliku, $dopuszczalne_typy)) {
            die("Tylko obrazy są dozwolone.");
        }

        if ($rozmiar_pliku > 5 * 1024 * 1024) {
            die("Plik jest za duży. Maksymalny rozmiar to 5 MB.");
        }

        $unikalna_nazwa = uniqid() . '-' . basename($nazwa_pliku);
        $sciezka_docelowa = 'uploads/' . $unikalna_nazwa;

        if (move_uploaded_file($tmp_nazwa_pliku, $sciezka_docelowa)) {
            if (!empty($nazwa) && !empty($opis) && !empty($cena)) {
                $stmt = mysqli_prepare($conn, "INSERT INTO produkty (nazwa, opis, cena, img) VALUES (?, ?, ?, ?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssds", $nazwa, $opis, $cena, $sciezka_docelowa);
                    mysqli_stmt_execute($stmt);
                    $product_id = mysqli_insert_id($conn);
                    mysqli_stmt_close($stmt);

                    $stmt2 = mysqli_prepare($conn, "INSERT INTO produkty_usera (id_user, id_produkt) VALUES (?, ?)");
                    if ($stmt2) {
                        mysqli_stmt_bind_param($stmt2, "ii", $user_id, $product_id);
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_close($stmt2);
                        echo "Produkt został dodany i przypisany do użytkownika!";
                    } else {
                        echo "Błąd przypisywania produktu do użytkownika: " . mysqli_error($conn);
                    }
                } else {
                    echo "Błąd zapisu produktu: " . mysqli_error($conn);
                }
            } else {
                echo "Uzupełnij wszystkie pola!";
            }
        } else {
            echo "Błąd przesyłania pliku.";
        }
    } else {
        echo "Nie wybrano pliku lub wystąpił błąd.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nazwa = $_POST['nazwa'] ?? '';
    $opis = $_POST['opis'] ?? '';
    $cena = $_POST['cena'] ?? '';
    $img = $_FILES['img'] ?? null;



    $user_id = $_SESSION['user_id'];
    AddProduct($conn, $user_id, $nazwa, $opis, $cena, $img);
}

mysqli_close($conn);
?>

<?php

class Link
{
    public $name;
    public $link;
    public $access;


    function __construct($name, $link, $access)
    {
        $this->name = $name;
        $this->link = $link;
        $this->acces = $access;
    }

    function get_name()
    {
        return $this->name;
    }
}


$Link1 = new Link("Konto", "konto.php", 1);
$link2 = new Link("Oferta", "oferta.php", 1);
$link3 = new Link("Kontakt", "kontakt.php", 1);
$link4 = new Link("O nas", "onas.php", 1);
$link5 = new Link("Panel Admina", "adminpanel.php", 3);
$link6=new Link("wyloguj", "wyloguj.php", 2);
$link7=new Link("Produkty", "produkty.php", 2);

$array = array($Link1,$link7, $link2, $link3, $link4, $link5,$link6);


function load($array, $access)
{


    foreach ($array as $link) {
        if ($link->acces <= $access)
            echo "<a href='$link->link' class='btn-men'>$link->name</a>";


    }


}


?>