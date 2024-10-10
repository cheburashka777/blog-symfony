function ChatPerehod() {
    window.open('http://neonarod.com/chat_t.php?id=662','Чатик','width=420, height=420')
}

if(window.screen.width < '768') {
document.getElementById('storona').innerHTML = 'Сверху';
}

var text = document.querySelectorAll('#age');
var today = new Date();
var bday = new Date(`15 August 2008`);
var years = today - bday;
for (i=0; i < text.length; i++) {
text[i].innerHTML = new Date(years).getFullYear() - 1970;
}

function update() {
let mesyac = new Date().getMonth();
mesyac = (mesyac == 0) ? "января" : (mesyac == 1) ? "февраля" : (mesyac == 2) ? "марта" : (mesyac == 3) ? "апреля" : (mesyac == 4) ? "мая" : (mesyac == 5) ? "июня" : (mesyac == 6) ? "июля" : (mesyac == 7) ? "августа" : (mesyac == 8) ? "сентября" : (mesyac == 9) ? "октября" : (mesyac == 10) ? "ноября" : (mesyac == 11) ? "декабря" : "ПЯТНИЦА!!!";
let chas = new Date().getHours();
let minuta = new Date().getMinutes();
if (chas < 10) { chas = "0" + chas; }
if (minuta < 10) { minuta = "0" + minuta; }

document.getElementById('bodyDateText').innerHTML = new Date().getDate() + " " + mesyac + " " + new Date().getFullYear() + " года" + "<br>" + `<b>${chas}<span class="dvoetochie">:</span>${minuta}</b>`;
}

setInterval(update, 1000);

if (today.getMonth() == 11 && today.getDate() >= 15 || today.getMonth() == 0 || today.getMonth() == 1 && today.getDate() <= 15) {
    document.body.setAttribute('background', './public/images/NY_background.png');
    document.body.setAttribute('style', 'background-repeat: repeat-x; background-color: #edf2fe; background-position: top;');
    document.getElementById("logo").setAttribute('src', '/public/images/elka.png');
}