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
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <style>
            .center {
                width: 22em;
                margin: auto;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            
        </style>
    </head>
    <body>
        <div style="width:90%; margin: 2em auto;">
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
        </div>
        
        <div>
            <form class="pure-form pure-form-stacked pure-g center" style="background: rgba(200,200,200,.3); border-radius: 1.3em; padding: 3em;"action="<?php echo _APP_URL; ?>/app/kalk_kredyt.php" method="post">
                <h1 style="letter-spacing: 0.01em">Kalkulator kredytowy</h1>
                <label class="pure-u-1" for="sum">Ile potrzebujesz pieniędzy?
                    <input class="pure-input-1-3 pure-input-rounded" type="text" name="sum" value="<?php out($sum);?>" placeholder="np. 1000 zł"/>
                </label>

                <label class="pure-u-1" for="period">W jakim czasie zamierzasz spłacić kredyt?
                    <input class="pure-input-1-3 pure-input-rounded" type="text" name="period" value="<?php out($period);?>" placeholder="np. 12 miesięcy"/>
                </label>

                <label class="pure-u-1" for="rate">Jakie oprocentowanie Cię interesuje?
                    <input class="pure-u-2-3" id="rate" type="range" name="rate" min="0" max="0.07" step="0.005" value="<?php out($rate);?>" /><div class="pure-u-1-3" id="percent"></div>
                </label>
                
                <button type="submit" class="pure-button pure-button-primary" style="background: rgb(12, 128, 128);">Oblicz</button>                         
            </form>
            
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
                if (isset($sumAll) && isset($sum) && isset($period)) {
                    echo 'Kredyt będzie kosztować '.round($sumAll,2).' zł.</br>';
                    echo 'Średnio rata będzie wynosić '.round(($sumAll)/$period,2).' zł.';
                }
            ?>
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