<?php
    require_once dirname (__FILE__).'/../config.php';


    // KONTROLER strony kalkulatora

    // W kontrolerze niczego nie wysyła się do klienta.
    // Wysłaniem odpowiedzi zajmie się odpowiedni widok.
    // Parametry do widoku przekazujemy przez zmienne.

    //ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
    include _ROOT_PATH.'/app/security/check.php';

    //pobranie parametrów
    function getParams(&$sum,&$period,&$rate){
        $sum = isset($_REQUEST ['sum']) ? $_REQUEST['sum'] : null;
        $period = isset($_REQUEST ['period']) ? $_REQUEST['period'] : null;
        $rate = isset($_REQUEST ['rate']) ? $_REQUEST['rate'] : null;
    }

    //walidacja parametrów z przygotowaniem zmiennych dla widoku
    function validate(&$sum,&$period,&$rate,&$messages) {
        // sprawdzenie, czy parametry zostały przekazane
        if ( ! (isset($sum) && isset($period) && isset($rate))) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            // teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
            return false;
        }
        
        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( $sum == "") {
            $messages [] = 'Nie podano jaka ilość pieniędzy jest potrzebna';
        }

        if ( $period == "") {
            $messages [] = 'Nie podano okresu spłaty';
        }

        if ( $rate == "") {
            $messages [] = 'Nie wybrano oprocentowania';
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

    }

    function process(&$sum,&$period,&$rate,&$messages,&$sumAll) {
        if (empty ( $messages )) { // gdy brak błędów
            global $role;

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
    }
        
    


    //definicja zmiennych kontrolera
    $sum = null;
    $period = null;
    $rate = null;
    $sumALL = null;
    $messages = array();

    //pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
    getParams($sum,$period,$rate);
    if ( validate($sum,$period,$rate,$messages) ) { // gdy brak błędów
        process($sum,$period,$rate,$messages,$sumAll);
    }

    // Wywołanie widoku z przekazaniem zmiennych
    // - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
    //   będą dostępne w dołączonym skrypcie
    include 'kalk_kredyt_view.php';
?>