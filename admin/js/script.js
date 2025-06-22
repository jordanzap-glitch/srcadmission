  function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
        
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const loader = document.getElementById('buttonLoader');
            
            // Disable button to prevent multiple submissions
            button.disabled = true;
            buttonText.style.display = 'none';
            loader.style.display = 'block';
            
            return true;
        });
        
        // Basic client-side validation
        document.getElementById('loginForm').addEventListener('input', function(e) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const button = document.getElementById('loginButton');
            
            // Simple validation to enable/disable button
            if (username.trim() !== '' && password.trim() !== '') {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        });