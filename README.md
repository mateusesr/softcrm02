
# SoftCRM

![Laravel](https://img.shields.io/badge/Laravel-Framework-red) ![Version](https://img.shields.io/badge/version-1.0.0-blue) ![License](https://img.shields.io/badge/license-MIT-green)

SoftCRM é um sistema de gerenciamento de relacionamento com o cliente (CRM) desenvolvido em Laravel, com foco em simplicidade, desempenho e praticidade. Criado como parte de um projeto de conclusão de curso, o sistema busca atender às necessidades essenciais de controle de clientes, protocolos e relatórios em uma interface intuitiva.

## 🔧 Funcionalidades

- Cadastro e gerenciamento de clientes
- Controle de protocolos e atendimentos
- Geração de relatórios detalhados
- Histórico de interações com os clientes
- Autenticação e segurança de acesso
- Interface simples e responsiva

## 🚀 Tecnologias utilizadas

- PHP (Laravel)
- MySQL/MariaDB
- HTML, CSS (Bootstrap)
- Blade (Laravel)
- Breeze (Laravel Auth)

## 📦 Instalação

```bash
# Clone o repositório
git clone https://github.com/mateusesr/softcrm02.git

# Acesse a pasta
cd softcrm02

# Instale as dependências
composer install
npm install && npm run dev

# Copie o .env e configure
cp .env.example .env
php artisan key:generate

# Configure seu banco de dados no .env e rode as migrations
php artisan migrate

# Inicie o servidor local
php artisan serve
```

## 📄 Licença

Este projeto está licenciado sob a licença MIT.
