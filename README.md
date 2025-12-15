## SoftCRM – Sistema de Gerenciamento de Relacionamento com o Cliente

## 2. Resumo executivo

SoftCRM é um CRM enxuto desenvolvido em **Laravel 11** para gestão de **clientes**, **atendimentos** e **comentários**, com foco em histórico de relacionamento e organização operacional.  
O projeto foi implementado utilizando **MVC**, **Eloquent ORM**, autenticação nativa do Laravel e uma base de dados relacional modelada com migrations e seeders.  
Conta com **dashboard operacional**, filtros e ordenação em listagens, além de recurso de impressão para relatórios de atendimentos e cadastros.  
O código foi estruturado para ser didático e reutilizável, com separação clara entre camadas de apresentação, regras de negócio e persistência.  
Este repositório é utilizado como **case de portfólio** e integra um **Trabalho de Conclusão de Curso (TCC)** em Análise e Desenvolvimento de Sistemas, desenvolvido em coautoria.

## 3. Descrição geral do sistema

O SoftCRM é uma aplicação web para controle de relacionamento com clientes, permitindo registrar atendimentos e comentários associados a cada interação.  
O sistema centraliza:
- **Cadastro de clientes**, vinculados a cidades;
- **Atendimentos** com data, hora, status, tipo e descrição;
- **Comentários** por atendimento, compondo uma linha do tempo de ocorrências.

O usuário autenticado acessa um **dashboard** com últimos atendimentos e atendimentos urgentes, além de telas específicas para manter cadastros de apoio (cidades e tipos de atendimento).  
Todos os módulos seguem o padrão de controllers, models e views do Laravel, com uso extensivo de Eloquent para os relacionamentos entre entidades.

## 4. Principais funcionalidades

- **Gestão de Clientes**
  - Cadastro, edição e exclusão de clientes.
  - Associação de cada cliente a uma cidade (`city_id`) e indicador de ativo/inativo (`is_active`).
  - Filtros por status (ativo/inativo), busca por nome, e-mail ou telefone e ordenação dinâmica por coluna.
  - Ações específicas para inativar e reativar clientes.

- **Gestão de Atendimentos**
  - Cadastro de atendimentos relacionados a clientes e tipos de atendimento.
  - Campos de data, hora, status e descrição, armazenados na tabela `attendances`.
  - Filtros por status (`pendente`, `urgente`, `finalizado`), por protocolo (ID) e por cliente.
  - Paginação e ordenação configurável via parâmetros de query.

- **Gestão de Comentários**
  - Cadastro de comentários vinculados a um atendimento.
  - Listagem de comentários com carregamento do contexto completo do atendimento (cliente, tipo, status e dados principais).
  - Atualização e exclusão de comentários, com redirecionamento para a listagem filtrada por atendimento.

- **Gestão de Cidades**
  - Cadastro, edição e exclusão de cidades com campos `name` e `uf`.
  - Pesquisa por nome de cidade para facilitar a seleção no cadastro de clientes.

- **Gestão de Tipos de Atendimento**
  - Cadastro, edição e exclusão de tipos de atendimento utilizados nos registros de `attendances`.

- **Dashboard Operacional**
  - Listagem de **últimos atendimentos**, obtidos via método específico no controller de atendimentos.
  - Listagem de **atendimentos urgentes**, filtrados por status.

- **Autenticação e Perfil**
  - Fluxo de autenticação (login, registro, redefinição de senha, verificação de e-mail e confirmação de senha) fornecido pela stack padrão do Laravel.
  - Tela de edição de perfil com atualização de dados do usuário e exclusão de conta autenticada.

- **Relatórios e Impressão**
  - Função JavaScript dedicada (`imprimirPagina`) que aplica estilos específicos para impressão em diferentes listagens.
  - Ocultação de elementos de navegação e ações na visualização impressa.

## 5. Stack e tecnologias utilizadas

- **Back-end**
  - PHP **8.2+** (conforme restrição em `composer.json`).
  - **Laravel 11** (`laravel/framework ^11.9`).
  - **Eloquent ORM** para mapeamento objeto-relacional.

