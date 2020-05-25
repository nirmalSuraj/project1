<?php
/* Smarty version 3.1.31, created on 2020-05-25 12:47:48
  from "C:\xampp\htdocs\project\smarty\templates\bezoeker.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5ecba2546495c0_11371097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b43532d4fb4a2783ee32032106468efb1b30db17' => 
    array (
      0 => 'C:\\xampp\\htdocs\\project\\smarty\\templates\\bezoeker.tpl',
      1 => 1590403666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ecba2546495c0_11371097 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <title>welkome</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>


                    <header>




            <div class="container-fluid" id="nav" >
            
                <div id="extra"> 
                   <div id="logo">
                           <a href="">WP
                            </a>
                        </div>
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
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>

                            </a>
                        </li>
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
            </div>

        </header>
        
        <div class="container" id="container"> 
           <div class="p-3 mb-2 bg-success hidemsg text-white" id='msg' ><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
                    <div class="p-3 mb-2 bg-danger hidemsg text-white" id='error' ><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>

            <div class="row" id="row">
                <div class='col-md-12 col-sm-12 ' id="inhoud">
                    

                    <?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>



                </div> 
            </div> 
        </div>
      

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

        <?php echo '<script'; ?>
 src="../js/nav_regelen.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../js/copyright.js"><?php echo '</script'; ?>
>
        

    </body>
</html><?php }
}
