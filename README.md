# apibcb
Projeto para fim acadêmico, utiliza a API do banco central (https://dadosabertos.bcb.gov.br/dataset) para consulta de Indices e calculo de ajuste de preços

## Mapear no hosts:
127.0.0.1 api.apibcb.local mysql.apibcb.local

## .env
versionado dado que este projeto é destinado a estudos

## Iniciando aplicação
docker-compose up -d

## Acessando
api.apibcb.local/api

## Endpoints

* Consulta por meses:
http://api.apibcb.local/api/getIndiceMeses/igpm?meses=6

* Consulta por período:
http://api.apibcb.local/api/getIndicePeriodo/igpm?de=01/01/2023&ate=01/10/2023

* Calculo de preço de ajuste:
http://api.apibcb.local/api/ajusteDePrecoPeriodo/igpm/230/?de=28/01/2023&ate=28/03/2023