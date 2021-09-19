<!-- <footer class="footer">
    <p>эта футер</p>
</footer> -->

<div id="modal">
    <button class="enter" id="btn-1">вход</button>
    <button class="register" id="btn-2">Регистрация</button>
    <form action="/user/register" name="myForm" onsubmit="return validateForm()" method="POST">
        <div id="my-modal-box">
            <p id="Vhod">Вход</p>
            <input type='text' name="login" placeholder='Логин' required minlength="3" maxlength="18">
            <input type='password' name="password" placeholder='Пароль' required minlength="8" maxlength="18">
            <button class='go' name="submit_enter" type='submit'>Вход</button>
            
        </div><div id="error"></div>
    </form>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/template/js/jquery.fancybox.min.js"></script>
<script src="/template/js/main.js"></script>
<script>
function validateForm() {
    
    var x = document.getElementById('Reg');
    var z = document.getElementById('Vhod');

    if(x != null)
    {
        
       var checkl = checkloginExist();
       var checkE = checkEmailExist();
       
       if(checkE == true && checkl == true ){alert("Регистрация успешна");return true;}
       if(checkE != true || checkl != true ){return false;}

    }

    if(z != null)
    {
        
       var checkl = checklogin();
       var checkP = checkPassword();
       if(checkl == true && checkP == true)return true;
    }
    
    //alert(' lfl');

    
return false;

}









    function checkEmail()
    {
        var x = document.forms["myForm"]["email"].value;
        var h= "<?php echo $h;?>";
        var mas = h.split(',');
        var i =0;

        mas.forEach( function(element){
            if( x == element)i++;
        });
        //alert(i);
        if(i == 0){document.getElementById('error').innerHTML = 'Неверные данные'; return false;}
        if(i != 0)return true;
    }

    function checkEmailExist()
    {
        var x = document.forms["myForm"]["email"].value;
        var h= "<?php echo $h;?>";
        var mas = h.split(',');
        var i =0;

        mas.forEach( function(element){
            if( x == element)i++;
        });
        //alert(i);
        if(i != 0)
        {
            document.getElementById('error').innerHTML = 'email уже зарегистрирован'; 
            return false; 
        }
        if(i == 0)return true;
    }

    function checklogin()
    {
        var x = document.forms["myForm"]["login"].value;
        var h= "<?php echo $t;?>";
        var mas = h.split(',');
        var i =0;

        mas.forEach( function(element){
            if( x == element)i++;
        });
        //alert(i);
        if(i == 0){document.getElementById('error').innerHTML = 'Неверные данные'; return false;}
        if(i != 0)return true;
    
        
    }

    function checkloginExist()
    {
        var x = document.forms["myForm"]["login"].value;
        var h= "<?php echo $t;?>";
        var mas = h.split(',');
        var i =0;

        mas.forEach( function(element){
            if( x == element)i++;
        });
        //alert(i);
        if(i != 0){document.getElementById('error').innerHTML = 'login уже зарегистрирован'; return false;}
        if(i == 0)return true;
    
        
    }

    function checkPassword()
    {
        var x = document.forms["myForm"]["password"].value;
        var h= "<?php echo $p;?>";
        var mas = h.split(',');
        var i =0;

        mas.forEach( function(element){
            if( x == element)i++;
        });
        //alert(i);
        if(i == 0){document.getElementById('error').innerHTML = 'Неверные данные'; return false;}
        if(i != 0)return true;
        
    }

    
</script>
</body>

</html>
