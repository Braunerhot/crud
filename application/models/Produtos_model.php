
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos_model extends CI_Model
{
	// Listar todos os produtos da tabela
	public function getProdutos()
	{
		$query = $this->db->get("produtos");
		return $query->result();
	}

	// Adicionar um novo produto na tabela do banco de dados local.
	public function addProdutos($dados=NULL)
	{
	if ($dados != NULL):
		$this->db->insert('produtos', $dados);
	endif;
	}

	// Pega produtos por ID
	public function getProdutosByID($id=NULL)
	{
	if ($id != NULL):
		// Verifica se a ID no banco de dados
		$this->db->where('id', $id);
		// Limita para apenas um registro
		$this->db->limit(1);
		// Pega o produto
		$query = $this->db->get("produtos");
		return $query->row();
	endif;
	}

	// Atualizar um registro na tabela de produtos
	public function editarProduto($dados=NULL, $id=NULL)
	{
		// Verifica se foi passado $dados e $id
		if ($dados != NULL && $id != NULL):
			// Se foi passado ele vai atualizar
			$this->db->update('produtos', $dados, array('id'=>$id));
		endif;
	}

	// Apagar um registro na tabela de produtos
	public function apagarProduto($id=NULL)
	{
		// Verifica se foi passado $dados e $id
		if ($id != NULL):
			// Se foi passado ele vai atualizar
			$this->db->delete('produtos', array('id'=>$id));
		endif;
	}

}
