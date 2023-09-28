<?php

namespace App\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;


class IndiceRepository
{
    const URL_BCB = 'https://api.bcb.gov.br/';
    const ENDPOINT_INDICES_BCB = 'dados/serie/bcdata.sgs.';
    const ID_IGPM_BCB = 189;
    const ID_IPCA_BCB = 433;

    public function getIndice($indice)
    {
        $client = new Client();
        $meses  = 12;
        $consulta = "/dados/ultimos/{$meses}";
        try {
            $request = new Request(
                'GET',
                self::URL_BCB .
                self::ENDPOINT_INDICES_BCB .
                $this->getIndiceId($indice) .
                $consulta
            );
            $res = $client->sendAsync($request)->wait();
            return json_decode($res->getBody());
        } catch (ClientException $e) {
            $resposta = $e->getResponse();
            $respostaBody = $resposta->getBody()->getContents();
            return json_decode($respostaBody);
        }
    }

    private function getIndiceId($indice)
    {
        switch ($indice) {
            case 'igpm':
                return self::ID_IGPM_BCB;
                break;
            case 'ipca':
                return self::ID_IPCA_BCB;
                break;
        }
    }
}
