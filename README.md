# Instruções de Instalação 

* A aplicação foi feita em PHP utilizando o framework Laravel na sua versão 8.44.0
* Foi utilizado o banco de dados MySQL na sua versão 5.7.32
* Há uma arquivo SQL para criação das tabelas do banco em (_SCRIPTS), (Caso não consiga rodar a migration do Laravel).
* É preciso ter instalado PHP versão 7 > acima.
* É preciso ter instalado o [composer](https://getcomposer.org).


## Instalação

1. Fazer o clone do projeto (git clone http://url...).
2. Entrar na pasta do projeto clonado e rodar o comando: 

```bash
composer install
```
3. Há um arquivo na pasta do projeto, chamado **.env.example** (arquivo de configuração de variáveis), é preciso renomear o arquivo para **.env** (para ser um arquivo válido de variável).

4. Após renomear o arquivo, rodar o comando abaixo para gerar a key para aplicação (irá gerar uma chave base64 no arquivo .env (APP_KEY):
```bash
php artisan key:generate
```

5. Agora é preciso configurar o arquivo **.env**, defina as variáveis abaixo com as configurações do banco de dados que irá acessar:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1             -- aqui vai o IP, se for rodar local, deixar o atual.
DB_PORT=3306                  -- porta do banco de dados.
DB_DATABASE=laravel           -- nome do banco de dados criado.
DB_USERNAME=root              -- usuário do banco de dados.
DB_PASSWORD=                  -- senha do banco de dados.
```

6. Agora é preciso rodar o comando para fazer as migrations do banco de dados. (migration é uma forma de criar toda estrutura do banco de dados tabelas etc. No terminal/cmd dentro da pasta da aplicação, rode o seguinte comando:

```bash
php artisan migrate
```
(Se o banco de dados estiver rodando e com as configurações certas no .env, o que se espera é criar as tabelas automaticamente).

7. Rodar a aplicação, há duas formas de rodar. Estando dentro da pasta, na raiz, rode um dos códigos:


```bash
php artisan serve

ou

php -S 127.0.0.1:8000 -t public/
```
(normalmente a aplicação estará acessível pelo browser em: http://127.0.0.1:8000)



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)