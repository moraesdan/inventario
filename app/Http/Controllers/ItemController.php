<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item as Item;
use App\Tipo as Tipo;
use App\Status as Status;
use App\User as User;
use App\Setor as Setor;
use App\Local as Local;
use App\Fornecedor as Fornecedor;
    
class ItemController extends Controller {

    public function __construct(Item $item, 
                                Tipo $tipo,
                                Status $status,
                                User $user, 
                                Setor $setor, 
                                Local $local, 
                                Fornecedor $fornecedor) 
    {
        $this->item = $item;
        $this->tipo = $tipo;
        $this->status = $status;
        $this->user = $user;
        $this->setor = $setor;
        $this->local = $local;
        $this->fornecedor = $fornecedor;
    }

    public function index() {

        $data = [];
        $data['itens'] = $this->item->getItens();
        $data['locais'] = $this->local->getLocais();

        return view('item/index', $data);
    }

    public function novo( Request $request, Item $item )
    {

        $data = [];

        $data['nome'] = $request->input('nome');
        $data['serial'] = $request->input('serial');
        $data['descricao'] = $request->input('descricao');
        $data['status'] = $request->input('status');
        $data['tipo'] = $request->input('tipo');
        $data['valor'] = $request->input('valor');
        $data['entrada'] = $request->input('entrada');
        $data['nota'] = $request->input('nota');

        $data['user_id'] = $request->input('user_id');
        $data['setor_id'] = $request->input('setor_id');
        $data['local_id'] = $request->input('local_id');
        $data['fornecedor_id'] = $request->input('fornecedor_id');
        

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                    'serial' => 'required',
                    'status' => 'required',
                    'tipo' => 'required',
                    'valor' => 'required',
                    'entrada' => 'date',
                ]
            );

            $item->insert($data);

            session()->flash('alert_sucesso', 'Item criado com sucesso!');
            return redirect()->route('todos_itens');
        }

        $data['editar'] = 0;
        $data['user_id'] = session()->get('id');
        $data['setores'] = $this->setor->getSetores();
        $data['locais'] = $this->local->getLocais();
        $data['fornecedores'] = $this->fornecedor->getForns();
        $data['status_array'] = $this->status->allStatus();
        $data['tipos_array'] = $this->tipo->allTipos();

        //dd($data);

        return view('item/form', $data);
    }

    public function ver($item_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['item_id'] = $item_id;

        $item_data = $this->item->find($item_id);

        $data['nome'] = $item_data->nome;
        $data['serial'] = $item_data->serial;
        $data['descricao'] = $item_data->descricao;
        $data['status'] = $item_data->status;
        $data['tipo'] = $item_data->tipo;
        $data['valor'] = $item_data->valor;
        $data['entrada'] = $item_data->entrada;
        $data['nota'] = $item_data->nota;
        $data['setor_id'] = $item_data->setor_id;
        $data['local_id'] = $item_data->local_id;
        $data['fornecedor_id'] = $item_data->fornecedor_id;
        
        $data['user_id'] = session()->get('id');
        $data['setores'] = $this->setor->getSetores();
        $data['locais'] = $this->local->getLocais();
        $data['fornecedores'] = $this->fornecedor->getForns();
        $data['status_array'] = $this->status->allStatus();
        $data['tipos_array'] = $this->tipo->allTipos();
         
        //dd($data);

        return view('item/form', $data);
    }

    public function editar( Request $request, $item_id, Item $item)
    {

        $data = [];

        $data['nome'] = $request->input('nome');
        $data['serial'] = $request->input('serial');
        $data['descricao'] = $request->input('descricao');
        $data['status'] = $request->input('status');
        $data['tipo'] = $request->input('tipo');
        $data['valor'] = $request->input('valor');
        $data['entrada'] = $request->input('entrada');
        $data['nota'] = $request->input('nota');

        $data['user_id'] = $request->input('user_id');
        $data['setor_id'] = $request->input('setor_id');
        $data['local_id'] = $request->input('local_id');
        $data['fornecedor_id'] = $request->input('fornecedor_id');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                    'serial' => 'required',
                    'status' => 'required',
                    'tipo' => 'required',
                    'valor' => 'required',
                    'entrada' => 'date',
                ]
            );

            $item_data = $this->item->find($item_id);
            $item_data->nome = $request->input('nome');
            $item_data->serial = $request->input('serial');
            $item_data->descricao = $request->input('descricao');
            $item_data->status = $request->input('status');
            $item_data->tipo = $request->input('tipo');
            $item_data->valor = $request->input('valor');
            $item_data->entrada = $request->input('entrada');
            $item_data->nota = $request->input('nota');    
            $item_data->user_id = $request->input('user_id');
            $item_data->setor_id = $request->input('setor_id');
            $item_data->local_id = $request->input('local_id');
            $item_data->fornecedor_id = $request->input('fornecedor_id');            
            $item_data->save();
            
            session()->flash('alert_sucesso', 'Item editado com sucesso!');
            return redirect()->route('todos_itens');
        }

        $data['editar'] = 0;

        return view('item/form', $data);
    }

    public function deletar($item_id)
    {
        $item_del = $this->item->find($item_id);
        
        if ($item_del != null){
            $item_del->delete();

            session()->flash('alert_sucesso', 'Item deletado com sucesso!');
            return redirect()->route('todos_itens');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar item, tente novamente mais tarde.');
        return redirect()->route('todos_itens');
    } 
    

}
