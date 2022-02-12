@extends('frontend.layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/comtentarios.css')}}">
@endsection
@section('conteudo')
        <div class="d-flex titulo-texto">
            <div class="container p-5 text-center">
                <h2>{{$blog->titulo}}</h2>
            </div>

        </div>
        <br><br>
        <div class="container justify-content-between">
            <div class="container d-flex justify-content-center pb-5">

                <img src="{{asset($blog->foto)}}" width="80%" height="400" alt=""
                    style="object-fit: cover; margin: 0 auto;">
            </div>

            <p class="texto-completo pb-5">
                   {{$blog->resumo}}
                <br><br>
                {{$blog->conteudo}}
                <br><br>
                Autor: {{$blog->autor}}
            </p>

        </div>

        <div class="container">
            <div class="be-comment-block">
                <h1 class="comments-title">Comentarios ({{count($blog->comentarios)}})</h1>
                @foreach ($blog->comentarios as $comentario)
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="blog-detail-2.html">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">

                        <span class="be-comment-name">
                            <a href="#">{{$comentario->leitor}}</a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            {{$comentario->data}}
                        </span>

                        <p class="be-comment-text">
                            {{$comentario->texto}}
                        </p>
                    </div>
                </div>
                @endforeach

                <form class="form-block" action="{{route('comentar')}}" method="POST">

                    @csrf
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 py-2">
                            <div class="input-group mb-2" style="height: 45px;">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control form-input @error('leitor') is-invalid @enderror" placeholder="leitor"
                                    aria-label="leitor" aria-describedby="basic-addon1" name="leitor" value="{{old('leitor')}}">
                                    @error('leitor')
                                    <div class="invalid-feedback">
                                        <h6>{{$message}}</h6>
                                    </div>
                                    @enderror
                                </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-input  @error('texto') is-invalid @enderror" required="" placeholder="seu texto" name="texto">
                                    {{old('texto')}}
                                </textarea>
                                @error('texto')
                                <div class="invalid-feedback">
                                    <h6>{{$message}}</h6>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 text-right pb-4">
                            <button type="submit" value="submit"
                                class="btn btn-group-sm btn-md btn-dark botao">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endsection

