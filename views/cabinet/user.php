<?php include ROOT.'/views/site/header.php';?>

<?php
    // echo "Kabinetik";
    // echo $_SESSION['user'];
    // print_r($user);
?>

<a class="exit" href="/exit">Выход</a>
<br>




<section class="center">
<form class="form__user__data" action="/cabinet/changeUserData" method="post">
    <label for="">login</label>
    <input name="login" type="text" required minlength="3" maxlength="18" value="<?php echo $user['login'];?>"><br><br>
    <label for="">password</label>
    <input name="password" type="text"  required minlength="8" maxlength="18" value="<?php echo $user['password'];?>"><br><br>
    <label for="">E-mail</label>
    <input name="email" type="email"  required minlength='6' value="<?php echo $user['email'];?>"><br><br>
    <button name="submit" type="submit">сохранить</button>
</form>
            
</section>


<?php include ROOT.'/views/site/footer.php';?>




