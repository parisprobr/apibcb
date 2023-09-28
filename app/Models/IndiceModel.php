<?php

namespace App\Models;

use App\Repository\IndiceRepository;

class IndiceModel
{
    private $repository;

    public function __construct()
    {
        $this->repository = new IndiceRepository;
    }

    public function getIndice($indice)
    {   
        return $this->repository->getIndice($indice);
        return ['teste' => $indice];
        
    }

}
