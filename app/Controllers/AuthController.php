<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->has("usuario") && $session->has("usuario_id"))
        {
            return redirect("/");
        }

        $action = site_url("/auth/logar");
        $content = view("Login/formulario", ['action' => $action]);
        return view("home_template", ['titulo' => "login", "content" => $content]);
    }

    public function logar()
    {
        $usuario = new UsuarioModel();
        $user = $usuario->where('usuario', $this->request->getPost('usuario'))->first();
        
        if (!$user)
        {
            return redirect()->back()->withInput()->with('errors', ["Usuário não encontrado"]);
        } 
        else
        {
            if ($user->verificarSenha($this->request->getPost('senha')))
            {
                $session = session();
                $session->set('usuario', $user->usuario);
                $session->set('usuario_id', $user->id);

                $success = "Logado com sucesso!";
                $form = view("Sucesso/simples", ['success' => $success]);
                return view("home_template", ['titulo' => "Login", 'content' => $form]);
            }
        }
    }

    public function logoff()
    {
        $session = session();

        if ($session->has("usuario") && $session->has("usuario_id"))
        {
            $session->destroy();
            return redirect("/");
        }
    }
}