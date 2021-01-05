<style>
    .gridStyle {
        display: grid;
        grid-template-columns: 80px 180px;
    }
</style>

<?php
include_once("admin_login_check.php");
?>
<button type="submit"><a href="admin.php">
        <div>Return to admin page</div>
    </a></button>
<br><br>
<div class="form">
    <!-- action="script to call" -->
    <!-- name="database header to add to" -->
    <form method="POST" action="insert.php">
        <div class="gridStyle">
            <label for="access">Email: </label><input class="input" type="email" name="email" required placeholder="E-mail">

            <label for="access">Password: </label><input class="input" type="password" name="password" required placeholder="Password">

            <label for="access">First Name: </label><input class="input" type="text" name="fname" required placeholder="First Name">

            <label for="access">Last Name: </label><input class="input" type="text" name="lname" required placeholder="Last Name">

            <label for="access">Job Role: </label><input class="input" type="text" name="jobRole" required placeholder="Job Role">

            <label for="access">Site Role:</label>
            <select name="access" id="access">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <br>
        <button type="submit">ADD</button>
    </form>
</div>