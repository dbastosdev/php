<?php
// Aqui vai verificar o link enviado, ou melhor, o valor do código enviado. Caso o código exista
// o cadastro será permitido. 

// Importando objeto do pdo
require_once 'config.php';

if(!empty($_GET['codigo'])){
    // Filtrando e validando as entradas
    $codigo = filter_input(INPUT_GET,"codigo");

    // Buscando no banco de dados
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE codigo = :codigo");
    $sql->bindValue(':codigo',$codigo);
    $sql->execute();

    if($sql->rowCount() > 0){   
        echo "Código no banco de dados. Adicione um novo usuário";
    
    } else {
        header("Location: semcodigovalido.php"); 
        exit();
    }


} else {
    header("Location: naoveiocodigo.php"); 
    exit();
}

if(!empty($_POST['email'])){ // Se tiver nome e e-mail adiciona no banco de dados

    // Filtrando e validando as entradas
    $name = filter_input(INPUT_POST,"name");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $novoCodigo = md5(rand(0,9999).rand(0,9999));
    
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();

    // Só insere o registro no banco de dados se o e-mail cadastrado for novo. Se existir e-mail, redireciona
    if($sql->rowCount() === 0){   
        // Prepara a query antes de executar para eliminar problemas de query maliciosa
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email, codigo) VALUES (:nome, :email, :codigo)");
        $sql->bindValue(':nome', $name);    // associa o valor
        $sql->bindParam(':email', $email);  // Associa a variável e-mail - referência
        $sql->bindParam(':codigo', $novoCodigo);  // Associa a variável e-mail - referência
        $sql->execute();
    
        header("Location: registrosucesso.php"); // ao inserir redireciona para o index
        exit();
    } 
   
}

?>

<h1>Adicionar usuário</h1>

<form method="POST">
    <label>
        Nome:<br/>
        <input type="text" name="name"/>
    </label><br/><br/>
    <label>
        E-mail:<br/>
        <input type="text" name="email"/>
    </label><br/><br/>
    <input type="submit" value="Cadastrar"/>

</form>
