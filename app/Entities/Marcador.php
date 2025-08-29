<?php

namespace App\Entities;
use CodeIgniter\Entity\Entity;

class Marcador extends Entity
{
    protected $datamaps = [
        "nome" => "nome"
    ];

     protected $dates = [
        'dataCadastro' => 'data_cadastro'
    ];

}