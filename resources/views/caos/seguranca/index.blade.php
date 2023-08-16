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

            <div class="card p-3" style="background-image: url('/assets/img/banner-docs.jpg')">
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
  @if((auth()->user()->admin))
  @if((auth()->user()->admin)&&(auth()->user()->perfil_id=3))  
  <div class="p-2 mt-2">
    <div class="card" style="width: 10rem;">
      <div class="card-header">
        <b><i class="fas fa-desktop" style="background: transparent; color: red; border: none;"></i> Módulos</b>
      </div>
      <div class="card-body">                
        <p class="card-text">Cadastro básico.</p>        
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Menu<span class="caret"></span>
                                </button>                                
                                <ul class="dropdown-menu" id="dropdown_modulo{{auth()->user()->id}}">
                                            <li class="dropdown-item"><a href="{{route('ceteaadmin.modulo.index')}}" class="dropdown-item listamodulo_btn"  
                                                style="white-space: nowrap;"><i class="fas fa-list" style="background: transparent; color: green; border: none;"></i> Cadastro de módulos</a>
                                            </li> 
                                </ul>  
      </div>
    </div>
  </div>  

   <div class="p-2 mt-2">
    <div class="card" style="width: 10rem;">
      <div class="card-header">
        <b><i class="fas fa-desktop" style="background: transparent; color: red; border: none;"></i> Operações</b>
      </div>
      <div class="card-body">                
        <p class="card-text">Cadastro básico.</p>        
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Menu<span class="caret"></span>
                                </button>                                
                                <ul class="dropdown-menu" id="dropdown_operacao{{auth()->user()->id}}">
                                            <li class="dropdown-item"><a href="{{route('ceteaadmin.operacao.index')}}" class="dropdown-item listaoperacao_btn"  
                                                style="white-space: nowrap;"><i class="fas fa-list" style="background: transparent; color: green; border: none;"></i> Cadastro de operações</a>
                                            </li> 
                                </ul>  
      </div>
    </div>
  </div>  
  @endif

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


@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">  -->
@stop

@section('js')

<script type="text/javascript">

$(document).ready(function(){ //início do bloco principal


}); //fim do bloco principal
 
</script>

@stop

