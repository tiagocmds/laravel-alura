<?php namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {
public function lista(){
        $produtos = DB::select('select * from produtos');
        return view('produto/listagem')->with('produtos', $produtos);
}
public function mostra($id){
    $resposta = DB::select('select * from produtos where id = ?', [$id]);
    if(empty($resposta)){
        return "Esse produto nao existe";
    }
    return view('produto/detalhe')->with('p', $resposta[0]);
    }
public function novo(){
    return view('produto.formulario');
} 
public function adiciona(){
  $nome = Request::input('nome');
  $descricao = Request::input('descricao');
  $valor = Request::input('valor');
  $quantidade = Request::input('quantidade');
  DB::insert('insert into produtos values (null, ?, ?, ?, ?)', 
    array($nome, $valor, $descricao, $quantidade));
    
  return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
}
public function listaJson(){
    $produtos = DB::select('select * from produtos');
    return $produtos;
}
}