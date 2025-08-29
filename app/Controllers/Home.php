<?php

namespace App\Controllers;

use App\Entities\Usuario;
use App\Models\MarcadorModel;
use App\Models\PostModel;
use App\Models\UsuarioModel as ModelsUsuarioModel;

class Home extends BaseController
{
    
    public function index()
    {
        $conteudo = view("Home/welcome");
        $u = new ModelsUsuarioModel();
        $form = view("Post/formulario");
        $dados = ["titulo" => "teste", "content" => $form];
        return view('home_template', $dados);
    }

    public function Posts()
    {
        $params = [
            'pesquisa' => $this->request->getGet("pesquisa"),
            'marcador' => $this->request->getGet("marcador_id")
        ];

        
        $p = new PostModel();
        $builder = $p;
        if (!empty($params['pesquisa'])) {
        $builder = $builder->groupStart()
                           ->like('titulo', $params['pesquisa'])
                           ->orLike('subtitulo', $params['pesquisa'])
                           ->groupEnd();
        }

        if (!empty($params['marcador'])) {
            $builder = $builder->where('marcador_id', $params['marcador']);
        }

        $posts = $builder->paginate(5);
        $pager = $p->pager;
        $m = new MarcadorModel();
        $marcadores = $m->findAll();
        $filtro = view("Filtro/postagens", ['marcadores' => $marcadores, 'parametros' => $params]);
        $page = view("Post/lista", ['posts' => $posts, "pager" => $pager, "filtro" => $filtro]);
        
        return view('home_template', ["titulo" => "postagens", "content" => $page]);
    }
    
}