@extends('layouts.app')
@section('content')
<div>
    <div class="card">
        <div class="card-body">
            <h1>Criar novo usuário</h1> 
            <usuario-create></usuario-create>
        </div>
        
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Usuarios</h1>
        </div>
    </div>
    <usuarios-card></usuarios-card>
</div>
@endsection