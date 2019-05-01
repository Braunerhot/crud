<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller
{

	public function index()
	{
		// Carrega nosso Model
		$this->load->model('produtos_model', 'produtos');

		// Carrega os dados do Model
		$data['produtos'] = $this->produtos->getProdutos();

		// Carrega para o View
		$this->load->view('listarprodutos', $data);
	}
}
