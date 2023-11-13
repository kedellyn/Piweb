<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      background-color: #ffffff;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    h1 {
      color: #1a936f;
      margin-bottom: 20px;
    }

    .form {
      margin-top: 30px;
    }

    .form-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #1a936f;
    }

    .form-input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-submit {
      background-color: #1a936f;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .form-submit:hover {
      background-color: #136b4a;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form class="form" method="post">
      <label class="form-label" for="username">Usuário:</label>
      <input class="form-input" type="text" id="username" name="username" required>

      <label class="form-label" for="password">Senha:</label>
      <input class="form-input" type="password" id="password" name="password" required>

      <button class="form-submit" type="submit" name="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  try {
    $db_hostname = 'localhost';
    $db_username = 'seu_usuario';
    $db_password = 'sua_senha';
    $db_name = 'seu_banco_de_dados';

    $conn = new PDO("mysql:host=$db_hostname;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :username AND senha = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      echo "<p>Login bem-sucedido.</p>";
    } else {
      echo "<p>Usuário ou senha incorretos.</p>";
    }

    $conn = null;
  } catch (PDOException $e) {
    echo "<p>Ocorreu um erro no banco de dados: " . $e->getMessage() . "</p>";
  } catch (Exception $e) {
    echo "<p>Ocorreu um erro: " . $e->getMessage() . "</p>";
  }
}
?>




Página docente