- **Front-end**
  - **Blade Templates** (`resources/views`).
  - HTML5 e CSS (incluindo uso de classes padrão de frameworks como Bootstrap nas views).
  - **JavaScript** simples em `public/js/imprimir.js` para lógica de impressão.

- **Banco de Dados**
  - Base relacional compatível com MySQL/MariaDB.
  - Uso de migrations para criação e evolução do schema.
  - Seeders para carga inicial de usuários, cidades, tipos, clientes, atendimentos e comentários.

- **Autenticação**
  - Stack padrão de autenticação do Laravel, com rotas em `routes/auth.php` e controllers em `App\Http\Controllers\Auth`.

- **Ambiente e ferramentas**
  - **Docker** e **Docker Compose** para padronização do ambiente (`docker-compose.yml`, `docker/Dockerfile`).
  - **Composer** para gerenciamento de dependências PHP.
  - **Node.js, NPM, Vite e Tailwind** conforme estrutura padrão do Laravel 11 (build opcional de assets).

## 6. Estrutura do projeto (MVC / pastas importantes)

- **Camada de Modelos (`app/Models`)**
  - `User` – usuário autenticado, com casts para senha e campo de verificação de e-mail.
  - `Client` – cliente, relacionado a `City` (`belongsTo`) e `Attendance` (`hasMany`).
  - `Attendance` – atendimento, relacionado a `Client` e `Type`, além de `Comment` (`hasMany`).
  - `Comment` – comentário vinculado a um atendimento.
  - `City` – cidade utilizada em cadastros de clientes.
  - `Type` – tipo de atendimento utilizado em `attendances`.

- **Camada de Controllers (`app/Http/Controllers`)**
  - `ClientController` – listagem com filtros e ordenação, cadastro, edição, exclusão e ativação/inativação de clientes.
  - `AttendanceController` – listagem com filtros por status, cliente e protocolo, criação, edição e exclusão de atendimentos, além de método para obtenção de atendimentos recentes.
  - `CommentController` – listagem de comentários por atendimento, criação, edição e exclusão de comentários.
  - `CityController` – pesquisa, cadastro e manutenção de cidades.
  - `TypeController` – CRUD de tipos de atendimento.
  - `DashboardController` – recuperação de dados de últimos e urgentes atendimentos para o dashboard.
  - `ProfileController` – edição e exclusão de perfil do usuário autenticado.
  - Controllers de **autenticação** em `App\Http\Controllers\Auth`, responsáveis pelos fluxos de login, registro e recuperação de senha.

- **Camada de Views (`resources/views`)**
  - `layouts/*` – estrutura base de layout autenticado e convidado.
  - `dashboard.blade.php` – tela inicial com tabelas de últimos e urgentes atendimentos.
  - Pastas `client`, `attendance`, `comment`, `city` e `type` – formulários e listagens para cada módulo.
  - Pastas `auth` e `profile` – telas de autenticação e gerenciamento de perfil.

- **Rotas (`routes`)**
  - `web.php` – rotas web principais, com proteção por middleware `auth` para módulos de negócio e uso de `Route::resource` para recursos REST.
  - `auth.php` – rotas de autenticação padrão do Laravel.

- **Banco de Dados (`database`)**
  - `migrations` – definição das tabelas `users`, `cities`, `types`, `clients`, `attendances` e `comments`, além de ajustes posteriores (ex.: coluna `time` em `attendances`).
  - `seeders` – carga inicial com dados realistas para todos os módulos principais.

- **Infraestrutura**
  - `docker-compose.yml` – definição dos serviços `app`, `mysql` e `nginx`.
  - `docker/Dockerfile` – imagem PHP-FPM configurada com extensões necessárias ao Laravel.

## 7. Fluxo básico de uso do sistema

- **1. Acesso e autenticação**
  - O usuário acessa a aplicação e realiza login pelas rotas de autenticação padrão do Laravel.
  - Após autenticado, é direcionado ao dashboard.

