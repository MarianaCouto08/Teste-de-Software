# ACME Digital - Sistema de Autenticação

![ACME Digital](https://img.shields.io/badge/Status-Ativo-brightgreen?style=flat-square)
![Versão](https://img.shields.io/badge/Versão-1.0.0-blue?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-blueviolet?style=flat-square)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange?style=flat-square)

## Descrição do Projeto

ACME Digital é um sistema completo de autenticação e controle de usuários desenvolvido com PHP, MySQL e tecnologias web modernas. O sistema oferece uma experiência elegante e responsiva com um design baseado em gradientes rosa claro e efeitos glassmorphism.

### Desenvolvido por:
- **Mariana Couto**
- **Manuela Catarina**

---

## Recursos Principais

 **Autenticação Segura**
- Sistema de login com criptografia de senha (bcrypt)
- Sessões seguras com validação de token
- Proteção contra acesso não autorizado

 **Design Moderno**
- Interface elegante com gradientes rosa claro
- Efeito glassmorphism nos cards
- Animações suaves e transições
- Design totalmente responsivo (desktop, tablet, mobile)

 **Validação de Dados**
- Validação em tempo real nos formulários
- Mensagens de erro visuais e amigáveis
- Verificação de força de senha
- Validação de email único

 **Responsividade**
- Mobile-first approach
- Adaptável para todos os tamanhos de tela
- Interface otimizada para touch

 **Performance**
- CSS otimizado
- JavaScript vanilla (sem dependências pesadas)
- Carregamento rápido

---

## Funcionalidades

### 1. **Registro de Usuários**
- Criação de nova conta com validações
- Verificação de email duplicado
- Requisitos de senha mínimos (6 caracteres)
- Confirmação de senha

### 2. **Login**
- Autenticação segura com email e senha
- Mensagens de erro personalizadas
- Redirecionamento automático após login
- Proteção de sessão

### 3. **Dashboard**
- Página de boas-vindas personalizada
- Exibição do nome do usuário
- Botão de logout seguro
- Design minimalista e limpo

### 4. **Segurança**
- Criptografia de senha com PHP's password_hash()
- Prepared statements para evitar SQL injection
- Validação de entrada em servidor e cliente
- Sessões seguras

---

## Estrutura do Projeto

```
acme-digital/
├── index.php              # Dashboard do usuário logado
├── login.php              # Página de login
├── cadastro.php           # Página de cadastro
├── logout.php             # Script de logout
├── process_login.php      # Processamento de login
├── process_register.php   # Processamento de cadastro
├── test_connection.php    # Teste de conexão com BD
├── database.sql           # Script de criação do BD
│
├── config/
│   └── database.php       # Configurações de conexão
│
├── assets/
│   ├── css/
│   │   ├── style.css      # Estilos gerais
│   │   └── dashboard.css  # Estilos do dashboard
│   ├── js/
│   │   └── script.js      # Scripts JavaScript
│   └── screenshots/       # Capturas de tela
│
└── tests/                 # Testes futuros
```

---

## Requisitos do Sistema

### Software Necessário
- **PHP**: 7.4 ou superior
- **MySQL/MariaDB**: 5.7 ou superior
- **Servidor Web**: Apache (com mod_rewrite)
- **Navegador**: Chrome, Firefox, Safari, Edge (versões recentes)

### Dependências
Nenhuma dependência externa! O projeto usa apenas:
- PHP nativo
- MySQL nativo
- HTML5
- CSS3
- JavaScript vanilla

---

## Instalação

### Passo 1: Preparar o Ambiente

```bash
# Clone ou copie os arquivos para o diretório web
cd c:\xampp\htdocs\acme-digital
```

### Passo 2: Criar o Banco de Dados

1. Abra o phpMyAdmin: `http://localhost/phpmyadmin`
2. Crie um novo banco de dados chamado `acme_digital`
3. Selecione o banco e vá em **SQL**
4. Copie e cole o conteúdo de `database.sql`
5. Execute

**Ou via terminal:**
```bash
mysql -u root < database.sql
```

### Passo 3: Configurar Credenciais

Edite o arquivo `config/database.php`:

```php
define('DB_HOST', 'localhost');    // Host do MySQL
define('DB_USER', 'root');         // Usuário do MySQL
define('DB_PASS', '');             // Senha (deixe vazio se não tiver)
define('DB_NAME', 'acme_digital'); // Nome do banco
```

### Passo 4: Testar a Conexão

Acesse: `http://localhost/acme-digital/test_connection.php`

Se tudo estiver correto, você verá:
-  Conexão bem-sucedida!
-  Tabela 'users' encontrada!
- Total de usuários cadastrados

### Passo 5: Acessar o Sistema

Abra: `http://localhost/acme-digital/`

---

## Como Usar

### 1. **Criar uma Conta**

```
1. Clique em "Cadastre-se aqui" na página de login
2. Preencha o formulário com:
   - Usuário (qualquer nome)
   - Email (deve ser único)
   - Senha (mínimo 6 caracteres)
   - Confirmação de senha
3. Clique em "Cadastrar"
4. Você será redirecionado para login
```

### 2. **Fazer Login**

```
1. Digite seu email e senha
2. Clique em "Entrar"
3. Você será redirecionado para o dashboard
```

### 3. **Dashboard**

```
1. Você verá a mensagem "Bom dia, [seu nome]!"
2. Clique em "Fazer Logout" para sair
3. Você será redirecionado para login
```

---

## Banco de Dados

### Tabela: users

```sql
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

**Campos:**
- `id`: Identificador único do usuário
- `username`: Nome de usuário (único)
- `email`: Email (único e validado)
- `password`: Senha criptografada (bcrypt)
- `created_at`: Data de criação
- `updated_at`: Data de última atualização

---

## Validações

### Cliente (JavaScript)
- Verificação de campos obrigatórios
- Mensagens de erro visuais em tempo real
- Animação de erro (tremida)
- Limpeza de erro ao focar no campo

### Servidor (PHP)
- Validação de campos vazios
- Verificação de email único
- Requisito de força de senha (6+ caracteres)
- Correspondência de senhas
- Validação de email (formato)
- Proteção contra SQL injection (prepared statements)

---

## Segurança

### Implementado

 **Autenticação Segura**
- Criptografia bcrypt das senhas
- Comparação segura com `password_verify()`

 **Proteção de Sessão**
- Session start em todas as páginas
- Verificação de autenticação
- Regeneração de ID de sessão (recomendado adicionar)

 **Validação de Entrada**
- Prepared statements (evita SQL injection)
- trim() e htmlspecialchars() para output
- Validação de tipo de dado

 **Proteção CSRF** (Recomendado implementar)
- Adicionar tokens CSRF em formulários

---

## Estilo e Design

### Paleta de Cores

```css
/* Gradiente Rosa Claro */
Background: linear-gradient(135deg, #ffc0e3 0%, #ffb3d9 100%)

/* Rosa Principal */
Primary: #ff7fa0
Primary Dark: #ff6b8f

/* Efeitos */
Glassmorphism: backdrop-filter: blur(10px)
Sombras: rgba(255, 127, 160, 0.3)
```

### Tipografia
- Font Family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
- Tamanhos: 14px (pequeno) até 48px (título)
- Pesos: 500 (regular), 600 (semi-bold), 700 (bold)

### Animações
- Transições suaves: 0.3s ease
- Slide up: 0.6s ease-out
- Shake: 0.3s ease-in-out (erro)

---

## Troubleshooting

### Erro: "Erro ao conectar ao banco de dados"

**Solução:**
1. Verifique se MySQL está rodando
2. Confirme as credenciais em `config/database.php`
3. Verifique se o banco `acme_digital` existe
4. Execute o arquivo `database.sql`

### Erro: "Tabela 'users' não encontrada"

**Solução:**
1. Acesse phpMyAdmin
2. Selecione o banco `acme_digital`
3. Vá em SQL
4. Cole o conteúdo de `database.sql`
5. Execute

### Email ou senha incorretos (mesmo com dados corretos)

**Solução:**
1. Verifique se está usando o email correto (case-sensitive)
2. Teste a conexão em `test_connection.php`
3. Verifique o console de erros PHP

### Página em branco

**Solução:**
1. Verifique logs de erro do PHP: `C:\xampp\apache\logs\error.log`
2. Ative display_errors em `php.ini`
3. Verifique permissões de arquivo

---

## Desenvolvimento Futuro

 **Melhorias Planejadas**

- [ ] Recuperação de senha via email
- [ ] Autenticação de dois fatores (2FA)
- [ ] Integração com OAuth (Google, GitHub)
- [ ] Perfil de usuário editável
- [ ] Sistema de permissões (roles)
- [ ] Histórico de login
- [ ] Notificações por email
- [ ] API REST
- [ ] Testes automatizados
- [ ] Documentação de API

---

## Contribuindo

Este é um projeto acadêmico desenvolvido por:
- **Mariana Couto**
- **Manuela Catarina**

Para contribuir ou reportar bugs, entre em contato com os desenvolvedores.

---

## Licença

Este projeto é fornecido como é, para fins educacionais.

---

## Suporte

### Dúvidas Frequentes (FAQ)

**P: Como altero a cor do tema?**
R: Edite os arquivos `assets/css/style.css` e `assets/css/dashboard.css` e procure por valores de cor como `#ffc0e3`.

**P: Posso usar em produção?**
R: Recomenda-se implementar validações adicionais, HTTPS, e outras medidas de segurança antes de usar em produção.

**P: Como adiciono novos campos ao cadastro?**
R: Altere `cadastro.php`, `process_register.php`, e a estrutura da tabela `users` em `database.sql`.

**P: É possível integrar com outras ferramentas?**
R: Sim! O sistema pode ser estendido com APIs e integrações. Consulte os desenvolvedores para orientações.

---

## Histórico de Versões

### v1.0.0 (Atual)
- Sistema completo de autenticação
- Design responsivo com tema rosa claro
- Validação de dados
- Banco de dados MySQL
- Dashboard minimalista

---

## Contato

**Desenvolvedoras:**
- Mariana Couto
- Manuela Catarina

**Email:** acmedigital@example.com

---

## Changelog

### 24 de Agosto de 2026
- Criação do projeto ACME Digital
- Implementação de login e cadastro
- Design com tema rosa claro
- Sistema de validação completo
- Documentação README

---

## Agradecimentos

Obrigado por usar o ACME Digital! 

Este projeto foi desenvolvido com dedicação e atenção aos detalhes para proporcionar uma experiência de usuário excepcional.

---

**ACME Digital © 2026 - Desenvolvido por Mariana Couto e Manuela Catarina**
