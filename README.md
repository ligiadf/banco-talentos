# Banco talentos

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

Tema: Business Frontpage de por Start Bootstrap: https://startbootstrap.com/templates/business-frontpage/

Fluxo:
- Criar planilha em Excel / Google Drive
- Transformar em JSON: www.convertcsv.com/csv-to-json.htm
- Atualizar data.json