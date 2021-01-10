<?php
    // KONTROLER strony kalkulatora
    require_once dirname(__FILE__).'/../config.php';
    //załaduj Smarty
    require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';


    //pobranie parametrów
    function getParams(&$form){
        $form['sum'] = isset($_REQUEST['sum']) ? $_REQUEST['sum'] : null;
	$form['period'] = isset($_REQUEST['period']) ? $_REQUEST['period'] : null;
	$form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;	
    }

    //walidacja parametrów z przygotowaniem zmiennych dla widoku
    
    function validate(&$form,&$infos,&$messages,&$hide_intro) {
        if ( ! (isset($form['sum']) && isset($form['period']) && isset($form['rate']) ))	return false;

        $hide_intro = true;

        $infos [] = 'Przekazano parametry.';

        if ( $form['sum'] == "") $msgs [] = 'Nie podano jaka ilość pieniędzy jest potrzebna';
	if ( $form['period'] == "") $msgs [] = 'Nie podano okresu spłaty';
        if ( $form['rate'] == "") $msgs [] = 'Nie wybrano oprocentowania';
        
        if ( count($messages)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['sum'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['period'] )) $msgs [] = 'Druga wartość nie jest liczbą';
                if (! is_numeric( $form['rate'] )) $msgs [] = 'Trzecia wartość nie jest liczbą';
	}
	
	if (count($messages)>0) return false;
	else return true;
    }

    function process(&$form,&$infos,&$messages,&$sumAll,&$temp) {
        $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na float
	$form['sum'] = floatval($form['sum']);
        $temp = $form['sum'];
	$form['period'] = floatval($form['period']);
        $form['rate'] = floatval($form['rate']);
        $sumAll = 0;
	
	//wykonanie operacji        
        
        for ($i = 0; $i < $form['period']; $i++) {
            $payment = $temp/($form['period']-$i);
            $temp -= $payment;
            $sumAll += $payment*(1+$form['rate']);
        }
    }
        
    


    //definicja zmiennych kontrolera
    $form = null;
    $sumAll = null;
    $temp = null;
    $messages = array();
    $infos = array();

getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$sumAll,$temp);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Ćwiczenie 4');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('sumAll',$sumAll);
$smarty->assign('temp',$temp);
$smarty->assign('period',$form['period']);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/kalk_kredyt.html');
?>