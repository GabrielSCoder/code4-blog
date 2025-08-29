<?php

namespace App\Entities;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Usuario extends Entity
{
    protected $datamap = [
        'nomeCompleto' => 'nome_completo',
        'usuario'      => 'usuario',
        'perfilId'     => 'perfil_acesso_id',
        'dataCriacao'  => 'data_criacao',
        'dataModificacao' => 'data_modificacao'
    ];

    protected $casts = [
        'perfilId' => 'perfil_acesso_id',
    ];

    protected $dates = [
        'dataCriacao' => 'data_criacao',
        'dataModificacao' => 'data_modificacao'
    ];

    public function setDataCriacao()
    {
        $this->attributes['data_criacao'] = Time::now(app_timezone());
        $this->attributes['data_modificacao'] = null;
        return $this;
    }

    public function setSenha($senha)
    {
        $this->attributes['senha'] = password_hash($senha, PASSWORD_DEFAULT);
        return $this;
    }

    public function verificarSenha($senha)
    {
        return password_verify($senha, $this->attributes['senha']);
    }

}