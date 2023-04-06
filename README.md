Projeto de Vendas (Front-end e Back-end)
Este projeto é composto por um aplicativo de front-end desenvolvido com React e Material-UI e um back-end desenvolvido em PHP com PostgreSQL. O aplicativo permite cadastrar produtos, tipos de produtos, realizar vendas e visualizar uma lista de vendas realizadas.

Requisitos
Node.js (v14+)
PHP (7.4+)
PostgreSQL (9+)

Configuração do Ambiente:

Back-end

Clone este repositório para o seu ambiente local.

git clone https://github.com/sebet89/projeto-vendas.git

Clone o repositório do front-end:

git clone https://github.com/sebet89/projeto_teste_fron.git

coloque este arquivo dentro do "projeto-vendas"

Entre no diretório do backend.

cd projeto-vendas/backend

baixe pacotes de testes utilizando o comando:
composer install (para isso é preciso estar com composer instalado na máquina)

Configure o arquivo apiConfig.php alterando as configurações de banco de dados de acordo com o seu ambiente.

Crie um banco de dados no PostgreSQL e execute o script php backend/migrate.php para criar as tabelas necessárias.


Inicie o servidor PHP embutido.

php -S localhost:8080
_______________________

Front-end
Entre no diretório do front-end.

cd projeto-vendas/projeto_teste_fron

Instale as dependências do projeto com o npm.

npm install

Atualize o arquivo src/apiConfig.js e altere a URL da API de acordo com o endereço do servidor back-end (por exemplo, http://localhost:8080).

Inicie o servidor de desenvolvimento do React.

npm start

Agora você deve ter o front-end rodando na porta 3000 e o back-end na porta 8080 (ou na porta que você configurou). Abra o navegador e acesse http://localhost:3000 para começar a usar o aplicativo.