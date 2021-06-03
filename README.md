# Instruções de Instalação 

### Importante:

* A aplicação foi feita em PHP utilizando o Framework Laravel na sua versão 8.44.0
* Se conecta ao banco de dados MySQL na sua versão 5.7.32
* A criação das tabelas é feita pela migration do Laravel. (Caso há problemas na migration, há um arquivo SQL para criação das tabelas do banco na pasta (_SCRIPTS), na raiz do projeto.
* É necessário PHP versão 7 > acima.
* É necessário ter instalado o [composer](https://getcomposer.org) (gerenciador de dependências do PHP).


## Instalação

1. Fazer o clone do projeto (git clone https://github.com/danilocarva9/fiemt_project.git).
2. Abrir o Terminal/CMD, entrar na pasta do projeto clonado e rodar o comando abaixo: 

```bash
composer install
```
 > (O comando acima irá instalar todas as dependências do projeto)


3. Há um arquivo na pasta raiz do projeto, chamado **.env.example** (arquivo de configuração de variáveis), é preciso renomear o arquivo para **.env** (para ser um arquivo válido).

4. Após renomear o arquivo, rodar o comando abaixo para gerar a key para aplicação (irá gerar uma chave base64 no arquivo .env (APP_KEY):
```bash
php artisan key:generate
```

5. Agora é preciso configurar o arquivo **.env**, nele é preciso definir as variáveis abaixo com as configurações do banco de dados MYSQL que irá acessar:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1             -- aqui vai o IP, se for rodar local, deixar o atual.
DB_PORT=3306                  -- porta do banco de dados.
DB_DATABASE=laravel           -- nome do banco de dados criado.
DB_USERNAME=root              -- usuário do banco de dados.
DB_PASSWORD=                  -- senha do banco de dados.
```

6. Agora é preciso rodar o comando para fazer as migrations do banco de dados. (migration é uma forma de criar toda estrutura do banco de dados tabelas etc. No terminal/CMD dentro da pasta da aplicação, rode o seguinte comando:

```bash
php artisan migrate
```
> (Se o banco de dados estiver rodando e com as configurações certas no .env, o migration deve criar as tabelas [clientes, pedidos, produtos e migrations] automaticamente).

7. Para rodar a aplicação, há duas formas. Estando no Terminal/CMD dentro da pasta, na raiz, rode um dos códigos:

```bash
php artisan serve

ou

php -S 127.0.0.1:8000 -t public/
```
>(A aplicação estará acessível pelo browser em: http://127.0.0.1:8000)



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)