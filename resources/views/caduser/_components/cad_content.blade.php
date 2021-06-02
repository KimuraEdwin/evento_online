<h2 class="card-header">
    {{ $title }}
</h2>
<div class="card-body">
    <div class="row">
        <div class="col">
            @if(isset($caduser))
                <form method="POST" action="{{ route('caduser.update', ['caduser' => $caduser->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        {{ $slot }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="cpfCad">
                                    CPF 
                                    <span class="invalid-feedback text-right {{ $errors->has('cpf') ? 'd-block' : '' }}">{{ $errors->has('cpf') ? $errors->first('cpf') : '' }}</span>
                                </label>
                                <input type="text" name="cpf" class="form-control" id="cpfCad" value="{{ $caduser->cpf ?? old('cpf') }}" pattern="{0-9}" aria-describedby="cpfHelp">
                                <small id="cpfHelp" class="form-text text-muted">Apenas números*</small>
                            </div>
                            <div class="col-sm-6">
                                <label class="d-flex" for="telefoneCad">
                                    Telefone
                                    <span class="invalid-feedback text-right {{ $errors->has('tel') ? 'd-block' : '' }}">{{ $errors->has('tel') ? $errors->first('tel') : '' }}</span>
                                </label>
                                <input type="text" name="tel" class="form-control" id="telefoneCad" value="{{ $caduser->tel ?? old('tel') }}" pattern="{0-9}" aria-describedby="telHelp">
                                <small id="telHelp" class="form-text text-muted">Apenas números*</small>
                            </div>
                        </div>          
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="d-flex" for="cepCad">
                                    CEP
                                    <span class="invalid-feedback text-right {{ $errors->has('cep') ? 'd-block' : '' }}">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</span>
                                </label>
                                <input type="text" name="cep" class="form-control" id="cepCad" value="{{ $caduser->cep ?? old('cep') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="logradouroCad">
                                    Logradouro
                                    <span class="invalid-feedback text-right {{ $errors->has('logradouro') ? 'd-block' : '' }}">{{ $errors->has('logradouro') ? $errors->first('logradouro') : '' }}</span>
                                </label>
                                <input type="text" name="logradouro" class="form-control" id="logradouroCad" value="{{ $caduser->logradouro ?? old('logradouro') }}">
                            </div>
                            <div class="col-sm-2">
                                <label class="d-flex" for="numeroCad">
                                    Número
                                    <span class="invalid-feedback text-right {{ $errors->has('numero') ? 'd-block' : '' }}">{{ $errors->has('numero') ? $errors->first('numero') : '' }}</span>
                                </label>
                                <input type="text" name="numero" class="form-control" id="numeroCad" value="{{ $caduser->numero ?? old('numero') }}">
                            </div>
                            <div class="col-sm-4">
                                <label class="d-flex" for="bairroCad">
                                    Bairro
                                    <span class="invalid-feedback text-right {{ $errors->has('bairro') ? 'd-block' : '' }}">{{ $errors->has('bairro') ? $errors->first('bairro') : '' }}</span>
                                </label>
                                <input type="text" name="bairro" class="form-control" id="bairroCad" value="{{ $caduser->bairro ?? old('bairro') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="cidadeCad">
                                    Cidade
                                    <span class="invalid-feedback text-right {{ $errors->has('cidade') ? 'd-block' : '' }}">{{ $errors->has('cidade') ? $errors->first('cidade') : '' }}</span>
                                </label>
                                <input type="text" name="cidade" class="form-control" id="cidadeCad" value="{{ $caduser->cidade ?? old('cidade') }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="d-flex" for="ufCad">
                                    Estado
                                    <span class="invalid-feedback text-right {{ $errors->has('estado') ? 'd-block' : '' }}">{{ $errors->has('estado') ? $errors->first('estado') : '' }}</span>
                                </label>
                                <select class="form-control" name="estado" id="ufCad">
                                    <option value="">Selecione um Estado</option>
                                    @foreach($ufs as $uf)
                                        <option value="{{ $uf }}" {{ $caduser->estado == $uf ? 'selected' : ''}}>{{ $uf }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="d-flex" for="complementoCad">Complemento</label>
                                <textarea class="form-control" name="complemento" id="complementoCad" rows="3" >{{ $caduser->complemento ?? old('complemento') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <span class="invalid-feedback {{ $errors->has('tipo_credencial') ? 'd-block' : '' }}">{{ $errors->has('tipo_credencial') ? $errors->first('tipo_credencial') : '' }}</span>
                            @foreach($tipoCredenciais as $tipoCredencial)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo_credencial" 
                                        id="{{ $tipoCredencial == 1 ? 'ger' : 'user' }}" value="{{ $tipoCredencial }}" 
                                        {{ $caduser->tipo_credencial ==  $tipoCredencial ? 'checked' : '' }}>
                                <label class="d-flex" class="form-check-label" for="{{ $tipoCredencial == 1 ? 'ger' : 'user' }}">{{ $tipoCredencial == 1 ? 'Gerência' : 'Credencial' }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
            @else
                <form method="POST" action="{{ route('caduser.store') }}">
                    @csrf
                    <div class="form-group">
                        {{ $slot }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="cpfCad">
                                    CPF 
                                    <span class="invalid-feedback text-right {{ $errors->has('cpf') ? 'd-block' : '' }}">{{ $errors->has('cpf') ? $errors->first('cpf') : '' }}</span>
                                </label>
                                <input type="text" name="cpf" class="form-control" id="cpfCad" pattern="{0-9}" aria-describedby="cpfHelp">
                                <small id="cpfHelp" class="form-text text-muted">Apenas números*</small>
                            </div>
                            <div class="col-sm-6">
                                <label class="d-flex" for="telefoneCad">
                                    Telefone
                                    <span class="invalid-feedback text-right {{ $errors->has('tel') ? 'd-block' : '' }}">{{ $errors->has('tel') ? $errors->first('tel') : '' }}</span>
                                </label>
                                <input type="text" name="tel" class="form-control" id="telefoneCad" pattern="{0-9}" aria-describedby="telHelp">
                                <small id="telHelp" class="form-text text-muted">Apenas números*</small>
                            </div>
                        </div>          
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="d-flex" for="cepCad">
                                    CEP
                                    <span class="invalid-feedback text-right {{ $errors->has('cep') ? 'd-block' : '' }}">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</span>
                                </label>
                                <input type="text" name="cep" class="form-control" id="cepCad" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="logradouroCad">
                                    Logradouro
                                    <span class="invalid-feedback text-right {{ $errors->has('logradouro') ? 'd-block' : '' }}">{{ $errors->has('logradouro') ? $errors->first('logradouro') : '' }}</span>
                                </label>
                                <input type="text" name="logradouro" class="form-control" id="logradouroCad" >
                            </div>
                            <div class="col-sm-2">
                                <label class="d-flex" for="numeroCad">
                                    Número
                                    <span class="invalid-feedback text-right {{ $errors->has('numero') ? 'd-block' : '' }}">{{ $errors->has('numero') ? $errors->first('numero') : '' }}</span>
                                </label>
                                <input type="text" name="numero" class="form-control" id="numeroCad" >
                            </div>
                            <div class="col-sm-4">
                                <label class="d-flex" for="bairroCad">
                                    Bairro
                                    <span class="invalid-feedback text-right {{ $errors->has('bairro') ? 'd-block' : '' }}">{{ $errors->has('bairro') ? $errors->first('bairro') : '' }}</span>
                                </label>
                                <input type="text" name="bairro" class="form-control" id="bairroCad" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="d-flex" for="cidadeCad">
                                    Cidade
                                    <span class="invalid-feedback text-right {{ $errors->has('cidade') ? 'd-block' : '' }}">{{ $errors->has('cidade') ? $errors->first('cidade') : '' }}</span>
                                </label>
                                <input type="text" name="cidade" class="form-control" id="cidadeCad" >
                            </div>
                            <div class="col-sm-6">
                                <label class="d-flex" for="ufCad">
                                    Estado
                                    <span class="invalid-feedback text-right {{ $errors->has('estado') ? 'd-block' : '' }}">{{ $errors->has('estado') ? $errors->first('estado') : '' }}</span>
                                </label>
                                <select class="form-control" name="estado" id="ufCad">
                                    <option value="">Selecione um Estado</option>
                                    @foreach($ufs as $uf)
                                        <option value="{{ $uf }}" >{{ $uf }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="d-flex" for="complementoCad">Complemento</label>
                                <textarea class="form-control" name="complemento" id="complementoCad" rows="3" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <span class="invalid-feedback {{ $errors->has('tipo_credencial') ? 'd-block' : '' }}">{{ $errors->has('tipo_credencial') ? $errors->first('tipo_credencial') : '' }}</span>
                            @foreach($tipoCredenciais as $tipoCredencial)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo_credencial" 
                                        id="{{ $tipoCredencial == 1 ? 'ger' : 'user' }}" value="{{ $tipoCredencial }}">
                                <label class="d-flex" class="form-check-label" for="{{ $tipoCredencial == 1 ? 'ger' : 'user' }}">{{ $tipoCredencial == 1 ? 'Gerência' : 'Credencial' }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
            @endif
            
                
                
                <button type="submit" class="btn btn-primary">{{ isset($caduser) ? 'Atualizar' : 'Cadastrar' }}</button>
            </form>
        </div>
    </div>
</div>

