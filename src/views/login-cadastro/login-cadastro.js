// Selecionando os elementos do DOM
const card = document.querySelector('.card');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const flipToRegisterLink = document.getElementById('flipToRegister');
const flipToLoginLink = document.getElementById('flipToLogin');

// --- CONTROLE DA ANIMAÇÃO DE VIRAR O CARD ---

flipToRegisterLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.add('is-flipped');
});

flipToLoginLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.remove('is-flipped');
});

// --- LÓGICA DE LOGIN COM FETCH PARA O PHP ---

loginForm.addEventListener('submit', async (event) => {
    event.preventDefault(); 

    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            alert(`Bem-vindo, ${result.user.name}!`);
        } else {
            alert(result.message);
        }

    } catch (error) {
        console.error('Erro ao tentar fazer login:', error);
        alert('Ocorreu um erro de comunicação com o servidor.');
    }
});

// --- LÓGICA DE CADASTRO COM FETCH PARA O PHP ---

registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const name = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);

    try {
        const response = await fetch('cadastro.php', {
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