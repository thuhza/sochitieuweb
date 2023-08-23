const bt= document.querySelectorAll('.item')
const md=document.querySelectorAll('.contentin')
for(let i=0;i<bt.length;i++){
    bt[i].addEventListener('click',function(){
        md[i].classList.remove('hide')
        for(let j=0;j<bt.length;j++){
            if(j!=i)
                md[j].classList.add('hide');
        }
    })
}
function load(){
    md[0].classList.remove('hide')
    for(let j=1;j<bt.length;j++){
            md[j].classList.add('hide');
    }
}
var btnXoa = document.getElementById('btn-xoa');
var btnThayDoi = document.getElementById('btn-thay-doi');
var formXoaAnh = document.getElementById('form-xoa-anh');
var formThayDoiAnh = document.getElementById('form-thay-doi-anh');

btnXoa.addEventListener('click', function() {
    formXoaAnh.style.display = 'block';
    formThayDoiAnh.style.display = 'none';
});

btnThayDoi.addEventListener('click', function() {
    formThayDoiAnh.style.display = 'block';
    formXoaAnh.style.display = 'none';
});
var button = document.querySelector("#changename");
var ten = document.querySelector("#l");
var form = document.querySelector("#form-ten");

button.addEventListener("click", function() {
    button.style.display = "none";
    ten.style.display = "none";
    form.style.display = "block";
});
var button2 = document.querySelector("#changetuoi");
var ten2=document.querySelector('#ns')
var form2 = document.querySelector("#form-tuoi");

button2.addEventListener("click", function() {
    button2.style.display = "none";
    ten2.style.display = "none";
    form2.style.display = "block";
});
var button3 = document.querySelector("#changesex");
var ten3=document.querySelector('#sex')
var form3 = document.querySelector("#form-sex");

button3.addEventListener("click", function() {
    button3.style.display = "none";
    ten3.style.display = "none";
    form3.style.display = "block";
});
var button4 = document.querySelector("#eml");
var ten4=document.querySelector('#email')
var form4 = document.querySelector("#form-email");

button4.addEventListener("click", function() {
    button4.style.display = "none";
    ten4.style.display = "none";
    form4.style.display = "block";
});
var button5 = document.querySelector("#changepass");
var ten5=document.querySelector('#pass')
var form5 = document.querySelector("#form-mk");

button5.addEventListener("click", function() {
    button5.style.display = "none";
    ten5.style.display = "none";
    form5.style.display = "block";
});
