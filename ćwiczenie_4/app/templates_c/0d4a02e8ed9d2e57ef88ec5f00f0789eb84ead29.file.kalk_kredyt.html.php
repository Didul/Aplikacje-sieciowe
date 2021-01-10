<?php /* Smarty version Smarty-3.1.17, created on 2021-01-03 16:55:44
         compiled from "C:\xampp\htdocs\kalk_kredyt\ćwiczenie_4\app\kalk_kredyt.html" */ ?>
<?php /*%%SmartyHeaderCode:4009515685ff1e1b2e17349-99716495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d4a02e8ed9d2e57ef88ec5f00f0789eb84ead29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalk_kredyt\\ćwiczenie_4\\app\\kalk_kredyt.html',
      1 => 1609688728,
      2 => 'file',
    ),
    '95ed716b1d9f850dcaf095cd71257948f252431a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalk_kredyt\\ćwiczenie_4\\templates\\main.html',
      1 => 1609689342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4009515685ff1e1b2e17349-99716495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5ff1e1b2e991d9_59572566',
  'variables' => 
  array (
    'page_description' => 0,
    'page_title' => 0,
    'app_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ff1e1b2e991d9_59572566')) {function content_5ff1e1b2e991d9_59572566($_smarty_tpl) {?><!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? 'Opis domyślny' : $tmp);?>
">
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/css/style.css">	
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div class="header">
    <h1>Kalkulator kredytowy</h1>
</div>

<div class="content">

        <div id="container">
            <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/kalk_kredyt.php" method="post">
                <h1>Kalkulator kredytowy</h1>
                <label for="sum">Ile potrzebujesz pieniędzy?
                    <input type="text" name="sum" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['sum'];?>
" placeholder="np. 1000 zł"/>
                </label>

                <label for="period">W jakim czasie zamierzasz spłacić kredyt?
                    <input type="text" name="period" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['period'];?>
" placeholder="np. 12 miesięcy"/>
                </label>

                <label for="rate">Jakie oprocentowanie Cię interesuje?
                    <input id="rate" type="range" name="rate" min="0" max="0.07" step="0.005" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['rate'];?>
" /><div id="percent"></div>
                </label>
                
                <input type="submit" value="Oblicz" />
                
                <div class="messages">

                
                <?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
                    <?php if (count($_smarty_tpl->tpl_vars['messages']->value)>0) {?> 
                            <h4>Wystąpiły błędy: </h4>
                            <ol class="err">
                            <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                            <?php } ?>
                            </ol>
                    <?php }?>
                <?php }?>

                
                <?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
                        <?php if (count($_smarty_tpl->tpl_vars['infos']->value)>0) {?> 
                                <h4>Informacje: </h4>
                                <ol class="inf">
                                <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
                                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                                <?php } ?>
                                </ol>
                        <?php }?>
                <?php }?>

                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
<?php $_tmp6=ob_get_clean();?><?php if (isset($_tmp1)&&$_tmp2!=null&&isset($_tmp3)&&$_tmp4!=null&&isset($_tmp5)&&$_tmp6!=null) {?>
                        <h4>Kredyt będzie kosztować <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value;?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp7+number_format($_tmp8,2);?>
zł</h4>
                        <h4>Średnio rata będzie wynosić <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value;?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['temp']->value;?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
<?php $_tmp11=ob_get_clean();?><?php echo number_format((($_tmp9+$_tmp10)/$_tmp11),2);?>
zł</h4>
                    <?php }?>
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

</div><!-- content -->

<div class="footer">
	<p>
Tutaj znajduję się stopka
	</p>
</div>

</body>
</html><?php }} ?>
