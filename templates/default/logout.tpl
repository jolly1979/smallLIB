<h3><?php echo WELCOME."<br />".getRealname($db, getUserID($db)) ?></h3>
<?php //echo YOURROLE.getRole($db, getUserAccessLevel($db, getUserID($db))).WHATACCESS.getRole($db, getModuleAccessLevel($db, $_GET['module'])) ?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend>Ausloggen</legend>
        <p class="info">Um sich auszuloggen klicken sie unten auf den Button.</p>
        <input type="submit" name="logout" value="Ausloggen" />
    </fieldset>
</form>