// dashboard.js - Dummy Dashboard View
document.getElementById('donorList').innerHTML = donors.map(d => `<p>${d.name} - ${d.group}</p>`).join('');
document.getElementById('requestList').innerHTML = '<p>Request from Alice for A+ blood</p>';
