## Instalação

Após clonar o repositório, acesse a pasta do sistema e instale todas as dependências, executando o comando:

**_composer install_**

## Configuração de dados
Após configurar seu banco de dados no arquivo _.env_ 

Execute o comando

_php artisan migrate_

_php artisan db:seed_

e então abra o tinker com:

_php artisan tinker_

E dentro do tinker execute o comando

_Company::factory()->count(50)->create();_

Com isto vai preencher todos dados fakes nescessarios para teste.

## Visualização da API

Após rodar o comando

_php artisan l5-swagger:generate_ 

e

_php artisan serve_

abra o link <a href="http://localhost:8000/api/documentation">http://localhost:8000/api/documentation</a>

Ali você vai ver toda a documentação da API feita em swagger.


P.S: ultilizei o pacote  <a href="https://github.com/DarkaOnLine/L5-Swagger">github.com/DarkaOnLine/L5-Swagger</a> por isto o código parece um pouco poluido.
