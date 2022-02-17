# Gerenciador de pedidos

## Objetivo

<br>
    Desenvolver um sistema capaz de gerenciar pedidos, seus produtos e fornecedores em formato de tabelas.
<br>

## Observações e como inicializar o projeto

<br>

### Configurações da Database
<br>

 - O banco de dados usado foi o PostgreSQL.
   -   Os nomes das tabelas têm de ser:
       -   **"produto"** - para os produtos.
       -   **"pedido"** - para os pedidos.
       -   **"fornecedor"** - para os fornecedores.
   - Script de criação da tabela:
     ```sql
        CREATE SEQUENCE id_produto;
        CREATE TABLE produto(
            id_produto int default nextval('id_produto'::regclass) PRIMARY KEY,
            nome Varchar(50),
            preço Decimal(19, 2)
        )
        
        CREATE SEQUENCE id_fornecedor;
        CREATE TABLE fornecedor(
            id_fornecedor int default nextval('id_fornecedor'::regclass) PRIMARY KEY,
            nome Varchar(50)
        )
        
        CREATE SEQUENCE id_pedido;
        CREATE TABLE pedido(
            id_pedido int default nextval('id_pedido'::regclass) PRIMARY KEY,
            chave_nfe Varchar(30)
            quantidade int,
            valor_total int,
            estado estado,
            id_fornecedor int,
            FOREIGN KEY (id_fornecedor) REFERENCES fornecedor (id_fornecedor),
            id_produto int,
            FOREIGN KEY (id_produto) REFERENCES produto (id_produto)
        )
        ```

### Avisos gerais

  - Pedidos, produtos e fornecedores tem as funções **criar**, **excluir**, **editar** e **listar**.
  - Pedidos podem ser ordenados crescentemente por qualquer campo.
  - Pedidos podem ser pesquisados pelo seu ID.
  

### Como inicializar o projeto

  - Você irá precisar de um CLI Interpretar do PHP, isso pode ser instalado via Xampp. Na sua IDE, vá nas suas configurações do PHP e adicione o seu CLI Interpreter, que está no diretório do xampp. O diretório padrão é `C:\xampp\php\php.exe`.

    <img src="https://i.imgur.com/sInc7m8.png" />
    
  - Após concluir os passos acima, apenas vá para o terminal e digite `php spark serve`. Então, você estará livre para acessar a aplicação no endereço indicado pelo próprio terminal.
  
    <img src="https://i.imgur.com/Y1EkGkJ.png" /> <br><br>

## Tecnologias utilizadas

<br>

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg" width="100px" height="100px"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="100px" height="100px"/> 
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="100px" height="100px"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="100px" height="100px"/> 
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="100px" height="100px"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original-wordmark.svg" width="100px" height="100px"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" width="100px" height="100px"/>

## Prévia do sistema

### Menu
<img src="https://i.imgur.com/oYAcZyi.png"/>

### Gerenciamente de pedidos
<img src="https://i.imgur.com/8HUg7lp.png"/>

### Gerenciamento de produtos
<img src="https://i.imgur.com/qBnJLgs.png"/>

### Gerenciamento de fornecedores
<img src="https://i.imgur.com/VCq3PBd.png"/>
