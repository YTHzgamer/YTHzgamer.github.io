function updateClock() {
    var now = new Date();
    var second = now.getSeconds();
    var thoiDiemBatDau = new Date('2023-11-29T18:43:00');
    var thoiDiemHienTai = new Date();
    var soMiligiayDaTroiQua = 0;//thoiDiemHienTai - thoiDiemBatDau;
    var soNamDaTroiQua = Math.floor(soMiligiayDaTroiQua / (1000 * 60 * 60 * 24 * 365.25));
    var soThangDaTroiQua = Math.floor((soMiligiayDaTroiQua % (1000 * 60 * 60 * 24 * 365.25)) / (1000 * 60 * 60 * 24 * 30.4375));
    var soNgayDaTroiQua = Math.floor((soMiligiayDaTroiQua % (1000 * 60 * 60 * 24 * 30.4375)) / (1000 * 60 * 60 * 24));
    var soGioDaTroiQua = Math.floor((soMiligiayDaTroiQua % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var soPhutDaTroiQua = Math.floor((soMiligiayDaTroiQua % (1000 * 60 * 60)) / (1000 * 60));
    var clockElement = document.getElementById("clock");
    clockElement.innerHTML = `
    <div class="flip-clock">${soNamDaTroiQua}</div>
    <div class="time">Y</div>
    <div class="flip-clock">${soThangDaTroiQua}</div>
    <div class="time">M</div>
    <div class="flip-clock">${soNgayDaTroiQua}</div>
    <div class="time">d</div>
    <div class="flip-clock">${soGioDaTroiQua}</div>
    <div class="time">h</div>
    <div class="flip-clock">${soPhutDaTroiQua}</div>
    <div class="time">m</div>
    <div class="flip-clock">${second}</div>
    <div class="time">s</div>

        `;

        var flipClocks = document.getElementsByClassName("flip-clock");
        for (var i = 0; i < flipClocks.length; i++) {
            flipClocks[i].style.backgroundColor = 000000;
        }
    }

    setInterval(updateClock, 1000);

function showConfirm() {
  var userConfirmation = confirm("Bạn chắc chắn có muốn tiếp tục không?");
  if (userConfirmation) {
    window.location.href = "page5.html"
  } else {
    alert("Cảm ơn bạn");
  }
}
