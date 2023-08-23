const ctx = document.getElementById('doughnut').getContext('2d');
const doughnut = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Tiền lương', 'Phụ cấp', 'Tiền thưởng', 'Thu nhập phụ', 'Đầu tư', 'Khác'],
        datasets: [{
             label: 'Percentage',
            data: [65.3, 22.7, 5.2, 6.8, 0, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            hoverBackgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        tooltips: {
            callbacks: {
              label: function(tooltipItem, data) {
                let label = data.labels[tooltipItem.index] || '';
                if (label) {
                  label += ': ';
                }
                label += parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]).toFixed(2) + '\u0025';
                return label;
              }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
let btnThu= document.querySelector('#thu')
let btnChi= document.querySelector('#chi')
let thu= document.querySelector('.ctenthu')
let chi= document.querySelector('.ctenchi')
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
 function load(){
    chi.classList.add('hide');
    btnChi.classList.add('hide');
 }




