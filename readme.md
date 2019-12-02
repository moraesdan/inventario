## Inventário LABO

Essa aplicação foi desenvolvida para inventariar os bens do LABO Laboratório Oliveira Ltda. Desenvolvida em Laravel e rodando com MySQL para intranet. Nessa aplicação é possivel:

- Gerenciar bens do LABO.
- Gerenciar usuários de acesso ao sistema.
- Criar setores
- Criar locais.
- Realizar movimentações entre locais.


## Instalação (Windows)

- Instale WAMP/XAMPP ou qualquer outro gerenciador para MySQL.
- Clone este projeto para alguma pasta.
- Após configurar o banco e criar um banco com o nome "inventario_labo"
- Editar arquivo .env para acessar o banco
- Instalar o Composer.
- Realizar migrate e seed.
- Rodar "php artisan serve --host 'NUMERO_IP' --port 'NUMERO_PORTA"


## Abrir (Windows)

- Abrir Promt Comando na pasta C:wamp/www/inventario
- Executar o comando "php artisan serve --host 'NUMERO_IP' --port 'NUMERO_PORTA"


## Desenvolvido

Esse sistema foi desenvolvido a pedido da Direção do LABO, projetado e implementado por [Daniel Beltrami](https://danielbeltrami.com.br)