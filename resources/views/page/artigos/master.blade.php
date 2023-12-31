@extends('layouts.page')
@section('content')

<!-- Cabeçalho-->
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1 class="heading">CETEA</h1>
                            <span class="subheading">Centro de Atendimento ao Autismo</span>
                        </div>
                    </div>
                </div>
            </div>
</header>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <!--pesquisa -->
                <form action="{{route('page.master')}}" class="form-search" method="GET">
                    <div class="input-group">                    
                        <input class="form-control rounded-pill py-2 pr-5 mr-1 bg-transparent" tabindex="1" type="search" name="pesquisa" autocomplete="off">                                                
<div class="input-group-text border-0 bg-transparent ml-n5"><i class="fas fa-search"></i> </div>                        
                    </div>                     
                </form>
                <!--barra de informações-->
                <nav class="navbar navbar-expand-lg navbar-default bg-default justify-content-left">        
                <ul class="menu">                    
                    <li><a href="#!">Temas</a>
                        <ul>
                  @foreach($temas as $tema)
                  <li><a href="{{route('page.tema',['slug' => $tema->slug])}}">{{$tema->titulo}}</a></li>
                   @endforeach      	                  
                        </ul>
                    </li>                           
                </ul>
                </nav>  
                    <!-- Artigos preview -->
                    @foreach($artigos as $artigo)
                    <div class="post-preview">
                        <a href="{{route('page.detail',['slug' => $artigo->slug])}}">
                            <h2 class="post-title">{{$artigo->titulo}}</h2>
                            <h3 class="post-subtitle">{{$artigo->descricao}}</h3>
                        </a>
                        <p class="post-meta">
                            Postado por
                            @if($artigo->user)
                            <a href="#!">{{$artigo->user->name}}</a>                            
                            @endif
                            {{ucwords(strftime('%A, %d de %B de %Y', strtotime($artigo->created_at)))}}
                            <a href="{{route('page.detail',['slug' => $artigo->slug])}}">
                                <i class="fas fa-comment-alt"></i> {{$artigo->comentarios()->count()}}
                            </a> 
                            @auth                       
                            @if((auth()->user()->moderador) && (auth()->user()->inativo!=1))
                            @if($artigo->notificarassinantes!=1)
                            <button type="button" id="notificar{{$artigo->id}}" data-id="{{$artigo->id}}" data-slug="{{$artigo->slug}}" data-notificar="1" class="notificar_btn fas fa-envelope" style="color: red;"></button>
                            @else
                            <button type="button" id="notificar{{$artigo->id}}" data-id="{{$artigo->id}}" data-slug="{{$artigo->slug}}" data-notificar="0" class="notificar_btn fas fa-check" style="color: green;"></button>
                            @endif
                            @endif
                            @endauth
                        </p>
                    </div>
                    <!-- Linha divisória-->
                    <hr class="my-4" />                   
                    @endforeach
                    <!-- Paginação-->
                    <div class="d-flex justify-content-center mb-4">
                    {{$artigos->links()}}
                    </div>
                </div>      
            </div>
</div>
        <!-- Rodapé-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">                        
                        <div class="small text-center text-muted fst-italic">Copyright &copy; prodap</div>
                    </div>
                </div>
            </div>
        </footer>      
@endsection
@section('scripts')

@endsection
