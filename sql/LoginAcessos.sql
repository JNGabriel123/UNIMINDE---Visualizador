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

select * from usuarios;
