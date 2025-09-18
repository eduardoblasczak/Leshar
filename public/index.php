<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leshar - Login e Cadastro</title>
    <link rel="stylesheet" href="/leshar/public/assets/css/login-cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <main class="login-container">
        <div class="info-panel">
            <img src="/leshar/public/assets/media/logo.png" alt="Logo Leshar" class="logo">
        </div>

        <div class="card-container">
            <div class="card">
                <div class="card-face card-front">
                    <h2>Login</h2>
                    <form id="loginForm">
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <label for="loginEmail">Email:</label>
                            <input type="email" id="loginEmail" name="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Senha:</label>
                            <input type="password" id="loginPassword" name="password" placeholder="Digite sua senha" required>
                        </div>
                        <button type="submit" class="btn">Entrar</button>
                        <p class="charge-form-link"> Não tem uma conta? <a href="#" id="flipToRegister">Cadastre-se</a></p>
                    </form>
                </div>
            <div class="card-face card-back">
                <h2>Cadastro</h2>
                <form id="registerForm">
                    <input type="hidden" name="action" value="register">
                    <div class="form-group">
                        <label for="registerName">Nome:</label>
                        <input type="text" id="registerName" name="name" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email:</label>
                        <input type="email" id="registerEmail" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Senha:</label>
                        <input type="password" id="registerPassword" name="password" placeholder="Crie uma senha forte!" required>
                    </div>
                    <button type="submit" class="btn">Cadastrar</button>
                    <p class="charge-form-link"> Já tem uma conta? <a href="#" id="flipToLogin">Faça Login</a></p>
                </form>
            </div>
        </div>
    </main>
    <script src="/leshar/public/assets/js/login-cadastro.js"></script>
</body>
</html>
