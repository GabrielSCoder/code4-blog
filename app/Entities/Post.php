<?php

namespace App\Entities;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Post extends Entity
{
    protected $datamap = [
        'título' => 'titulo',
        'subtitulo' => 'subtitulo',
        'conteudo' => 'conteudo',
        'marcadorId' => 'marcador_id'
    ];

    protected $casts = [
        'usuarioId' => 'usuario_id',
        'marcadorId' => 'marcador_id'
    ];

    protected $dates = [
        'dataCadastro' => 'data_cadastro',
        'dataEdicao' => 'data_edicao'
    ];

    public function setDataCriacao()
    {
        $this->attributes['data_cadastro'] = Time::now(app_timezone());
        return $this;
    }

    public function setDataModificacao()
    {
        $this->attributes['data_edicao'] = Time::now(app_timezone());
        return $this;
    }

    public function __toString()
    {
        return "{$this->titulo} {$this->conteudo} {$this->data_cadastro}";
    }
}