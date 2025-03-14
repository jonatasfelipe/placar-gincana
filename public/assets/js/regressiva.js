const segundo = 1000;
const minuto = segundo * 60;
const hora = minuto * 60;
const dia = hora * 24;

let count_down = new Date('03/20/2025 09:00:00').getTime();
let x = setInterval(() => countDown(), segundo);

function countDown() {
  let now = new Date(Date.now()).getTime();
  let diff = count_down - now;

  document.getElementById('dias').innerText = Math.floor(diff / dia);
  document.getElementById('horas').innerText = Math.floor(diff % dia / hora);
  document.getElementById('minutos').innerText = Math.floor(diff % hora / minuto);
  document.getElementById('segundos').innerText = Math.floor(diff % minuto / segundo);
}

function resetCountdown() {
  clearInterval(x);
  let date_end = document.form_main.date_end.value;
  count_down = new Date(`${date_end} 00:00:00`).getTime();
  x = setInterval(() => countDown(), segundo);
}