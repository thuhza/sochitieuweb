const btnsw=document.querySelector('.js-register')


const btnlg=document.querySelector(".js-login")
btnsw.addEventListener('click',function(){
    window.location.href='../php/register.php'
})
btnlg.addEventListener('click',function(){
    window.location.href='../php/login.php'
})