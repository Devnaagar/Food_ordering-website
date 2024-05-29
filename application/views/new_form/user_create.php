<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h2>Create User</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/store'); ?>

        <label for="name">Name</label>
        <input type="text" name="name" /><br />

        <label for="email">Email</label>
        <input type="email" name="email" /><br />

        <label for="password">Password</label>
        <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Create User" />

    </form>
</body>
</html>