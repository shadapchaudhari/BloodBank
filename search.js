// search.js - Simple Blood Group Search
const donors = [
    { name: 'John', group: 'A+' },
    { name: 'Jane', group: 'B+' },
    { name: 'Mike', group: 'O+' },
  ];
  function searchBlood() {
    const input = document.getElementById('searchInput').value.toUpperCase();
    const results = donors.filter(d => d.group === input);
    const resultDiv = document.getElementById('searchResults');
    resultDiv.innerHTML = results.length
      ? results.map(d => `<p>${d.name} - ${d.group}</p>`).join('')
      : '<p>No donors found.</p>';
  }