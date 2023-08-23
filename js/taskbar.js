const infoBtns = document.querySelectorAll('.js-info')
const modalInfo = document.querySelector('.js-show_info')
function showModalInfo() {
    modalInfo.classList.add('open')
    modal2.classList.remove('open')
}
for (const infoBtn of infoBtns) {
    infoBtn.addEventListener('click', showModalInfo)
}


// close info
const closeInfoBtn = document.querySelector('.js-info-close')
function hideBtnInfo(){
    modalInfo.classList.remove('open')
}
closeInfoBtn.addEventListener('click', hideBtnInfo)


// close when click outward
const authFormsInfos = document.querySelectorAll('.js-auth-form-info')
modalInfo.addEventListener('click', hideBtnInfo)
for (const authForm of authFormsInfos ) { 
    authForm.addEventListener('click', function (event) {
        event.stopPropagation()
    })
}
const logout= document.querySelector('#logout')
logout.addEventListener('click',function(){
   window.location.href="../php/login.php"
})
const profile=document.querySelector('#tcnhan')
profile.addEventListener('click',function(){
    window.location.href='../php/profile.php'
})
const home=document.querySelector('#home')
home.addEventListener('click',function(){
    window.location.href=('../php/index.php')
})
const li=document.querySelectorAll('.li')
li[0].addEventListener('click',function(){
    window.location.href=('../php/Monthly_Report.php')
})
li[1].addEventListener('click',function(){
    window.location.href=('../php/year.php')
})
li[2].addEventListener('click',function(){
    window.location.href=('../html/fulltermreportchart.html')
})