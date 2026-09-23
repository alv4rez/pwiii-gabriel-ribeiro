# pwiii-gabriel-ribeiro
### 📚 Programação Web III com o Professor João Siles

---

## [1 - Spring Boot](./estoquelivros)
## COMO CRIAR UM PROJETO SRING BOOT

### 1. Gerar o projeto

Todo projeto Spring Boot começa no [Spring Initializr](https://start.spring.io), um site que monta a estrutura inicial para você, sem precisar criar pastas e arquivos de configuração na mão.

- **Project:** Maven, a ferramenta que baixa as bibliotecas e compila o projeto
- **Language:** Java
- **Spring Boot:** a versão estável mais recente (evite as que terminam em `SNAPSHOT` ou `M`, ainda estão em teste)
- **Group:** identificação da organização, no formato de domínio invertido (ex: `com.escola`)
- **Artifact:** o nome do projeto (ex: `estoquelivros`)
- **Java:** a mesma versão instalada no seu computador

Depois, clique em **ADD DEPENDENCIES** e escolha as bibliotecas que o projeto vai usar. Cada uma adiciona uma funcionalidade pronta, por exemplo:

- **Spring Web:** para criar os endpoints da API
- **Spring Data JPA:** para acessar o banco de dados sem escrever SQL
- **H2 Database:** um banco de dados que roda em memória, bom para estudo

Clique em **Generate**. O site baixa um arquivo `.zip` com o projeto já configurado.

### 2. Abrir o projeto na IDE

Extraia o `.zip` e abra, na sua IDE (por exemplo, o IntelliJ), a pasta que contém o arquivo `pom.xml`. É esse arquivo que identifica o projeto como Maven e lista todas as dependências escolhidas.

Na primeira abertura, a IDE baixa as bibliotecas do `pom.xml`, um processo chamado de **build**, que pode levar alguns minutos.

### 3. Iniciar a aplicação

O Spring Boot precisa de um ponto de partida: a classe marcada com `@SpringBootApplication`, geralmente chamada de `NomeDoProjetoApplication`. É essa classe que:

- liga o **Tomcat**, um servidor web embutido, sem precisar instalar nada à parte;
- carrega automaticamente as configurações do projeto;
- deixa a aplicação **escutando** requisições em um endereço local, por padrão `http://localhost:8080`.

Para rodar, basta clicar no botão de **play** ao lado dessa classe, na IDE. Quando o console mostrar uma mensagem como `Started EstoquelivrosApplication`, a aplicação está no ar e pronta para receber requisições.
