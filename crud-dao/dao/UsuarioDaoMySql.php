<?php
// Como esse DAO será utilizado fora dessa pasta, na raiz do projeto, não é necessário voltar uma pasta. 
require_once 'models/Usuario.php';

class UsuarioDaoMySql implements UsuarioDAO {

    // Atributos
    private $pdo;

    // Construtor
    // Vai receber um objeto do tipo pdo e o colocar no atributo $pdo da classe. Com isso, recebe um 
    // objeto por injeção de dependência que servirá para qualquer banco de dados
    // A partir da instanciação, é possível usar o atributo $pdo para fazer manipulações no banco de dados
    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    // Métodos a serem implementados devio ao usuo da interface DAO

    public function add(Usuario $u){
        // Adiciona o usuário no banco
        $sql = $this->pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        // Retorna o usuário cadastrado
        $u->setId($this->pdo->lastInsertId); // pega último id cadastrado. Função do pdo
        return $u;
    }
    public function findAll() {

        // Inicializa um array vazio que vai ser retornado pelo método
        $array = [];

        // Realiza a query no banco de dados
        $sql = $this->pdo->query("SELECT * FROM usuario");
        if($sql->rowCount() > 0){
            // Guarda resultado da pesquisa
            $data = $sql->fetchAll();

            // para cada item / tupla que é um array em cada posição de data, instancia-se um Usuário
            foreach($data as $item) {
                $u = new Usuario();          // instancia novo usuário a cada loop
                
                $u->setId($item['id']);      // add id
                $u->setNome($item['nome']);  // add nome
                $u->setEmail($item['email']); // add email

                $array[] = $u;                  // add objeto usuário com dados da tupla no array a ser retornado
            }

        }
        return $array;
    } 

    public function findByEmail($email) {
        // Query no banco de modo seguro
        $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute(); 

        // Checando resultados
        // Se a consulta retornar dados, retorna os dados já cadastrados
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);

            return $u;
        
        // Se não encontrar, retorna falso e permite o cadastro
        } else {
            return false;
        }
        
        
    }

    public function findById($id){
        
    } 
    public function update(Usuario $u){
        
    } 
    public function delete($id){
        
    } 
}
