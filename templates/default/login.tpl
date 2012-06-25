<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo LOGIN; ?></legend>
        <label>Benutzername: <input type="text" name="LUsername" /></label>
        <label>Password: <input type="password" name="LPassword" /></label>
        <input type="submit" name="login" value="Einloggen" />
    </fieldset>
</form>
<ul>
<li><a href="./index.php?com=register&nav=<?php echo $_GET['nav']; ?>"><?php echo REGISTER; ?></a></li>
</ul>