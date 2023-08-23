function change(date){
    var form = document.getElementById("thongke");
    var formData = new FormData(form);
    formData.append('date',select.value);
    // Tạo một yêu cầu XMLHttpRequest đến file thongke.php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Nếu yêu cầu thành công, cập nhật nội dung của phần tử tương ứng
            document.getElementById("thongke").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "thongkethang-form.php", true);
    xhttp.send(formData);
}
const selects = document.querySelectorAll("select");

selects.forEach(function(select) {
  select.addEventListener("change", change);
});
window.onload = function() {
    var form = document.getElementById("thongke");
    var formData = new FormData(form);
    formData.append('date',01);
    // Tạo một yêu cầu XMLHttpRequest đến file thongke.php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Nếu yêu cầu thành công, cập nhật nội dung của phần tử tương ứng
            document.getElementById("thongke").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "thongkethang-form.php", true);
    xhttp.send(formData);
};

