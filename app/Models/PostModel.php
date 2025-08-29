<?php

namespace App\Models;
use App\Entities\Post;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $primaryKey = "id";
    protected $table = "post";
    protected $returnType = Post::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'titulo',
        'subtitulo',
        'conteudo',
        'marcador_id'    
    ];

    protected $validationRules = [
        'titulo' => 'required',
        'subtitulo' =>  'required',
        'conteudo' => 'required'
    ];

    protected $validationMessages = [
        'titulo' => [
            'required' => 'Título obrigatório'
        ],
         'subtitulo' => [
             'required' => 'Subtítulo obrigatório'
        ],
         'conteudo' => [
            'required' => 'Conteúdo obrigatório'
        ]
    ];

    protected $useTimestamps = true;
    protected $createdField = 'data_cadastro';
    protected $updatedField = 'data_edicao';
}