# Primeiro CRUD em PHP

Projeto desenvolvido com o objetivo de treinar a linguagem de programação **PHP**, após aproximadamente um mês de estudos, implementando um CRUD completo com sistema de sessões para autenticação e gerenciamento de usuários.

## ✨ Sobre o projeto

- Aplicação simples de cadastro de usuários, com operações de criar, listar, editar e excluir registros.  
- Interface com foco em clareza, utilizando cards e tabelas para exibir os dados de forma organizada.  
- Implementação de sessões para controle de login e acesso às funcionalidades internas do sistema.  
- Uso de MySQL para persistência dos dados dos usuários. 

## 🧱 Tecnologias utilizadas

- PHP  
- MySQL 
- HTML5 e CSS3  
- phpMyAdmin (opcional, para gerenciar o banco)

## 🗄️ Configuração do banco de dados

1. Crie um banco de dados chamado `smartregistry` no MySQL.  
2. Importe o arquivo `smartregistry.sql` que está na raiz do projeto usando o phpMyAdmin ou o de sua preferência.   
   - Esse script cria as tabelas `users` e `usuarios`, já com alguns dados de exemplo.

## ▶️ Como rodar o projeto localmente

1. Certifique-se de ter um servidor PHP instalado (XAMPP, WampServer, Laragon etc.).  
2. Clone este repositório dentro da pasta pública do seu servidor (por exemplo, `htdocs` no XAMPP):  
   ```bash
   git clone https://github.com/pauloovitorr/primeirocrudphp.git
