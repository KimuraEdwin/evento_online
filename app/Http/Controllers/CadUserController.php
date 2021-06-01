<?php

namespace App\Http\Controllers;

use App\Models\CadUser;
use Illuminate\Http\Request;

class CadUserController extends Controller
{

    public function __construct(CadUser $cadUser){
        $this->cadUser = $cadUser;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('caduser.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caduser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = $request->user()->getAttributes()['id'];
        $usuarioCadastrado = $this->cadUser->create($dados);
        dd($usuarioCadastrado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CadUser  $cadUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('caduser.show', ['title' => 'Informações do Usuário', 'caduser' => $this->cadUser->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CadUser  $cadUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regCadUser = $this->cadUser->find($id);
        $ufs = ['AC','AL','AP','AM','BA','CE','DF','ES','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
        $tipoCredenciais = [1,2];
        return view('caduser.edit', ['caduser' => $regCadUser, 'ufs' => $ufs, 'tipoCredenciais' => $tipoCredenciais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CadUser  $cadUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = $this->cadUser->find($id);

        if($user === null){
            return response()->json(['erro' => 'Não foi encontrado nenhum registro'], 404);
        }

        if($request->method() === "PATCH"){
            $dinamicRules = array();

            foreach($user->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())){
                    $dinamicRules[$input] = $rule;
                }
            }

            $request->validate($dinamicRules, $user->feedback());
        }
        else{
            $request->validate($user->rules(), $user->feedback());
        }
        
        $user->fill($request->all());
        $user->save();

        return redirect()->route('caduser.edit', ['caduser' => $user]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CadUser  $cadUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CadUser $cadUser)
    {
        $deleteUsuario = $cadUser->delete();
        return redirect()->view('index');
    }
}
