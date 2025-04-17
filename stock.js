// stock.js - Display Dummy Blood Stock Data
const stockList = document.getElementById('stockList');
const bloodStock = [
  { group: 'A+', quantity: 10 },
  { group: 'B+', quantity: 5 },
  { group: 'O+', quantity: 8 },
  { group: 'AB-', quantity: 2 }
];
stockList.innerHTML = bloodStock.map(stock => `<p>${stock.group}: ${stock.quantity} units</p>`).join('');
