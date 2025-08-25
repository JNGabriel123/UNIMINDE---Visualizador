CREATE DATABASE sistema;

USE sistema;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL, -- vai armazenar senha criptografada
    tipo ENUM('admin') DEFAULT 'admin'
);

INSERT INTO usuarios (nome, email, senha) VALUES
('Gabriel', 'gabriel@email.com', '123456'),
('Thaylon', 'thaylon@email.com', '654321');

<?php
$conn = new mysqli("localhost", "root", "", "sistema");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if ($senha === $usuario['senha']) { // depois troca por password_verify()
        session_start();
        $_SESSION['usuario'] = $usuario['nome'];
        header("Location: painel.php");
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>
