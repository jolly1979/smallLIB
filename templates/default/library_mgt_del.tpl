<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?>
<?php echo LIBEDIT_HEADER; ?>
<?php global $lib_list; ?>
	<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    	<fieldset>
        	<legend><?php echo LIBDEL_SUBHEADER; ?></legend>
			<table border="1" width="100%">
			<tr><td></td><td><?php echo LIBDEL_NAME; ?></td></tr>
			<?php for($i=0;$i<$lib_list[0]['count'];$i++) { ?>
			<tr><td width="30px" align="center"><input type="checkbox" name="lib_del___<?php echo $lib_list[$i]['id']; ?>" value="dellib"></td><td><?php echo $lib_list[$i]['name']; ?></td></tr>
			<?php } ?>
			</table>
	        <input type="submit" name="libdel_confirm" value="<?php echo LIBDEL_CONFIRM; ?>" />
		</fieldset>
	</form>
<?php } ?>