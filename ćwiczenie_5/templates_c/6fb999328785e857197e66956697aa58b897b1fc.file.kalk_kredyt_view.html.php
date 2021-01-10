<?php /* Smarty version Smarty-3.1.17, created on 2021-01-07 12:03:08
         compiled from "C:\xampp\htdocs\kalk_kredyt\ćwiczenie_5\app\kalk_kredyt_view.html" */ ?>
<?php /*%%SmartyHeaderCode:4774784365ff6ded0a94778-74458201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fb999328785e857197e66956697aa58b897b1fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalk_kredyt\\ćwiczenie_5\\app\\kalk_kredyt_view.html',
      1 => 1610017386,
      2 => 'file',
    ),
    'a0291e5149500c813309e84052c2eefbb1f32b07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kalk_kredyt\\ćwiczenie_5\\templates\\main.html',
      1 => 1610016701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4774784365ff6ded0a94778-74458201',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5ff6ded0b23890_37548387',
  'variables' => 
  array (
    'conf' => 0,
    'page_title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ff6ded0b23890_37548387')) {function content_5ff6ded0b23890_37548387($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Kalkulator kredytowy" : $tmp);?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
\style.css">
        <!-- dodac style z szablonu -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
\js\show.js"></script>
    </head>
    
    <body>
          <!-- dodać header -->
           

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/kalk_kredyt.php" method="post">
                <h1>Kalkulator kredytowy</h1>
                <label for="sum">Ile potrzebujesz pieniędzy?
                    <input type="text" name="sum" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->sum;?>
" placeholder="np. 1000 zł"/>
                </label></br>

                <label for="period">W jakim czasie zamierzasz spłacić kredyt?
                    <input type="text" name="period" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->period;?>
" placeholder="np. 12 miesięcy"/>
                </label></br>

                <label for="rate">Jakie oprocentowanie Cię interesuje?
                    <input id="rate" type="range" name="rate" min="0" max="0.07" step="0.005" value="<?php if ($_smarty_tpl->tpl_vars['form']->value->rate==null) {?> 0.01 <?php } else { ?> $form->rate <?php }?>" />
                    <div id="percent"></div>
                </label></br>
                
                <input type="submit" value="Oblicz" /></br>
                
                <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

                    
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
                            <h4>Wystąpiły błędy: </h4>
                            <ol class="err">
                            <?php  $_smarty_tpl->tpl_vars['err'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['err']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['err']->key => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
                            <?php } ?>
                            </ol>
                    <?php }?>

                    
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
                            <h4>Informacje: </h4>
                            <ol class="inf">
                            <?php  $_smarty_tpl->tpl_vars['inf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getInfos(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->key => $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
                            <?php } ?>
                            </ol>
                    <?php }?>
                    
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->sumAll;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->sumAll;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->temp;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->temp;?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->period;?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sumAll']->value->period;?>
<?php $_tmp6=ob_get_clean();?><?php if (isset($_tmp1)&&$_tmp2!=null&&isset($_tmp3)&&$_tmp4!=null&&isset($_tmp5)&&$_tmp6!=null) {?>
                            <h4>Kredyt będzie kosztować <?php echo $_smarty_tpl->tpl_vars['sumAll']->value;?>
 zł</h4>
                    <?php }?>
                </div>             
            </form>

          <!-- dodać footer -->
    </body>
</html><?php }} ?>