- **2. Dashboard**
  - Exibe tabela de **últimos atendimentos** com informações de cliente, data, hora, status, tipo e descrição.
  - Exibe tabela de **atendimentos urgentes**, com os mesmos campos, permitindo navegação rápida para a listagem filtrada.

- **3. Gestão de clientes**
  - A partir do menu, o usuário acessa a listagem de clientes, com filtros por status (ativo/inativo), busca textual e ordenação.
  - É possível cadastrar novos clientes, editar registros existentes e alterar o status de ativo para inativo e vice-versa.

- **4. Gestão de atendimentos**
  - O usuário pode listar atendimentos com filtros por status, protocolo e cliente.
  - A partir dessa tela, é possível cadastrar novos atendimentos ou editar/excluir registros existentes.

- **5. Gestão de comentários**
  - Em um atendimento específico, o usuário acessa os comentários associados.
  - A tela permite cadastrar, editar e excluir comentários, mantendo o vínculo com o atendimento.

- **6. Cadastros auxiliares**
  - Em **cidades**, o usuário mantém a tabela de municípios com sigla de estado (`uf`).
  - Em **tipos de atendimento**, mantém a lista de tipos disponíveis para associação aos atendimentos.

- **7. Relatórios e impressão**
  - Nas listagens relevantes, o usuário pode acionar a função de impressão.
  - A função JavaScript aplica formatação específica e oculta elementos de navegação para gerar uma versão limpa para relatórios em papel ou PDF.

## 8. Pontos técnicos relevantes

- **Uso de Eloquent e relacionamentos**
  - Relacionamentos `belongsTo` e `hasMany` entre clientes, atendimentos, tipos, cidades e comentários.
  - Carregamento de relações em consultas (`with`) para otimização de queries e redução de N+1.

- **Modelagem e migrations**
  - Criação de tabelas específicas para cada entidade de negócio (clientes, atendimentos, comentários, cidades, tipos).
  - Evolução do schema com migrations adicionais (ex.: inclusão de coluna de horário em atendimentos).

- **Validação e Requests**
  - Utilização de `Form Requests` para operações de perfil.
  - Validações explícitas em controllers para criação e atualização de atendimentos, cidades e comentários.

- **Listagens com filtros, ordenação e paginação**
  - Uso de parâmetros de query para construir filtros dinâmicos em controllers.
  - Paginação aplicada às principais telas de listagem (ex.: clientes e atendimentos).

- **Camada de apresentação e componentes**
  - Views Blade organizadas por módulo, com layout compartilhado em `layouts`.
  - Uso de componentes reutilizáveis em `resources/views/components` para inputs, botões e navegação.

- **Impressão de relatórios**
  - Função `imprimirPagina` em `public/js/imprimir.js` que ajusta classes CSS e oculta o cabeçalho antes de chamar `window.print()`, revertendo o estado após a impressão.

- **Ambiente containerizado**
  - Estrutura de três serviços Docker (aplicação PHP-FPM, banco MariaDB e Nginx).
  - Mapeamento de volumes para código-fonte e configuração de Nginx.

## 9. Como rodar o projeto localmente

### 9.1. Requisitos mínimos

- **PHP 8.2+**
- **Composer**
- Extensões PHP compatíveis com Laravel, incluindo `pdo_mysql`, `mbstring`, `bcmath`, `intl` e outras configuradas no `Dockerfile`.
- Banco de dados compatível com **MySQL/MariaDB**.
- **Node.js** e **NPM** (para build opcional de assets com Vite).

### 9.2. Ambiente local (sem Docker)

> Os comandos a seguir seguem o padrão de projetos Laravel e podem ser ajustados conforme o ambiente.

1. **Clonar o repositório**

```bash
git clone <URL-do-repositório>
cd softcrm02
```

2. **Instalar dependências PHP**

```bash
composer install
```

3. **Instalar dependências front-end (opcional)**

```bash
npm install
npm run dev
```

4. **Configurar variáveis de ambiente**

```bash
cp .env.example .env   # no Windows, copiar manualmente o arquivo
php artisan key:generate
```

5. **Configurar banco de dados**

