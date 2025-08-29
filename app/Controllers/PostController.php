<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MarcadorModel;
use App\Models\PostModel;

class PostController extends BaseController
{

    public function create()
    {
        return view("Post/formulario");
    }

    public function store($id = null)
    {
        $postModel = new PostModel();

        $data = [
            'titulo'    => $this->request->getPost('titulo'),
            'subtitulo' => $this->request->getPost('subtitulo'),
            'conteudo'  => $this->request->getPost('conteudo'),
            'marcador_id' => $this->request->getPost('marcador_id')
        ];

        if ($id) {
            if (!$postModel->update($id, $data)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $postModel->errors());
            }

            $success = "Postagem atualizada com sucesso!";
        } else {
            if (!$postModel->insert($data)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $postModel->errors());
            }

            $success = "Postagem criada com sucesso!";
        }

        $form = view("Sucesso/simples", ['success' => $success]);
        return view("home_template", [
            'titulo'  => "sucesso",
            'content' => $form
        ]);
    }


    public function getOne($id)
    {
        $post = new PostModel();
        $data = $post->find($id);

        if (!$data) 
        {
            return redirect()->back()->withInput()->with('errors', $post->errors());
        }

        $content = view("Post/visualizacao", ['post' => $data] );

        return view("home_template", ['titulo' => "Postagem", 'content' => $content]);
    }


    public function control()
    {
        $session = session();

        if (!$session->has("usuario_id"))
        {
           return redirect('/');
        }

        $p = new PostModel();
        $posts = $p->paginate(5);
        $pager = $p->pager;
        $content = view("Post/tabela", ['posts' => $posts, "pager" => $pager]);
        return view("home_template", ["titulo" => "Tabela - posts", "content" => $content]);
    }

    public function criar()
    {
        helper('form');
        $m = new MarcadorModel();
        $marcadores = $m->findAll();
        $content = view('Post/formulario', ["marcadores" => $marcadores]);
        return view("home_template", ["titulo" => "Post", "content" => $content]);
    }


    public function editar($id = null)
    {
        helper('form');
        $p = new PostModel();
        $post = $p->find($id);
        $m = new MarcadorModel();
        $marcadores = $m->findAll();

        if (!$post) {
            return redirect()->back();
        }

        $content = view('Post/formulario', ["post" => $post, "marcadores" => $marcadores]);
        return view("home_template", ["titulo" => "Post", "content" => $content]);
    }

    public function excluir($id)
    {
        $p = new PostModel();
        $post = $p->find($id);

        if ($post) {
            $p->delete($id);
            return redirect()->back();
        }
    }
}