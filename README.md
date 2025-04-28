# Gestão de Tarefas - Desafio Técnico SES-MT

Este projeto é uma aplicação de gestão de tarefas (To-Do List) desenvolvida como parte do desafio técnico da SES-MT para vaga de estágio.

## 🚀 Tecnologias Utilizadas

- PHP 8.2
- Laravel 12
- Bootstrap 5.3
- Blade Templates
- SQLite (padrão)
- Laravel Breeze (Autenticação)

## ✅ Funcionalidades

- Cadastro e login de usuários
- Cada usuário gerencia apenas suas próprias tarefas
- CRUD completo de tarefas (Criar, Listar, Editar, Excluir)
- Status da tarefa: ⏳ Pendente / ✅ Concluída
- Filtro por status
- Paginação
- Tela inicial personalizada
- Modal de confirmação para exclusão
- Interface 100% responsiva (mobile, tablet, desktop)
- Seeders e testes automatizados

## ⚙️ Como Rodar o Projeto

1 - Clone o repositório:
```bash
git clone https://github.com/EmersonCarlosAlvesSouza/CRUD-com-PHP-LARAVEL.git
cd CRUD-com-PHP-LARAVEL

2 - Instale as dependências:

composer install
npm install
npm run build


3 - Copie o arquivo .env.example para .env:
cp .env.example .env


4 - Configure o banco de dados no arquivo .env (ex: SQLite ou MySQL).


5 - Gere a chave da aplicação:
php artisan key:generate


6 - Rode as migrations e os seeders:
php artisan migrate:fresh --seed


7 - Inicie o servidor local:
php artisan serve


8 - Acesse no navegador:
http://127.0.0.1:8000



## 🧪 Como Rodar os Testes

Execute o comando:
php artisan test

