# Banco de talentos

Página para exibir banco de talentos (em vez de currículos) de uma associação de classe (desenvolvido para a Associação Rio-grandense de Bibliotecários – ARB).

Apenas os associados em dia possuem este benefício, então a exibição é validada pelo campo "associado", mostrando apenas os que tem "Sim" (linha 120).

Exibe lista de pessoas cadastradas a partir de JSON, com os campos:
- nome
- descricao
- conselho
- cidade
- email
- telefone
- facebook
- twitter
- linkedin
- lattes
- site
- blog
- habilidades
- associado

Busca / filtro por método GET.

Utiliza cards do Bootstrap e ícones do FontAwesome.

Tema: Business Frontpage de Start Bootstrap: https://startbootstrap.com/templates/business-frontpage/

Com ajuda de @taniarascia: https://www.taniarascia.com/how-to-use-json-data-with-php-or-javascript/

## Fluxo:
- Criar planilha em Excel / Google Drive
- Transformar em JSON: www.convertcsv.com/csv-to-json.htm
- Atualizar data.json

# Licença

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)