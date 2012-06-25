<?php if(!checkAccess($db)) {
	echo WRONGRIGHTS;
}
else { ?> 
<?php echo ITEMEDIT_HEADER; ?>
<?php global $searchterm; ?>
<?php global $search_only; ?>
<?php global $itemlist; ?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo ITEMEDIT_SUBHEADER1; ?></legend>
		<?php echo ITEMEDIT_KEYWORDS ?><input type="text" size="50" maxlength="255" name="searchterm" value="<?php echo $searchterm; ?>"><input type="submit" name="search_confirm" value="<?php echo ITEMEDIT_SEARCH; ?>">
	</fieldset>   
</form>
<?php if($search_only) { ?>
    <fieldset>
        <legend><?php echo ITEMEDIT_SUBHEADER2; ?></legend>
        <?php echo ITEMEDIT_SEARCHCOUNT.$itemlist[0]['count']; ?><br />
        <?php if($itemlist[0]['count']>0) { ?>
        <table width="100%" border="1">
        	<?php for($i=0;$i<$itemlist[0]['count'];$i++) { ?>
        	<tr><td width="100px" style="vertical-align: middle;"><img src="<?php echo $itemlist[$i]['imageurl']; ?>" alt="<?php echo $itemlist[$i]['title']; ?>" width="100px" /></td>
        	<td style="vertical-align: top;"><p style="font-weight: bold;"><?php echo $itemlist[$i]['title']; ?></p>
				<?php echo $itemlist[$i]['codes']; ?><br />
				<?php echo ITEMADD_EDITION.$itemlist[$i]['edition']; ?><br />
				<?php echo ITEMADD_AUTHOR0.$itemlist[$i]['author']; ?><br />
				<?php echo ITEMADD_BINDING.$itemlist[$i]['binding']; ?><br />
				<?php echo ITEMADD_PUBDATE.$itemlist[$i]['pubdate']; ?><br />
				<?php echo ITEMADD_NUMPAGES.$itemlist[$i]['numpages']; ?>
			</td>
        	<td width="100px" style="vertical-align: top;">
			<a href="index.php?com=item_mgt_edit_del&amp;itemid=<?php echo $itemlist[$i]['id']; ?>&amp;nav=<?php echo $_GET['nav']; ?>"><?php echo ITEMEDIT_DELITEM; ?></a>
			<a href="index.php?com=item_mgt_edit_edit&amp;itemid=<?php echo $itemlist[$i]['id']; ?>&amp;nav=<?php echo $_GET['nav']; ?>"><?php echo ITEMEDIT_EDITITEM; ?></a>
			<a href="index.php?com=item_mgt_edit_loc&amp;itemid=<?php echo $itemlist[$i]['id']; ?>&amp;nav=<?php echo $_GET['nav']; ?>"><?php echo ITEMEDIT_MOVEITEM; ?></a>
			<a href="index.php?com=item_mgt_edit_give&amp;itemid=<?php echo $itemlist[$i]['id']; ?>&amp;nav=<?php echo $_GET['nav']; ?>">
			<?php if($itemlist[$i]['borrower_id'] > 0) { ?>
				<?php echo ITEMEDIT_GETITEM; ?>
			<?php } else { ?>
				<?php echo ITEMEDIT_GIVEITEM; ?>
			<?php } ?>
			</a>
        	</td></tr>
        	<?php } ?>
        </table>
        <?php } ?>
	</fieldset>
<?php } ?>
<?php } ?>