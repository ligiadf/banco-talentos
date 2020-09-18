# Banco de talentos

Página para exibir banco de talentos (em vez de currículos) de uma associação de classe (desenvolvido para a Associação Rio-grandense de Bibliotecários – ARB).

Apenas os associados em dia possuem este benefício, e por um tempo pré-definido.

Exibe lista de pessoas cadastradas a partir de JSON, com os campos:
- Declaro ter lido e estar de acordo com os termos e condições de uso do Banco de Talentos
- Nome completo
- Categoria
- Registro no Conselho
- Descrição
- Cidade
- Disponível para trabalhar em outra localidade
- E-mail
- Telefone
- Facebook
- Twitter
- LinkedIn
- Currículo Lattes
- Site
- Blog
- Habilidades
- Exibir
- Vencimento

Busca / filtro por método GET.

Utiliza cards do Bootstrap e ícones do FontAwesome.

Tema: Business Frontpage de Start Bootstrap: https://startbootstrap.com/templates/business-frontpage/

Com ajuda de @taniarascia: https://www.taniarascia.com/how-to-use-json-data-with-php-or-javascript/

## Fluxo:
- Criar planilha em Excel / Google Drive
- Transformar em JSON: www.convertcsv.com/csv-to-json.htm
- Atualizar data.json

## Changelog

### 18/09/2020 - Novos critérios exibição

- Alterar nome do campo "Associado em dia" para "Exibir"
- Colocar data de vencimento e mostrar só os com data igual ou superior à data atual (epoch time)

### 17/09/2020 21h30 - Ajuste retroativo

- Ajustar para versão que estava em uso desde 17/03/2020: alterar nome arquivo json; corrigir chamada para aceitar json com nome do campo com espaços; incluir critérios para exibição; adicionar campo Disponível para trabalhar em outra cidade.

### 28/04/2019 - Versão inicial

# Licença

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)