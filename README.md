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


#
# Cenários

# Cenário 1: 
Consulta de histórico do indice de IGPM ou IPCA dos últimmos X meses

### Descrição:
Como usuário, quero poder consultar o histórico dos índices de IGPM e IPCA dos últimos meses, através de um Endpoint de API, para obter informações econômicas relevantes.

### Pré-condições:
- A funcionalidade depende do consumo de dados da API do Banco Central, que está disponível em [dadosabertos.bcb.gov.br](https://dadosabertos.bcb.gov.br/dataset).

### Ações do Usuário:
O usuário deve realizar uma solicitação GET para o endpoint `getIndiceMeses`, fornecendo os seguintes parâmetros:
- `Indice` (IGPM ou IPCA)
- `Meses` (quantidade de meses a serem retornados)

### Resultado Esperado:
Espera-se que a resposta seja fornecida no formato JSON, com a seguinte estrutura:

```json
{
    "data": [
        {
            "data": "01/01/2023",
            "valor": "0.21"
        },
        {
            "data": "01/02/2023",
            "valor": "0.18"
        },
        {
            "data": "01/03/2023",
            "valor": "0.23"
        },
        ...
    ]
}
```

# Cenário 1 Testes de Aceitação:

### Teste 1: Consulta Válida de IGPM

- **Descrição:** Deve ser possível consultar o histórico do índice de IGPM dos últimos 6 meses.
- **Ações:**
  - Fazer uma solicitação GET para o endpoint `getIndiceMeses` com os parâmetros `Indice` definido como "IGPM" e `Meses` definido como 6.
- **Resultado Esperado:**
  - Verificar se a resposta contém um array de objetos com 6 entradas, cada uma representando um mês com as chaves "data" e "valor".

### Teste 2: Consulta Válida de IPCA

- **Descrição:** Deve ser possível consultar o histórico do índice de IPCA dos últimos 3 meses.
- **Ações:**
  - Fazer uma solicitação GET para o endpoint `getIndiceMeses` com os parâmetros `Indice` definido como "IPCA" e `Meses` definido como 3.
- **Resultado Esperado:**
  - Verificar se a resposta contém um array de objetos com 3 entradas, cada uma representando um mês com as chaves "data" e "valor".

### Teste 3: Consulta Inválida - Índice Incorreto

- **Descrição:** Deve retornar um erro ao tentar consultar um índice inválido.
- **Ações:**
  - Fazer uma solicitação GET para o endpoint `getIndiceMeses` com o parâmetro `Indice` definido como "XYZ" e `Meses` definido como 6.
- **Resultado Esperado:**
  - Verificar se a resposta contém uma mensagem de erro apropriada indicando que o índice é inválido.

### Teste 4: Consulta Inválida - Meses Negativos

- **Descrição:** Deve retornar um erro ao tentar consultar um número negativo de meses.
- **Ações:**
  - Fazer uma solicitação GET para o endpoint `getIndiceMeses` com os parâmetros `Indice` definido como "IGPM" e `Meses` definido como -1.
- **Resultado Esperado:**
  - Verificar se a resposta contém uma mensagem de erro apropriada indicando que o número de meses é inválido.

