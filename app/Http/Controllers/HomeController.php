<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Artigocertifico;
use App\Models\Blog;
use App\Models\Formacao;
use App\Models\jornai;
use App\Models\Livro;
use App\Models\Newspaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    //buscar artigo
    public function artigoSearch(Request $request){
        $artigos = Artigo::where('titulo', 'like', '%' .$request->titulo. '%')->get();

            $result = '';
        if(count($artigos)){
            foreach ($artigos as $artigo) {
                $result .= '<div class="album py-4 ">
                <div class="container" >
                <div class="row">';
                $result .= '<div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <img src="'.asset($artigo->foto).'" alt="" class="card-img-top w-100" style="height:225px">
                    <div class="card-body">
                        <h3>'.$artigo->titulo.'</h3>
                        <p class="card-text">'.$artigo->resumo.'</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary botao"><a class=""
                                        href="'.route('artigo', ['artigo'=>$artigo->id]).'" role="button">ver mais</a></button>
                            </div>
                            <small class="text-muted">'.$artigo->data.'</small>
                        </div>
                    </div>
                </div>
            </div>';
            }
            }
        else{
                 $result .=' <h3>artigo não encontrado </h3>
                                       ';

        }
        return  $result .= '</div> </div> </div>';
    }


    public function index()
    {
        # code..
       $newspapers = Newspaper::latest()->get();
       $artigosRecentes= Artigo::latest()->take(6)->get();
       $artigosMaislidos =  Artigo::orderBy('visualizacao','desc')->take(3)->get();
       return view('frontend.index',compact('artigosRecentes','artigosMaislidos','newspapers'));
    }

    public function verArtigo(Artigo $artigo)
     {
              # code...
              $artigo->visualizacao +=1;
              $artigo->save();
              return view('frontend.leituraartigo',compact('artigo'));
      }

public function verBlog(Blog $blog)
{
    # code...
    $blog->visualizacao +=1;
    $blog->save();
    return view('frontend.leiturablog',compact('blog'));
}

public function todosArtigos()
{
    # code...
        $artigos = Artigo::paginate(9);
        $artigosceitifico = Artigocertifico::latest()->take(10)->get();
    return view('frontend.artigos',compact('artigos','artigosceitifico'));

}
public function livros()
{
    # code...
    $livros = Livro::paginate(6);
    return view('frontend.livros',compact('livros'));
}

public function artigosCintefico()
{
    # code...
    $artigosceitifico = Artigocertifico::paginate(15);
    return view('frontend.artigoscientifico',compact('artigosceitifico'));
}

public function jornais()
{
    # code...
    $jornais = jornai::paginate(10);
    return view('frontend.jornais',compact('jornais'));
}

public function blogs()
{
    # code...
        $blogs = Blog::all();
    return view('frontend.blog',compact('blogs'));

}
public function newsPapers()
{
    # code...
    $newspapers = Newspaper::paginate(9);

    return view('frontend.newspaper',compact('newspapers'));


}

public function newsPaper(Newspaper $newspaper)
{

   $newspaper->visualizacao +=1;
   $newspaper->save();
   return view('frontend.leituranewspaper',compact('newspaper'));

}

public function newspaperDownload(Newspaper $newspaper)
{
    # code...
    try {
        //code...
        return Storage::download($newspaper->pdf);
    } catch (\Throwable $th) {
        //throw $th;
        return dd($th->getMessage());
    }

}
public function formacao()
{

    $formacoes = Formacao::all();
     return view('frontend.formacao',compact('formacoes'));

}

public function verFormacao(Formacao $formacao)
{
     return view('frontend.formacaomais',compact('formacao'));

}
public function candidatura(Formacao $formacao)
{
    # code...

   return view('frontend.telacadastro',compact('formacao'));
}



public function contacto()
{

 return view('frontend.contactos');
}


public function emailContacto(Request $request)
{
    # code...

    $validationRules =  [
        'nome'       => 'required|min:4|max:255',
        'email'       => 'required|email',
        'telefone'       => 'required|min:9|max:14',
        'assunto'       => 'required',
        'mensagem'       => 'required',
        ];


     $validator =  Validator::make($request->all(),$validationRules);
     if($validator->fails()){

        return redirect()->back()->withErrors($validator)->withInput();
     }


     try {
         //code...
           $dados =  array('nome'=>$request->nome,'email'=>$request->email,'assunto'=>$request->assunto,
             'mensagem'=>$request->mensagem,'telefone'=>$request->telefone);

         Mail::send('email',$dados, function ($message) use ($request) {
             $message->from($request->email, $request->nome);
             $message->to('info@joaodono.com', 'joão dono');
             $message->subject($request->assunto);
             $message->priority(3);

         });

     } catch (\Exception $e) {
        // $msg = explode("L:",$e->getMessage());
     return redirect()->back()->with('sweet-error', $e->getMessage());
     }

     return redirect()->back()->with('sweet-success', 'email enviado com sucesso');

}


public function sobre()
{
    # code...
    return view('frontend.sobre');
}

}
