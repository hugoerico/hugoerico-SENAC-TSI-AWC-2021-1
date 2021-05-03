<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ClientesController extends Controller
{
    use HasFactory;
    use HasRoles;

	
	//Essa é uma forma de controlar o acesso
	public function __construct()
	{
		$this->middleware('permission:cliente-list',['only' => ['index','show']]);
		$this->middleware('permission:cliente-create',['only' => ['create','store']]);
		$this->middleware('permission:cliente-edit',['only' => ['edit','update']]);
		$this->middleware('permission:cliente-delete',['only' => ['destroy']]);
	}

    public function listar()
    {
    	$clientes = Clientes::all();

    	return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index( Request $request)
    {
        $qtd_por_pagina = 5;

        $data = Clientes::orderBy('id', 'DESC')->paginate($qtd_por_pagina);

        return view('clientes.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }

    
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('clientes.create', compact($roles));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required','email' => 'required|email|unique:users,email','roles' => 'required']);

        $input = $request->all();

        $user = Clientes::create($input);

        $user->assignRole( $request->input('roles'));

        return redirect()->route('clientes.index')->with('success','Cliente criado com sucesso');
    }


    public function show($id)
    {
        $cliente = Clientes::find($id);

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Clientes::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $clienteRole = $cliente->roles->pluck('name', 'name')->all();

        return view('clientes.edit', compact('cliente', 'roles', 'clienteRole'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,['nome' => 'required','email' => 'required|email|unique:users,email','roles' => 'required']);

        $input = $request->all();

        $cliente = Clientes::find($id);

        $cliente->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $cliente->assignRole($request->input('roles'));

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
    }

    public function destroy($id)
    {
        Clientes::find($id)->delete();

        return redirect()->route('clientes.index')->with('success','Cliente removido com sucesso');
    }    

}
