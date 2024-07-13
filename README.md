# Sistema de Gerenciamento de Hospedagem de Sites

## Visão Geral
Este projeto é um sistema de gerenciamento de hospedagem de sites desenvolvido com Laravel. O sistema inclui funcionalidades para cadastro de clientes, gerenciamento de planos de hospedagem, painel de controle do cliente, faturamento e pagamentos, suporte técnico, monitoramento de servidores e relatórios e análises.

## Tecnologias Utilizadas

- Laravel - Framework PHP para desenvolvimento web.
- FilamentPHP - Uma coleção de componentes full-stack
- Sqlite - Banco de dados embutido.
- Composer - Gerenciador de dependências para PHP.
- PHP - Linguagem de programação.

## Funcionalidades

1. Cadastro de Clientes
2. Gerenciamento de Planos de Hospedagem
3. Painel de Controle do Cliente (cPanel)
4. Faturamento e Pagamentos
5. Suporte Técnico
6. Monitoramento de Servidores
7. Relatórios e Análises

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/tecrodrigocastro/red-host-core.git
cd red-host-core
```

2. Instale as dependências:
```bash
composer install
```
3. Configure o `.env`

```bash
cp .env.example .env
php artisan key:generate
```
Edite o arquivo `.env` para configurar seu banco de dados e outras variáveis de ambiente.

4. Execute as migrações e seeders:
```bash
php artisan migrate --seed
```

5. Inicie o servidor local:
```bash
php artisan serve
```

## Estrutura do Banco de Dados

**Tabelas Principais**
- clients: Armazena informações dos clientes.
- plans: Armazena informações dos planos de hospedagem.
- hosting_accounts: Armazena informações das contas de hospedagem dos clientes.
- invoices: Armazena informações de faturamento e pagamentos.
- tickets: Armazena os tickets de suporte dos clientes.
- server_monitorings: Armazena dados de monitoramento dos servidores.
- reports: Armazena relatórios e análises.

## Factories e Seeders
O sistema utiliza factories e seeders para gerar dados fictícios para testes. As factories estão localizadas em `database/factories` e os seeders em `database/seeders`.

**Exemplo de Execução de Seeders**
Para popular o banco de dados com dados de teste, execute:

```bash
php artisan db:seed
```
