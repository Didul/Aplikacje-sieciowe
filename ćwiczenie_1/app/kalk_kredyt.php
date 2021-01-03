<?php
    require_once dirname (__FILE__).'/../config.php';

    // W kontrolerze niczego nie wysyła się do klienta.
    // Wysłaniem odpowiedzi zajmie się odpowiedni widok.
    // Parametry do widoku przekazujemy przez zmienne.

    // 1. pobranie parametrów

    if (isset($_REQUEST ['sum'])) $sum = $_REQUEST ['sum'];
    if (isset($_REQUEST ['period'])) $period = $_REQUEST ['period'];
    if (isset($_REQUEST ['rate'])) $rate = $_REQUEST ['rate'];

    // 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

    // sprawdzenie, czy parametry zostały przekazane
    if ( ! (isset($sum) && isset($period) && isset($rate))) {
        //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
        $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }

    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $sum == "") {
        $messages [] = 'Nie podano jaka ilość pieniędzy jest potrzebna';
    }

    if ( $period == "") {
        $messages [] = 'Nie podano okresu spłaty';
    }

    if ( $rate == "") {
        $messages [] = 'Nie podano wybrano oprocentowania';
    }

    //nie ma sensu walidować dalej gdy brak parametrów
    if (empty( $messages )) {

        // sprawdzenie, czy $x i $y są liczbami całkowitymi
        if (! (is_numeric( $sum ) && $sum > 0)) {
            $messages [] = 'Pierwsza wartość nie jest liczbą dodatnią całkowitą';
        }

        if (! (is_numeric( $period ) && $period > 0)) {
            $messages [] = 'Druga wartość nie jest liczbą dodatnią całkowitą';
        }
        
        if (! is_numeric( $rate )) {
            $messages [] = 'Trzecia wartość nie jest liczbą';
        }	

    }

    // 3. wykonaj zadanie jeśli wszystko w porządku

    if (empty ( $messages )) { // gdy brak błędów

        //konwersja parametrów na int
        $sum = intval($sum);
        $temp = $sum;
        $period = intval($period);
        $rate = floatval($rate);
        $sumAll = 0;

        //wykonanie operacji
        
        $hm = $sum/$period;
        
        for ($i = 0; $i < $period; $i++) {
            $payment = ($temp / $period - $i);
            $temp -= $payment;
            $sumAll += $payment*(1+$rate);
        }
    }

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
    include 'kalk_kredyt_view.php';

?>