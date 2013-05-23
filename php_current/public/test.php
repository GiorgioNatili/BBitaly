<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!empty($_POST)) {
            die(print_r($_POST));
        }
        ?>
        <form method="post">
            <input type="text" name="asd" />
            <input type="submit" name="dsa" value="123">
            <input type="submit" name="dsa" value="124">
        </form>
    </body>
</html>
