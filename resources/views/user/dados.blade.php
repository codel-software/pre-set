@extends('layouts.app')
@section('content')
    <div>
        <form method="POST" action="/update">
            @csrf
            <h1>Meus Dados</h1>
            
            <div class="form-group">
                <label>Nome</label>
                <input  class="form-control"  name="name" value="{{Auth::user()->name}}" >
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input  class="form-control"  name="email" value="{{Auth::user()->email}}" >
            </div>
            
            <button class="btn btn-primary"> Atualizar</button>
        </form>
    </div>
@endsection