- Ajustar `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` no arquivo `.env` de acordo com o seu ambiente.

6. **Executar migrations e seeders**

```bash
php artisan migrate --seed
```

7. **Iniciar o servidor de desenvolvimento**

```bash
php artisan serve
```

- A aplicação ficará disponível em `http://localhost:8000` (porta padrão do Artisan).
- Os usuários iniciais de exemplo estão definidos em `database/seeders/UserSeeder.php` (senha `admin` para os usuários seeds).

### 9.3. Ambiente com Docker e Docker Compose

> A configuração está definida em `docker-compose.yml` e `docker/Dockerfile`.

1. **Clonar o repositório e acessar a pasta**

```bash
git clone <URL-do-repositório>
cd softcrm02
```

2. **Configurar `.env` para uso com Docker**

- Copiar `.env.example` para `.env`.
- Ajustar as variáveis de banco para utilizar o serviço `mysql` definido em `docker-compose.yml`:
  - `DB_HOST=mysql`
  - `DB_PORT=3306`
  - `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` em conformidade com as variáveis `MARIADB_*` definidas no `docker-compose.yml`.

3. **Subir os containers**

```bash
docker-compose up -d
```

4. **Executar migrations e seeders dentro do container da aplicação**

```bash
docker exec -it softcrm-app php artisan migrate --seed
```

5. **Acessar a aplicação**

- A aplicação é exposta via Nginx na porta `80`, ficando acessível em:
  - `http://localhost/`

## 10. Sugestão de prints para o README

Sugestões de telas para ilustrar o case:

- **Tela de login** – fluxo de autenticação inicial.
- **Dashboard** – visão geral com últimos atendimentos e atendimentos urgentes.
- **Listagem de clientes** – com filtros, busca e ações de ativação/inativação.
- **Formulário de cliente** – cadastro/edição com seleção de cidade.
- **Listagem de atendimentos** – com filtros por status, cliente e protocolo.
- **Tela de comentários de um atendimento** – exibindo o contexto do atendimento e a lista de comentários.
- **Listagem de cidades** – manutenção de cadastros de apoio.
- **Listagem de tipos de atendimento** – manutenção dos tipos disponíveis.
- **Tela de impressão** – visualização limpa de relatórios de clientes, atendimentos ou comentários.

## 11. Contexto acadêmico e colaboração

Este projeto integra um **Trabalho de Conclusão de Curso (TCC)** do curso de **Análise e Desenvolvimento de Sistemas**.  
O desenvolvimento foi realizado em **coautoria**, com participação conjunta nas etapas de levantamento de requisitos, modelagem de dados, implementação em Laravel, criação de migrations e seeders, desenvolvimento de controllers e views, configuração de Docker e preparação de dados de demonstração.  
Ambos os coautores contribuíram de forma equilibrada em backend (Laravel, Eloquent, validações, controllers), frontend (views Blade, componentes, JavaScript para impressão) e infraestrutura (configuração de ambiente, banco de dados e containers).  
O uso de **Git** como sistema de controle de versão permitiu que o trabalho fosse organizado em commits rastreáveis, facilitando a colaboração, revisão e evolução incremental do código.

## 12. Status do projeto

- **Status:** Projeto acadêmico concluído para fins de TCC e apresentação como case de portfólio.  
- O código encontra-se em estado funcional, com fluxo completo para os módulos principais (clientes, atendimentos, comentários, cidades e tipos).  
- Pode ser estendido para cenários de produção com camadas adicionais de segurança, perfis de acesso mais refinados, logs de auditoria e maior cobertura de testes automatizados.

## 13. Autores

- **Mateus Rosa** – Coautor do projeto, atuando no desenvolvimento da aplicação em Laravel, modelagem de dados, implementação de controllers, views e configuração do ambiente.  

- **Alex Pors** – Coautor do projeto, atuando no desenvolvimento da aplicação em Laravel, modelagem de dados, implementação de controllers, views e configuração do ambiente.  

Ambos os autores participaram conjuntamente das decisões técnicas e da implementação do sistema, sem hierarquia entre as contribuições.


