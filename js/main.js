let monthEle = document.querySelector('.month');
let yearEle = document.querySelector('.year');
let btnNext = document.querySelector('.btn-next');
let btnPrev = document.querySelector('.btn-prev');
let dateEle = document.querySelector('.date-container');
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let btnThu= document.querySelector('.thu')
let btnChi= document.querySelector('.chi')
let thu= document.querySelector('.ctenthu')
let chi= document.querySelector('.ctenchi')
let currentDay=document.querySelectorAll('.nwdate')
function displayInfo() {
    // Hiển thị tên tháng
    let currentMonthName = new Date(
        currentYear,
        currentMonth
    ).toLocaleString('en-us', { month: 'long' });

    monthEle.innerText = currentMonthName;

    // Hiển thị năm
    yearEle.innerText = currentYear;
    
    // Hiển thị ngày trong tháng
    renderDate();
    chi.classList.add('hide');
    btnChi.classList.add('hide');
    var today = new Date();
      var year = today.getFullYear();
      var month = today.getMonth() + 1;
      var day = today.getDate();
      var form = document.getElementById("thongke");
      var formData = new FormData(form);
      formData.append('date',year+'-'+month+'-'+day);
      // Tạo một yêu cầu XMLHttpRequest đến file thongke.php
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              // Nếu yêu cầu thành công, cập nhật nội dung của phần tử tương ứng
              document.getElementById("thongke").innerHTML = this.responseText;
          }
      };
      xhttp.open("POST", "thongke_form.php", true);
      xhttp.send(formData);
}

// Lấy số ngày của 1 tháng
function getDaysInMonth() {
    return new Date(currentYear, currentMonth + 1, 0).getDate();
}

// Lấy ngày bắt đầu của tháng
function getStartDayInMonth() {
    return new Date(currentYear, currentMonth, 1).getDay();
}

// Active current day
function activeCurrentDay(day) {
    let day1 = new Date().toDateString();
    let day2 = new Date(currentYear, currentMonth, day).toDateString();
    return day1 == day2 ? 'active' : '';
}
let selectedDay = null;

// Hiển thị ngày trong tháng lên trên giao diện
function renderDate() {
    let daysInMonth = getDaysInMonth();
    let startDay = getStartDayInMonth();
  
    dateEle.innerHTML = '';
  
    for (let i = 0; i < startDay; i++) {
      dateEle.innerHTML += `
        <div class="day"></div>
      `;
    }
  
    for (let i = 0; i < daysInMonth; i++) {
      dateEle.innerHTML += `
        <div class="day ${activeCurrentDay(i + 1)}">
          ${i + 1}
        </div>
      `;
    }
  
    const days = document.querySelectorAll('.day');
    days.forEach((day) => {
      day.addEventListener('click', handleClick);
    });
  }
  
// Xử lý khi ấn vào nút next month
btnNext.addEventListener('click', function () {
    if (currentMonth == 11) {
        currentMonth = 0;
        currentYear++;
    } else {
        currentMonth++;
    }
    displayInfo();
});

// Xử lý khi ấn vào nút previous month
btnPrev.addEventListener('click', function () {
    if (currentMonth == 0) {
        currentMonth = 11;
        currentYear--;
    } else {
        currentMonth--;
    }
    displayInfo();
});

window.onload = displayInfo;



// info-nhóm


// xử lí ấn nút chi
btnChi.addEventListener('click',function (){
    thu.classList.add('hide');
    chi.classList.remove('hide');
    btnThu.classList.add('hide');
    btnChi.classList.remove('hide');
 })
 btnThu.addEventListener('click',function(){
    thu.classList.remove('hide');
    chi.classList.add('hide');
    btnChi.classList.add('hide')
    btnThu.classList.remove('hide');
 })
// Lấy danh sách tất cả các div có class là "day"

// Lặp qua từng phần tử và thêm sự kiện click cho chúng
function handleClick(event) {
    const selectedDay = event.target;
    if (selectedDay.classList.contains('day')) {
      const days = document.querySelectorAll('.day');
      days.forEach((day) => {
        if (day !== selectedDay) {
          day.classList.remove('active');
        }
      });
      selectedDay.classList.add('active');
      const date = new Date(currentYear, currentMonth, selectedDay.textContent);
      const day = date.getDate().toString().padStart(2, '0');
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const year = date.getFullYear();
  
      // Thêm giá trị ngày tháng năm vào tất cả các input có class "my-input"
      const inputs = document.querySelectorAll('.date');
      inputs.forEach((input) => {
        input.value = `${year}-${month}-${day}`;
      });
      const dy =document.querySelector('#date');
        dy.value=`${year}-${month}-${day}`
        var form = document.getElementById("thongke");
        var formData = new FormData(form);
        formData.append('date',`${year}-${month}-${day}`);
        // Tạo một yêu cầu XMLHttpRequest đến file thongke.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nếu yêu cầu thành công, cập nhật nội dung của phần tử tương ứng
                document.getElementById("thongke").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "thongke_form.php", true);
        xhttp.send(formData);
  }}
  const form = document.getElementById('ctentthu');
  form.addEventListener('submit', (event) => {
    event.preventDefault(); // ngăn chặn hành vi mặc định của form

    const formData = new FormData(form);
    fetch('addthu.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        form.giatri.value = "";
    
    // Lấy danh sách các ô radio của trường danh mục
    var danhMucRadios = form.danhmuc;
    
    // Lặp qua từng ô radio và bỏ chọn tất cả
    for (var i = 0; i < danhMucRadios.length; i++) {
      danhMucRadios[i].checked = false;
    }
        // tùy chỉnh các hành động của bạn sau khi thêm thành công
      } else {
        alert('Thêm thất bại')
      }
    })
    .catch(error => console.error(error));
  });
 const fm = document.getElementById('ctentchi');
 fm.addEventListener('submit',(event)=>{
  event.preventDefault();
  const formData = new FormData(fm);
  fetch('addchi.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      form.giatri.value = "";
  
  // Lấy danh sách các ô radio của trường danh mục
  var danhMucRadios = form.danhmuc;
  
  // Lặp qua từng ô radio và bỏ chọn tất cả
  for (var i = 0; i < danhMucRadios.length; i++) {
    danhMucRadios[i].checked = false;
  }
      // tùy chỉnh các hành động của bạn sau khi thêm thành công
    } else {
      alert('Thêm thất bại')
    }
  })
  .catch(error => console.error(error));
 })