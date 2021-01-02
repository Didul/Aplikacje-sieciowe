<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kalkulator kredytowy</title>
        <link rel="stylesheet" href="<?php echo _APP_ROOT.'/style.css'; ?>">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>
        <div style="width:90%; margin: 2em auto;">
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
        </div>
        
        <div id="container">
            <form action="<?php echo _APP_URL; ?>/app/kalk_kredyt.php" method="post">
                <h1>Kalkulator kredytowy</h1>
                <label for="sum">Ile potrzebujesz pieniędzy?
                    <input type="text" name="sum" value="<?php out($sum);?>" placeholder="np. 1000 zł"/>
                </label>

                <label for="period">W jakim czasie zamierzasz spłacić kredyt?
                    <input type="text" name="period" value="<?php out($period);?>" placeholder="np. 12 miesięcy"/>
                </label>

                <label for="rate">Jakie oprocentowanie Cię interesuje?
                    <input id="rate" type="range" name="rate" min="0" max="0.07" step="0.005" value="<?php out($rate);?>" /><div id="percent"></div>
                </label>
                
                <input type="submit" value="Oblicz" />
                
                <?php
                    //wyświeltenie listy błędów, jeśli istnieją
                    if (isset($messages)) {
                        if (count ( $messages ) > 0) {
                            echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
                            foreach ( $messages as $msg ) {
                                echo '<li>'.$msg.'</li>';
                            }
                            echo '</ol>';
                        }
                    }
                ?>
                
                <?php
                    if (isset($sumAll) && isset($temp) && isset($period)) {
                        echo 'Kredyt będzie kosztować '.round($sumAll+$temp,2).' zł.</br>';
                        echo 'Średnio rata będzie wynosić '.round(($sumAll+$temp)/$period,2).' zł.';
                    }
                ?>
                                
            </form>
        </div>
        <script type="text/javascript">
            let rate = document.querySelector('#rate');
            let percent = document.querySelector('#percent');

            percent.textContent = (rate.value*100).toFixed(1) + "%";
            rate.addEventListener('input', () => {
                percent.textContent = (rate.value*100).toFixed(1) + "%";
            });
        </script>
    </body>
</html>