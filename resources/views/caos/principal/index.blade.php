@extends('adminlte::page')

@section('title', 'CETEA - Área do desenvolvedor')

@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
    div.halfOpacity{
        opacity: 0.6 !important;
    }
</style>

<div class="container-fluid py-5"> 

            <div class="card p-3" style="background-image: url('/assets/img/banner-docs.webp')">
                <div class="d-flex align-items-center">
                <div class="image">
                @if(auth()->user()->avatar)  
                <img src="{{asset('storage/'.auth()->user()->avatar)}}" class="rounded-circle" width="100" >
                @else
                <img src="{{asset('storage/user.png')}}" class="rounded-circle" width="100" >
                @endif
                </div>
                <div class="ml-3 w-100">                    
                   <h4 class="mb-0 mt-0" style="color: red" ><b>{{auth()->user()->name}}</b></h4>                 
                </div>                    
                </div>              
            </div>         
<div class="container-fluid">
<div class="row">
@if($autorizacao)

@foreach ($modulos as $mod)   
  @foreach($autorizacao as $aut)
  @if(($aut->modulo_has_operacao_modulo_id) == ($mod->id))
    <div class="p-2 mt-2">
    <div class="card" style="width: 13rem;">
      <div class="card-header">
        <b><i class="fas fa-desktop" style="background: transparent; color: red; border: none;"></i> {{$mod->nome}}</b>
      </div>
      <img class="card-img-top" src="{{asset('storage/'.$mod->ico)}}" alt="Imagem de capa do módulo" width="286" height="180">
      <div class="card-body">                
        <p class="card-text">{{$mod->descricao}}</p>        
        <button type="button" class="btn btn-danger">Operações</button>                                        
      </div>
    </div>
  </div>
  @break
  @elseif ($loop->last)
  {{-- cessa a construção de cards --}}
  @endif
  @endforeach
@endforeach

@else
<div class="p-2 mt-2">
<div class="card" style="width: 18rem;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{asset('logoprodap.jpg')}}" class="card-img" alt="prodap">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><b>{{auth()->user()->name}}</b>,</h5>
        <p class="card-text">Você não tem acesso a esta área.</p>
        <p class="card-text"><small class="text-muted">Grato pela compreensão.</small></p>
      </div>
    </div>
  </div>
</div>
</div>
@endif
</div>
</div>
</div>
</div>


@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">  -->
@stop

@section('js')

@stop

