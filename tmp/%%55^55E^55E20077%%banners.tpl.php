<?php /* Smarty version 2.6.14, created on 2008-04-19 09:59:36
         compiled from banners.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2><?php echo $this->_tpl_vars['lang']['banners']; ?>
</h2>
<?php if ($this->_tpl_vars['aff']['approved'] == 2): ?>
	<?php echo $this->_tpl_vars['lang']['products']; ?>
 - 
		<select onchange="getBanners(this.options[this.selectedIndex].value)">
		<option value="">- All -</option>
		<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pid'] => $this->_tpl_vars['product']):
?>
		<option value="<?php echo $this->_tpl_vars['pid']; ?>
" <?php if ($_GET['pid'] == $this->_tpl_vars['pid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['product']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
	</select><br />&nbsp;
	<table cellpadding="2" cellspacing="1" class="banners">
		<tr style="background-color: #E5E5E5; font-weight: bold;">
			<td width="25%"><?php echo $this->_tpl_vars['lang']['banner_name']; ?>
</td>
			<td width="25%"><?php echo $this->_tpl_vars['lang']['banner_size']; ?>
</td>
			<td><?php echo $this->_tpl_vars['lang']['banner_desc']; ?>
</td>
		</tr>
		<?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
		<tr>
			<td><a href="banner-details.php?id=<?php echo $this->_tpl_vars['banner']['id'];  if ($_GET['pid'] > 0): ?>&pid=<?php echo $_GET['pid'];  endif; ?>"><?php echo $this->_tpl_vars['banner']['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['banner']['x']; ?>
x<?php echo $this->_tpl_vars['banner']['y']; ?>
</td>
			<td><?php echo $this->_tpl_vars['banner']['desc']; ?>
</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<script type="text/javascript">
	<?php echo '
	function getBanners(val)
	{
		var loc = document.location.href;
		
		if(loc.indexOf(\'pid=\')>-1 && parseInt(val)>0)
		{
			loc = loc.replace(/pid\\=(\\d+)/,\'pid=\'+val);
			document.location.href = loc;
		}
		else if(parseInt(val)>0)
		{
			document.location.href = loc+"?pid="+val;
		}
		else
		{
			loc = loc.replace(/\\?pid\\=(\\d+)?$/,\'\');
			document.location.href = loc;
		}
	}
	'; ?>

	</script>
<?php else: ?>
	<strong><?php echo $this->_tpl_vars['lang']['msg_account_pending_approval']; ?>
</strong>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>