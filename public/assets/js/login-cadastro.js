const card = document.querySelector('.card');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const flipToRegisterLink = document.getElementById('flipToRegister');
const flipToLoginLink = document.getElementById('flipToLogin');


//  CONTROLE DA ANIMAÇÃO DE VIRAR O CARD 

flipToRegisterLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.add('is-flipped');
});

flipToLoginLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.remove('is-flipped');
});


//  LÓGICA DE CADASTRO 
registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(registerForm);

    try {
        const response = await fetch('/leshar/api/auth.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        alert(result.message);

        if (result.success) {
            registerForm.reset();
            card.classList.remove('is-flipped');
        }
    } catch (error) {
        console.error('Erro ao tentar cadastrar:', error);
        alert('Ocorreu um erro de comunicação com o servidor.');
    }
});


//LÓGICA DE LOGIN 
loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(loginForm);

    try {
        const response = await fetch('/leshar/api/auth.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            window.location.href = 'dashboard.php';
        } else {
            alert(result.message);
        }
    } catch (error) {
        console.error('Erro ao tentar fazer login:', error);
        alert("Ocorreu um erro de comunicação com o servidor.");
    }
});