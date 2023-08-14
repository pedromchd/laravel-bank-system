# Trabalho de Laravel - Sistema Bancário

## Descrição

Desenvolver um sistema bancário utilizando o framework Laravel. O sistema terá as seguintes funcionalidades:

- Cadastro de usuários com geração aleatória de número de conta, nome de usuário e nome.
- Depósito inicial na conta durante o cadastro, incluindo nome do cliente e senha.
- Autenticação de usuários através de login e senha.
- Armazenamento das datas de login e logout de cada usuário em uma tabela de Auditoria.
- Funcionalidades de EXTRATO, PAGAMENTOS e TRANSFERÊNCIAS.

## Funcionalidades Detalhadas

### EXTRATO

- Detalhamento de compras via débito, transferências, boletos e crédito (salário, transferências, etc.).
- Armazenamento da data de cada transação.
- Descrição curta para cada transação (ex: resgate poup., pag. boleto, pag pix, etc.).

### Limites e Taxas

- Cada cliente tem um limite de R$ 1000,00.
- Se o cliente usar o limite, será aplicada uma taxa de 1% para cada transação no limite.
- Aviso ao usuário ao usar o limite.
- Se o valor utilizado for maior que o limite considerando as taxas, não haverá saldo disponível para transações de débito.

### PAGAMENTOS

- Opções para pagamento via pix, boletos e débito (no sistema, não há diferença entre eles).
- Dedução do valor pago do saldo do cliente.
- Cadastro e validação de chave (CPF, celular ou e-mail) para pagamento via pix.
- Mostrar o nome do usuário da chave destino.

### TRANSFERÊNCIA

- Transferência de quantia para uma conta destino.
- Dedução do valor transferido do saldo do cliente.
- Adição do valor transferido ao saldo da conta destino.

## Organização Sugerida

- Um aluno responsável pela interface (telas).
- Um aluno responsável pelo desenvolvimento do Banco de Dados e ajustes no controller.
- Um aluno responsável pelo desenvolvimento do controller, rotas e validação.

## Entrega

A entrega do trabalho deve ser feita até o dia **5 de junho**.

### Observações

Lembre-se de analisar e tratar todas as possíveis inconsistências, como compras sem saldo, transferências inválidas, entre outras.

Esperamos que vocês realizem um bom trabalho! Abraços!
