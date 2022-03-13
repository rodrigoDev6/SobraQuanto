
			Readme



Instalação Projeto Sobra Quanto

-----------Programas----------

Composer<br>
NodeJS<br>
xampp<br>
GitKraken<br>
------------------------------
(Abra o xampp, inicie apache e mysql)

No GitKraken, faça o clone do repositorio, e abra o VScode

Abra o terminal do VsCode e acesse a pasta do SobraQuanto (xampp/htdocs/SobraQuanto/SobraQuanto/)

Digite

**composer install**<br>
**composer update**<br>
**npm install** <br>
**npm run dev**<br>

**cp .env.example .env**<br>

**php artisan key:generate**<br> 

**config .env** <br>
(Criar banco de dados)<br>
(alterar, app name, DB_DATABASE)<br>




**php artisan migrate:fresh** <br>

Para iniciar o sistema:<br>

**php artisan serve**<br>
