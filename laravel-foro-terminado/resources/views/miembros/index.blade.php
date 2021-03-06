@extends('layouts.app')

@section('title','Miembros')
@section('content')
	<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">

            <div class="contenido-submenu">
                <div class="submenu">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <!--<a href="{{ url('/foros') }}" class="sub-home">Foros</a><i class="fa fa-angle-double-right" aria-hidden="true"></i>-->
                    <b> &nbsp;Miembros</b>
                </div>
                <div class="search-general">
                    <form action="{{ url('search') }}" method="get" id="buscadorGeneral">
                        <div class="">
                            <input type="text" name="user" id="nameUser" class="input-search" placeholder="Búscar usuario">
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div id="contenido-miembros">
                
                <div class="caja-miembros">
                    <h3 class="text-center" style="color: #333;padding: 16px 0px">Usuarios registrados con Actividad</h3>

                    <span class="linea_separadora"></span>
                    @foreach($listado_miembros as $m)
                    <div class="listado-miembros">
                        @if($m->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><img src="/img/man.png" class="img-m" alt=""></a>
                        @elseif($m->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><img src="/img/woman.png" class="img-m" alt=""></a>
                        @elseif($m->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><img src="/img/facebook.png" class="img-m" alt=""></a>
                        @elseif($m->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><img src="/img/twitter.png" class="img-m" alt=""></a>
                        @elseif($m->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><img src="/img/google.png" class="img-m" alt=""></a>
                        @endif
                        <a href="{{ url('miembros') }}/{{ $m->id }}/{{ $m->name_slug }}"><strong class="name-m">{{ $m->name }}</strong></a>
                        <div class="data-m">
                            <span>Respuestas: <b>{{ $m->total_comentarios }}</b></span>
                        </div>
                        <b class="total-sms-m"><i class="fa fa-commenting" aria-hidden="true"></i> {{ $m->total_comentarios }}</b>
                    </div>
                    <span class="linea_separadora"></span>
                    @endforeach

                </div>

                @if(Auth::check())
                    <div class="aside-btn-register">
                        <a href="{{ url('/tema') }}" class="btn-register">Formular una pregunta</a>
                    </div>
                @else
                    <div class="aside-btn-register">
                        <a href="{{ url('/register') }}" class="btn-register">Registrate Ahora</a>
                    </div>
                @endif
                <div class="aside-miembros-nuevos">
                    <div class="cat-title-aside">
                        <i class="fa fa-play-circle" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;NUEVOS MIEMBROS
                    </div>

                    <div class="aside-contenido" style="margin-top: 0px;border: none">
                    @foreach($new_miembros as $new)
                        <div class="caja-ult-tema" style="height: 44px">
                            @if($new->genero == 'M')
                            <a href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt="" style="width: 32px;height: 32px"></a>
                            @elseif($new->genero == 'F')
                            <a href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt="" style="width: 32px;height: 32px"></a>
                            @elseif($new->genero == 'facebook')
                            <a href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt="" style="width: 32px;height: 32px"></a>
                            @elseif($new->genero == 'twitter')
                            <a href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt="" style="width: 32px;height: 32px"></a>
                            @elseif($new->genero == 'google')
                            <a href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt="" style="width: 32px;height: 32px"></a>
                            @endif
                            <p class="title-ult-tema">
                                <a title="{{ $new->name }}" href="{{ url('miembros') }}/{{ $new->id }}/{{ $new->name_slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($new->name, 18) }}</a>
                                @if($new->activo == 1)
                                    <span class="usuario_activo" title="En linea"></span>
                                @else @endif
                            </p>
                            <p class="user-ult-tema" style="font-size: 1.1rem;padding-bottom: 5px">
                                Registrado el {{ substr($new->created_at,0,16) }}
                            </p>
                        </div>
                    @endforeach
                    </div>

                </div>

            </div>

            <!--<div class="contenido-submenu" style="padding-bottom: 9px">
                <div class="submenu" style="margin-top: 3px">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a>
                    <a href="{{ url('/foros') }}" class="sub-home">Foros</a> <b>Miembros</b>
                </div>
            </div>-->

     	</div>
     </div>
@endsection
<!-- Hacemos uso de un toltip para ver mini info de los users nuevos -->
@push('script')
<script>
    $(document).ready(function(){
        $('[data-toggle="nuevosUsuarios"]').tooltip();   
    });
</script>
@endpush