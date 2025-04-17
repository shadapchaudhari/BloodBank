// request.js - Handle Blood Request Form Submission
document.getElementById('requestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Blood request submitted!');
    this.reset();
  });