<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/login'); ?>

        <label for="email">Email</label>
        <input type="email" name="email" /><br />

        <label for="password">Password</label>
        <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Login" />

    </form>
</body>
</html>
