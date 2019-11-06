<?php

class Conexao
{

    public static $conexao = null;

    public static function getConexao()
    {

        $con = new PDO("mysql:host=localhost;charset=utf8; dbname=compraki", "root", "");
        return $con;

    }

}

class CRUDprodutos
{
    private $conexao;

    function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function lerProdutos()
    {
        $consulta = $this->conexao->query('SELECT * FROM produtos');
        return $consulta;


    }

    public function cadastrarProdutos($nome, $desc_prod, $preco, $qtd_emb, $categoria, $preco_unit)
    {
        $inserir = $this->conexao->prepare('INSERT INTO cad_usuario (nome, desc_prod, preco, qtd_emb, categoria, preco_unit) values (:nome, :desc_prod,:preco, :qtd_emb, :categoria, :preco_unit)');
        $inserir->execute(array(
            ':nome' => $nome,
            ':desc_prod' => $desc_prod,
            ':preco' => $preco,
            ':qtd_emb' => $qtd_emb,
            ':categoria' => $categoria,
            ':preco_unit' => $preco_unit
        ));
    }

    public function categoriaProduto($categoria)
    {
        $consulta = $this->conexao->query("SELECT nome, desc_prod, preco, cod_prod, qtd_emb, categoria, preco_unit FROM produtos where categoria = '$categoria'");
        return $consulta;
    }

    public function buscaProduto()
    {
        $busca = $this->conexao->query('SELECT * from produtos ');
        return $busca;
    }
}

$crud = new CRUDprodutos();
//$produto = $crud->categoriaProduto('Cozinha');
