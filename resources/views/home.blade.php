@extends('layouts.site')
@section('content')
    

        <view-page :is-home="true" />
<div class="card">
    <div class="card-body">
        @if (env('MODULO_AGENDA') == '1')
        <center>
            <h1 style="margin-bottom: 20px">AGENDA</h1>
        </center>
        
        <agenda></agenda>
         
        @endif

        
    </div>
</div>
@endsection