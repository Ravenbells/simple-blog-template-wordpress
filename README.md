# Introdução

Este é um template feito para testes e seguindo a ideia proposta em [Figma](https://www.figma.com/file/8yPNAVRLSa5eE1gclfelA2/Blog---Teste-Navas?node-id=0%3A1).

Aqui você vai encontrar o básico para instalação Wordpress (localhost) e implementação do tema utilizando OS Linux, distro baseada em Debian.

Caso você esteja usando algum desktop diferente, como WIndows ou Mac, recomendo que utilize outros tutoriais para ajudar na instação inicial.

# Prepare o Desktop

O que você vai precisar:

1. Arquivos [Wordpress](https://wordpress.org/download/releases/);

2. Instalar [Apache2](https://archive.apache.org/dist/httpd/binaries/);

3. Instalar MariaDB [Server](https://mariadb.org/mariadb/all-releases/) e [Client](https://mariadb.com/kb/en/mariadb-connector-j-11-release-notes/);

4. Instalar MySQL;

5. Instalar pacotes [PHP](https://github.com/php/php-src);

   Você pode fazer o download normalmente nos links disponibilizados, como também instalando pacotes diretamente no terminal.

   Se desejar instalar diretamente no terminal. Atualize seu repositório Linux antes de começar a instalar os pacotes.

   ```bash
   sudo apt update
   ```

   

## Arquivos Wordpress

```bash
wget https://wordpress.org/wordpress-5.9.zip
```

> O tema foi desenvolvido utilizando a versão 5.9 do Wordpress.

Existem duas maneiras de instalar os arquivos Wordpress: diretamente no diretório do Apache2 ou criando um link simbólico na pasta do Apache2. Ambas as maneiras servem, porém neste tutorial o processo será feito a partir do link simbólico. Portanto, escolha qualquer lugar que desejar para instalar seu wordpress.

## Apache2

```bash
sudo apt install apache2 -y
```

Logo após a instação você pode verificar se o Apache2 está ativo em seu localhost. Abra o navegador e digite localhost na caixa de texto de url.

Caso o Apache2 não esteja ativo, o documento HTML não será exibido no localhost. Você pode tentar iniciar o apache2 com o seguinte comando:

```bash
sudo systemctl start apache2
```



## MariaDB

```bash
sudo apt install mariadb-server mariadb-client -y
```

Inicie MariaDB com o seguinte comando:

```bash
sudo systemctl start mariadb
```

Para verificar o status do programa use:

```bash
sudo systemctl status mariadb
```



## MySQL

Para configurar MySQL e funcionar junto com seu servidor, escreva o seguinte comando em seu terminal:

```bash
sudo mysql_secure_installation
```

- Enter current password for root (enter for node): 

Se você nunca instalou um servidor anteriormente, não haverá senha do root, apenas pressione enter para continuar.

- Set root password? [Y/n] Y

Digite "Y" pra configurar uma senha para o root.

- Remove anonymous user? [Y/n] Y
- Disallow root login remotely? [Y/n] Y
- Remove test database and acces to it? [Y/n] Y

Digite "Y" para prevenir que usuários anônimos se conectem a sua base de dados, que não haja acesso remoto e para remover sua database de teste. É uma medida de segurança, se desejar utilizar o servidor ainda como teste, apenas digite "n".

- Reload privilege tables now? [Y/n] Y

Digite "Y" para atualizar suas mudanças na base de dados.

## PHP

```bash
sudo apt install php php-mysql php-cgi php-cli php-gd  -y
```

# Configuração

Caso você ainda não tenha extraído o **.zip**  faça isso agora na pasta que desejar:

```bash
unzip -q wordpress*.zip -d ~/minha_pasta_wordpress
```

Crie o link simbólico, com o nome que desejar, na pasta de repositórios do Apache2:

```bash
cd /var/www/html
ln -s ~/minha_pasta_wordpress nome_pasta_link_simbólico
```

Reinicie o Apache2 e mude a propriedade de usuário na pasta de repositórios do Apache2:

```bash
sudo systemctl restart apache2
sudo chown -R www-data:www-data /var/www/*
```

Se desejar, você pode utilizar o banco de dados de teste, com usário de teste e posts de exemplo postados.

> Antes de importar, crie primeiramente um database.

```mysql
-- use este comando no terminal para acessar seu database:
-- mysql -u root -p
CREATE DATABASE database_name
```

```bash
sudo mysql -u root -p database_name < navas_template*.sql
```

Usário Wordpress:

- Teste

Senha Wordpress:

- admin_navas