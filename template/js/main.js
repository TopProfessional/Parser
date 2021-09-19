function buildModal(containerID, content) {
    document.getElementById(containerID).innerHTML = content;
}

document.getElementById("btn-1").onclick = function () {
    buildModal("my-modal-box", "<p id='Vhod'>Вход</p><input type='text' required name='login' placeholder='Логин' minlength='3' maxlength='18'><input type='text' name='password' required placeholder='Пароль' minlength='8' maxlength='18'><button class='go' name='submit_enter' type='submit'>Вход</button>")
}

document.getElementById("btn-2").onclick = function () {
    buildModal("my-modal-box", " <p id='Reg'>Регистрация</p><input type='text' required name='login' placeholder='Логин' minlength='3' maxlength='18'><input type='text' required name='password' placeholder='Пароль' minlength='8' maxlength='18'><input type='email' required name='email' placeholder='email' minlength='6'><button class='go' name='submit_register' type='submit'>Зарегистрироваться</button>")
}

list.onclick = function (event) {
    if (event.target.tagName != 'SPAN') return;
    
    console.log(event.target.firstElementChild);
    //event.target.firstElementChild.style.transform = 'rotate(180deg)';
    let childrenList = event.target.parentNode.querySelector('ul');
    if (!childrenList) return;
    childrenList.hidden = !childrenList.hidden;
    
    if (childrenList.hidden) {
        event.target.firstElementChild.style.transform = 'rotate(0deg)';
    }

    else {
        event.target.firstElementChild.style.transform = 'rotate(180deg)';
    }
}

function hui(){
    if(!confirm("Удалить блюдо из избранного?"))
    {
        return false;
    }
    else return true; 
}
