<?php

    // W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
    // ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

    require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
    require_once $conf->root_path.'/lib/Messages.class.php';
    require_once $conf->root_path.'/app/kalk_kredyt_form.class.php';
    require_once $conf->root_path.'/app/kalk_kredyt_sumAll.class.php';

    /** Kontroler kalkulatora
     * @author Przemysław Kudłacik
     *
     */
    class kalk_kredyt_ctrl {

        private $msgs;   //wiadomości dla widoku
        private $form;   //dane formularza (do obliczeń i dla widoku)
        private $sumAll;
        private $temp; //inne dane dla widoku

        /** 
        * Konstruktor - inicjalizacja właściwości
        */
        public function __construct(){
                //stworzenie potrzebnych obiektów
                $this->msgs = new Messages();
                $this->form = new kalk_kredyt_form();
                $this->sumAll = new kalk_kredyt_sumAll();
        }

        /** 
        * Pobranie parametrów
        */
        public function getParams(){
                $this->form->sum = isset($_REQUEST ['sum']) ? $_REQUEST ['sum'] : null;
                $this->form->period = isset($_REQUEST ['period']) ? $_REQUEST ['period'] : null;
                $this->form->rate = isset($_REQUEST ['rate']) ? $_REQUEST ['rate'] : null;
                
        }

        /** 
        * Walidacja parametrów
        * @return true jeśli brak błedów, false w przeciwnym wypadku 
        */
        public function validate() {
               // sprawdzenie, czy parametry zostały przekazane
               if (! ((isset ( $this->form->sum ) && isset ( $this->form->period ) && isset ( $this->form->rate )))) {
                       // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                       return false; //zakończ walidację z błędem
               }
               
               // sprawdzenie, czy potrzebne wartości zostały przekazane
               if ($this->form->sum == "") {
                       $this->msgs->addError('Nie podano jaka ilość pieniędzy jest potrzebna');
               }
               if ($this->form->period == "") {
                       $this->msgs->addError('Nie podano okresu spłaty');
               }

               if ($this->form->rate == "") {
                       $this->msgs->addError('Nie wybrano oprocentowania');
               }

               // nie ma sensu walidować dalej gdy brak parametrów
               if (! $this->msgs->isError()) {

                       // sprawdzenie, czy $x i $y są liczbami całkowitymi
                       if (! is_numeric ( $this->form->sum )) {
                               $this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
                       }

                       if (! is_numeric ( $this->form->period )) {
                               $this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
                       }

                       if (! is_numeric ( $this->form->rate )) {
                               $this->msgs->addError('Druga wartość nie jest liczbą');
                       }
               }
        }

        /** 
        * Pobranie wartości, walidacja, obliczenie i wyświetlenie
        */
       public function process(){
               $this->generateView();

               $this->getParams();

               if ($this->validate()) {
                   
                        //konwersja parametrów na int
                        $this->form->sum = intval($this->form->sum);
                        $this->form->period = intval($this->form->period);
                        $this->form->rate = floatval($this->form->rate);  
                        $this->sumAll = 0;
                        $this->temp = 0;
                        $this->msgs->addInfo('Parametry poprawne.');

                       

                        //wykonanie operacji        

                        for ($i = 0; $i < $this->form->period; $i++) {
                            $payment = $this->temp/($this->form->period-$i);
                            $this->temp -= $payment;
                            $this->sumAll += $payment*(1+ $this->form->rate);
                        }
                       $this->msgs->addInfo('Wykonano obliczenia.');
            }

            return ! $this->msgs->isError();
        }

        /**
        * Wygenerowanie widoku
        */
       public function generateView(){
               global $conf;
               

               $smarty = new Smarty();
               $smarty->assign('conf',$conf);

               $smarty->assign('page_title','Ćwiczenie 5');
               $smarty->assign('page_header','Obiektowość w PHP');

               $smarty->assign('msgs',$this->msgs);
               $smarty->assign('form',$this->form);
               $smarty->assign('sumAll',$this->sumAll);
               $smarty->assign('temp',$this->temp);
               $smarty->assign('period',$this->form->period);

               $smarty->display($conf->root_path.'/app/kalk_kredyt_view.html');
       }
    }
?>