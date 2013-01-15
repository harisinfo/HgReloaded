<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 11:48:40
         compiled from "C:\wamp\www\Hg_html_V_1\Themes\HI\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292750f53c4eddfe56-56947603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f557f835c617a360295c4ff66e41db2561bd72dd' => 
    array (
      0 => 'C:\\wamp\\www\\Hg_html_V_1\\Themes\\HI\\templates\\index.tpl',
      1 => 1358250490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292750f53c4eddfe56-56947603',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f53c4f221549_99767029',
  'variables' => 
  array (
    'response' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f53c4f221549_99767029')) {function content_50f53c4f221549_99767029($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->tpl_vars['response']->value['page']['page_content'];?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>