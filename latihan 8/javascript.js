let table = document.getElementById('dataPelangganTbl');
let card = document.getElementById('content');

function showTable(){
  table.style.display = 'block';
  table.style.width = '100%';
  card.style.display = 'none';
}
function showCard(){
  table.style.display = 'none';
  card.style.display = 'block'; 
  card.style.width = '100%'; 
}