// login.js - Admin Login Validation (dummy)
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const [username, password] = [this.elements[0].value, this.elements[1].value];
    if (username === 'admin' && password === 'admin123') {
      alert('Login successful');
      window.location.href = 'dashboard.html';
    } else {
      alert('Invalid credentials');
    }
  });