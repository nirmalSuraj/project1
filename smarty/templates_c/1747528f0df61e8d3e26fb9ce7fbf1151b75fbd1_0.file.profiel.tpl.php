<?php
/* Smarty version 3.1.31, created on 2020-05-01 16:30:22
  from "C:\xampp\htdocs\project\smarty\templates\profiel.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5eac327e5641a6_40230901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1747528f0df61e8d3e26fb9ce7fbf1151b75fbd1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\project\\smarty\\templates\\profiel.tpl',
      1 => 1588343388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eac327e5641a6_40230901 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>shoppen</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <header>




            <div class="container-fluid" id="nav" >

                <div class="row" id="nav1">

                    <ul >

                        <?php
$__section_teller_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_0_total = $__section_teller_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_0_total != 0) {
for ($__section_teller_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_0_iteration <= $__section_teller_0_total; $__section_teller_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>

                        <?php if ($_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'] == 'fa fa-shopping-cart') {?>
                        <li> <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
"><i class="fa fa-shopping-cart" id="carclick" style="font-size:px; color:#fff; padding: 0px;"></i></a></li>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'] == 'home_klant.php') {?>
                        <li> <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>
"  style="font-size:24px; color:#fff; padding: 0px;"></i></a></li>

                        <?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'] != 'fa fa-shopping-cart' && $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'] != 'home_klant.php' && $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'] != 'Afrekenen' && $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'] != 'Aanpassen') {?>
                                
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
" ><?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>

                            </a>

                        </li>
                        
                        <?php }?>



                        <?php
}
}
if ($__section_teller_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_0_saved;
}
?>


                    </ul>

                </div>
                <div class="row">


                    <div id="buggerbutton">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </div>



            </div>

        </header>

        <div class="container" id="container"> 

           
            <div class="p-3 mb-2 bg-success hidemsg text-white" id='msg' ><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
            <div class="p-3 mb-2 bg-danger hidemsg text-white" id='error' ><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>

            <div class='row'>
               <div class='col-lg-12 col-sm-12'>
                </div>
                    <div class='col-lg-6 col-sm-12'>
                    <div class='janee col-lg-12' id='profiel'>
                        <?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

                    </div>
                     </div>
                <?php
$__section_teller_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_1_total = $__section_teller_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_1_total != 0) {
for ($__section_teller_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_1_iteration <= $__section_teller_1_total; $__section_teller_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>

                <?php if ($_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'] == 'Aanpassen') {?>

                <div class='col-lg-6 col-sm-12'>
                    <div class='janee col-lg-12' id='profiel'>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>
 <?php echo $_smarty_tpl->tpl_vars['producten']->value;?>
 </a>
                    </div>
                     </div>
                    <?php }?>
                    
                    <?php
}
}
if ($__section_teller_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_1_saved;
}
?>

            </div>



        </div>

        


    
       <!-- Footer -->
 <div class="container-fluid col-md-12" id="footer"  >
   <!-- Footer -->
            <footer class="page-footer font-small blue pt-4 col-md-12">


                <!-- Copyright -->
                <div class="footer-copyright text-center py-3" id='owner'>:
                    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
                </div>
                <!-- Copyright -->

            </footer>
</div>

<!-- Footer -->

    <?php
$__section_teller_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['jsInclude']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_2_total = $__section_teller_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_2_total != 0) {
for ($__section_teller_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_2_iteration <= $__section_teller_2_total; $__section_teller_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['jsInclude']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)];?>
"><?php echo '</script'; ?>
>
    <?php
}
}
if ($__section_teller_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_2_saved;
}
?>



    </body>
</html><?php }
}
