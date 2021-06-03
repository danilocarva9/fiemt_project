# Instruções de Instalação 

### Importante:

* A aplicação foi feita em PHP utilizando o Framework Laravel na sua versão 8.44.0
* Se conecta ao banco de dados MySQL na sua versão 5.7.32
* A criação das tabelas é feita pela migration do Laravel. (Caso há problemas na migration, há um arquivo SQL para criação das tabelas do banco na pasta (_SCRIPTS), na raiz do projeto.
* É necessário PHP versão 7 > acima.
* É necessário ter instalado o [composer](https://getcomposer.org) (gerenciador de dependências do PHP).


## Instalação

1. Fazer o clone do projeto 

```bash
git clone https://github.com/danilocarva9/fiemt_project.git
```

2. Verificar as extensões do PHP necessárias, se estão instaladas e habilitadas para o projeto Laravel. (openssl, php-common, php-bcmath, php-curl, php-json, php-mbstring, php-mysql, php-xml, php-zip).
> --

3. Edite o arquivo na pasta raiz do projeto, chamado **.env.example** (arquivo de configuração de variáveis), é preciso renomear o arquivo para **.env** (para ser um arquivo válido).


4. Abrir o Terminal/CMD, entrar na pasta do projeto clonado e rodar o comando abaixo: 

```bash
composer install
```
 > (O comando acima irá instalar todas as dependências do projeto, caso haja algum erro, deverá verificar se o PHP está com as extensões listadas acima, instaladas e ativas.)


5. Após editar o arquivo **.env**, rodar o comando abaixo para gerar a key para aplicação (irá gerar uma chave base64 no arquivo .env (APP_KEY):
```bash
php artisan key:generate
```

6. Inicie (se já não iniciado) o servidor de  Banco de Dados MYSQL, e crie uma database chamada **meus_pedidos**


7. Configure o arquivo **.env**, nele é preciso definir as variáveis abaixo com as configurações do banco de dados MYSQL que irá acessar:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1             -- aqui vai o IP, se for rodar local, deixar o atual.
DB_PORT=3306                  -- porta do banco de dados.
DB_DATABASE=meus_pedidos           -- nome do banco de dados criado.
DB_USERNAME=root              -- usuário do banco de dados.
DB_PASSWORD=                  -- senha do banco de dados.
```
> Definir as variáveis de acordo com as informações de acesso do seu banco local.


8. Agora depois de configurado o acesso ao banco de dados, é preciso rodar o comando para fazer as migrations do banco de dados. (migration é uma forma de criar toda estrutura do banco de dados tabelas etc. No terminal/CMD dentro da pasta da aplicação, rode o seguinte comando:

```bash
php artisan migrate
```
> (Se o banco de dados estiver rodando e com as configurações certas no .env, o migration deve criar as tabelas [clientes, pedidos, produtos e migrations] automaticamente).


9. Para rodar a aplicação, há duas formas. Estando no Terminal/CMD dentro da pasta, na raiz, rode um dos códigos:

```bash
php artisan serve

ou

php -S 127.0.0.1:8000 -t public/
```
>(A aplicação estará acessível pelo browser em: http://127.0.0.1:8000)



# =) Pronto xD
A aplicação deverá rodar e é possível mexer nas funcionalidades criadas.

Para acessar essa aplicação rodando online, favor acessar o endereço abaixo:

[dscarvalho.com](https://dscarvalho.com/projetos/fiemt_project)