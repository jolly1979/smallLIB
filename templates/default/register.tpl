<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
    <fieldset>
        <legend><?php echo REGISTER; ?></legend>
		<table>
		<tr><td><label>Name:</td><td><input type="text" name="Realname" /></label></td></tr>
        <tr><td><label>Username:</td><td><input type="text" name="Username" /></label></td></tr>
        <tr><td><label>Password:</td><td><input type="password" name="Password[]" /></label></td></tr>
        <tr><td><label>Bestätigung:</td><td><input type="password" name="Password[]" /></label></td></tr>
        <tr><td><label>Email:</td><td><input type="text" name="Email" /></label></td></tr>
        <tr><td><label>Wieviel ist 1+1?</td><td><input type="text" name="Antwort" /></label></td></tr>
        </table>
		<input type="submit" name="register" value="Registieren" />
    </fieldset>
</form>