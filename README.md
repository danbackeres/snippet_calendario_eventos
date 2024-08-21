# Snippet Calendário de Eventos

##### Snippet de Calendário de Eventos utilizando PHP e Docker

Este é um exemplo simples de um Snippet de Calendário de Eventos dinâmico. O calendário é gerado automaticamente com base no mês e ano atual e exibe eventos armazenados no banco de dados SQLite localizado no diretório `database`. Os eventos são interativos, permitindo que os usuários cliquem em uma data para ver mais detalhes.

## Tecnologias Utilizadas

- Docker
- PHP 8.3
- Nginx
- SQLite
- Bootstrap 5.3
- jQuery

## Como Rodar o Projeto

1. <b>Clone o repositório:</b>

```bash
git clone https://github.com/seu-usuario/snippet-calendario-eventos.git
```

2. <b>Acesse o diretório do projeto:</b>

```bash
cd snippet-calendario-eventos
```

3. <b>Inicie os containers do Docker:</b>

```bash
docker-compose up --build
```

4. <b>Acesse o projeto no navegador:</b>

- Acesse o endereço http://localhost:8080 para visualizar o calendário.
- Acesse http://localhost:3000 para gerenciar o banco de dados SQLite com o SQLite Browser.

## ToDo

O que você pode fazer:

| Tarefa                                                   | Descrição                                                                  |
| -------------------------------------------------------- | -------------------------------------------------------------------------- |
| Usar o autoload do Composer                              | Facilitar o carregamento automático das classes.                           |
| Criar partials views para funcionalidades AJAX           | Modularizar o código para melhorar a manutenção e reutilização.            |
| Refatorar o `index.php`                                  | Melhorar a organização do código principal da aplicação.                   |
| Melhorar a interface do usuário                          | Tornar a UI mais moderna e intuitiva com aprimoramentos visuais.           |
| Criar um botão para navegar entre os meses do calendário | Adicionar navegação para ver meses anteriores e posteriores no calendário. |
