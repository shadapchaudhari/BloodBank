// donor.js - Handle Donor Form Submission
document.getElementById('donorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Donor registered successfully!');
    this.reset();
  });