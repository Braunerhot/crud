
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller
{
	// Página de listar produtos
	public function index()
	{
		// Carrega nosso Model
		$this->load->model('produtos_model', 'produtos');

		// Carrega os dados do Model
		$data['produtos'] = $this->produtos->getProdutos();

		// Carrega para o View
		$this->load->view('listarprodutos', $data);
	}

	public function add()
	{
		// Carrega o Model de produtos
		$this->load->model('produtos_model', 'produtos');

		// Carrega a View para o usuário
		$this->load->view('addprodutos');
	}

	public function editar($id=NULL)
	{
		// Verifica se foi passado um ID, se não vai para página de listar produtos.
		if ($id == NULL) {
			redirect('/');
		}

		// Carrega o Model de produtos
		$this->load->model('produtos_model', 'produtos');

		// Faz a consulta no banco de dados pra vê se existe.
		$query = $this->produtos->getProdutosByID($id);

		// Verifica se a consulta retorna um registro, se não vai para a página listar produtos
		if ($query == NULL) {
			redirect('/');
		}

		// Criamos uma array onde vai guardar os dados do produto e passamos como parametro pra view
		$dados['produtos'] = $query;

		// Carrega a view
		$this->load->view('editarprodutos', $dados);
	}

	// Função Salvar registro no DB
	public function salvar()
	{
		// Verifica se foi passado o campo nome vazio.
		if ($this->input->post('nome') == NULL) {
			echo 'O Campo nome do produto não pode ser vazio!';
			echo '<a href="/produtos/add" title="voltar">Voltar</a>';
		} else {
			// Carrega o Model de produtos
			$this->load->model('produtos_model', 'produtos');

			// Pega dados do post e guarda na array $dados.
			$dados['nome'] = $this->input->post('nome');
			$dados['preco'] = $this->input->post('preco');
			$dados['ativo'] = $this->input->post('ativo');

			// Verifica se foi passado via post a id do produtos
			if ($this->input->post('id') != NULL) {
				// Se foi passado ele vai fazer atualização no registro
				$this->produtos->editarProdutos($dados, $this->input->post('id'));
			} else {
				// Se não foi passado id ele adiciona um novo registro
				$this->produtos->addProdutos($dados);
			}

			// Fazemos um redirecionamento para a página.
			redirect("/");

		}
	}

	// Função Apagar registro no DB
	public function apagar($id=NULL)
	{
		if ($id == NULL){
			redirect('/');
		}
			
		// Carrega o Model de produtos
		$this->load->model('produtos_model', 'produtos');

		// Faz a consulta no banco de dados pra verificar se existe.
		$query = $this->produtos->getProdutosByID($id);

		// Verifica se foi encontrado um registro com o ID
		if ($query != NULL) {
			// Executa a função apagarProdutos do produtos_model
			$this->produtos->apagarProdutos($query->id);
			redirect("/");

		} else {
			// Se não encontrou nenhum registro no banco de dados com o ID. Ele volta para página listar produtos.
			redirect("/");
		}
	}
}
