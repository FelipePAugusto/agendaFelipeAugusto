# agendaFelipeAugusto
Sistema de Agenda - Possibilita efetuar o cadastro de Contatos e vincular Mensagens a estes Contatos
# Exigencias para Testar
        git clone https://github.com/FelipePAugusto/agendaFelipeAugusto.git
        
        http://127.0.0.1:8080/phpmyadmin
        
        Criar banco com o nome: agendaFelipeAugusto
        
        php artisan migrate
        php artisan db:seed
# Usar os seguintes URL's para testar a API RESTful
        GET    - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos
        POST   - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/salvar
        PUT    - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/atualizar/2
        DELETE - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/deletar/4
        
        GET    - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/listar/3
        POST   - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/adicionar/1
        PUT    - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/modificar/5/10
        DELETE - http://127.0.0.1:8080/agendaFelipeAugusto/public/api/contatos/mensagem/excluir/12
