
const userDatabase = [
    { name: "Gustavo", email: "gustavo@gmail.com", password: "123" },
    { name: "Eduardo", email: "eduardo@gmail.com", password: "123" },
];


const card = document.querySelector('.card');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const flipToRegisterLink = document.getElementById('flipToRegister');
const flipToLoginLink = document.getElementById('flipToLogin');


flipToRegisterLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.add('is-flipped');
});


flipToLoginLink.addEventListener('click', (event) => {
    event.preventDefault(); 
    card.classList.remove('is-flipped');
});


loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); 

    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const resultadoSpan = document.getElementById('resultado');

    const foundUser = userDatabase.find(user => user.email === email && user.password === password);
    const emailExists = userDatabase.some(user => user.email === email);
    const passwordExists = userDatabase.some(user => user.password === password);

    if (foundUser) {
        resultadoSpan.textContent = `Login efetuado com sucesso! Bem-vindo, ${foundUser.name}!`;
        resultadoSpan.className = 'resultado sucesso';
    } else if (emailExists || passwordExists) {
        resultadoSpan.textContent = 'Você acertou o email ou a senha, mas não ambos.';
        resultadoSpan.className = 'resultado parcial';
    } else {
        resultadoSpan.textContent = 'Email ou senha inválidos!';
        resultadoSpan.className = 'resultado erro';
    }
});

registerForm.addEventListener('submit', (event) => {
    event.preventDefault(); 

    const name = document.getElementById('registerName').value;
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;

  
    if (!name || !email || !password) {
        alert("Por favor, preencha todos os campos!");
        return; 
    }

   
    const userExists = userDatabase.some(user => user.email === email);
    if (userExists) {
        alert("Este email já está cadastrado. Tente fazer login.");
        return; 
    }

    
    const newUser = { name, email, password };
    userDatabase.push(newUser);

    alert("Cadastro realizado com sucesso! Você já pode fazer login.");
    console.log("Banco de dados atualizado:", userDatabase);

    
    registerForm.reset();
    card.classList.remove('is-flipped');
});