@extends('layouts.page')
@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
</style>

<!-- Cabeçalho-->
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>CETEA</h1>
                            <span class="subheading">Minha Agenda</span>
                        </div>
                    </div>
                </div>
            </div>
</header>

<!-- inicio index -->
@auth
@if(!(auth()->user()->inativo))
<div class="container px-4 px-lg-5">
    <div class="container-fluid py-5">
        <div id="success_message"></div>
        <section class="border p-4 mb-4 d-flex align-items-left">
            <div class="col-sm-12">
            <div class="input-group rounded">
                <a href="{{route('page.minhaagenda.create')}}" type="button" class="addAgendamentoModal_Btn btn btn-default" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Marcação de atendimento"><i class="fas fa-plus"></i> Novo Agendamento</a>
            </div>            
            </div>
        </section>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="bg-success" style="color: white">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Médico/Terapeuta</th>
                            <th scope="col">Atendimento</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="lista_agendamento">
                        <tr id="novo" style="display: none"></tr>
                        @forelse($atendimentos as $atendimento)
                        <tr id="atendimento{{$atendimento->id}}">
                            @if($atendimento->tipo_atendimento_id==2) <!--retorno -->
                            <th scope="row">{{$atendimento->data_retorno}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==3) <!--encaminhamento -->
                            <th scope="row">{{$atendimento->data_encaminhamento}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==4) <!--agendamento -->
                            <th scope="row">{{$atendimento->data_agendamento}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==5) <!--agenda online -->
                            <th scope="row">{{$atendimento->data_agonline}}</th>
                            @endif
                            <td>{{$atendimento->medico_terapeuta->nome}}</td>
                            <td>{{$atendimento->tipo_atendimento->nome}}</td>
                            @if($atendimento->tipo_atendimento_id==5)
                            <td>
                                <div class="btn-group">
                                    <a type="button" href="{{route('page.minhaagenda.edit',['id'=>$atendimento->id])}}" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->medico_terapeuta->nome}}" class="edit_agendamento fas fa-edit" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></a>
                                    <button type="button" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->medico_terapeuta->nome}}" class="delete_agendamento_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
                                </div>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @empty
                        <tr id="nadaencontrado">
                            <td colspan="4">Nenhuma agenda foi registrada!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex hover justify-content-center">
                    {{$atendimentos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@else
<i class="fas fa-lock"></i><b class="title">USUÁRIO INATIVO. COMPAREÇA NO CETEA PARA SER REATIVADO.</b>
@endif
@endauth

<!-- fim index -->

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
<!-- fim Rodapé-->

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){

    $(document).on('click','.delete_agendamento_btn',function(e){   ///inicio delete
            e.preventDefault();          
            var linklogo = "{{asset('storage')}}";
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");            
            var nome = $(this).data("nome");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:nome,
                text: "Deseja excluir?",
                imageUrl: linklogo+'/logoprodap.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'imagem do sistema',
                showCancelButton: true,
                confirmButtonText: 'Sim, prossiga!',                
                cancelButtonText: 'Não, cancelar!',                                 
             }).then((result)=>{
             if(result.isConfirmed){             
                $.ajax({
                    url: '/page/minhaagenda/delete/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,
                        '_method': 'DELETE',                    
                        '_token':CSRF_TOKEN,
                    },
                    success:function(response){
                        if(response.status==200){                        
                            //remove linha correspondente da tabela html
                            $("#atendimento"+id).remove();     
                            $("#success_message").replaceWith('<div id="success_message"></div>');                       
                            $("#success_message").addClass('alert alert-success');
                            $("#success_message").text(response.message);         
                        }else{
                            //Não pôde excluir por causa dos relacionamentos    
                            $("#success_message").replaceWith('<div id="success_message"></div>');                        
                            $("#success_message").addClass('alert alert-danger');
                            $("#success_message").text(response.errors);
                        }
                    }
                }); 
            } 
        });   
      
        });  ///fim delete

        ///Cria agendamento

        /* $(document).on('click','.addAgendamentoModal_Btn',function(e){
            e.preventDefault();            
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({ 
                type: 'get',             
                dataType: 'json',                                    
                url: '/page/minhaagenda/create',                                
                success: function(response){           
                    if(response.status==400){                           
                         $("#success_message").replaceWith('<div id="success_message"></div>');                        
                         $("#success_message").addClass('alert alert-danger');
                         $("#success_message").text(response.message);
                    }else{
                        console.log('cheguei aqui!');
                    }
                }

        });

    });
 */

        //fim cria agendamento
   

         ///tooltip
    $(function(){             
        $(".addAgendamentoModal_btn").tooltip();        
        $(".delete_agendamento_btn").tooltip();
        $(".edit_agendamento").tooltip();    
    });
    ///fim tooltip

});

</script>

@endsection