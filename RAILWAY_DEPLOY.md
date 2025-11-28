# Deploy no Railway - Síndico SaaS

## Credenciais de Teste

Após o deploy, use estas credenciais para acessar o painel admin:

**Admin/Super Admin:**
- Email: `admin@sindico.com`
- Senha: `admin123`

**Síndico (exemplo):**
- Email: `sindico@exemplo.com`
- Senha: `password`

**Morador (exemplo):**
- Email: `maria@exemplo.com`
- Senha: `password`

## Configuração no Railway

### 1. Variáveis de Ambiente Obrigatórias

Configure estas variáveis no Railway Dashboard:

```env
APP_NAME=SíndicoFácil
APP_ENV=production
APP_KEY=base64:GERE_UMA_CHAVE_AQUI
APP_DEBUG=false
APP_URL=https://seu-dominio.railway.app

DB_CONNECTION=sqlite

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

LOG_LEVEL=error
```

### 2. Gerar APP_KEY

Se você ainda não tem uma APP_KEY, rode localmente:

```bash
php artisan key:generate --show
```

Copie a chave gerada e adicione no Railway.

### 3. Domínio

Após o deploy, o Railway vai gerar um domínio automaticamente. Atualize a variável `APP_URL` com o domínio gerado (exemplo: `https://sindico-saas-production.up.railway.app`).

### 4. Build e Deploy

O Railway vai automaticamente:
1. Instalar dependências PHP via Composer
2. Instalar dependências Node.js via npm
3. Fazer build dos assets (CSS/JS) com Vite
4. Rodar migrações do banco de dados
5. Popular o banco com dados de exemplo (seeders)
6. Criar o usuário admin automático
7. Iniciar o servidor

## Problemas Comuns

### CSS não carrega

Certifique-se que:
1. `APP_URL` está configurado com o domínio correto do Railway (com https://)
2. O build dos assets foi executado (verifica nos logs do deploy)

### Login não funciona

1. Verifique se o seeder rodou (procure por "Database seeding completed successfully" nos logs)
2. Use as credenciais: `admin@sindico.com` / `admin123`
3. Se ainda não funcionar, rode manualmente via Railway CLI:
   ```bash
   railway run php artisan db:seed --class=AdminSeeder
   ```

### Banco de dados vazio

Se precisar resetar o banco:
```bash
railway run php artisan migrate:fresh --seed
```

## Estrutura do Projeto

- **Dockerfile**: Configuração do container
- **database/seeders/AdminSeeder.php**: Cria usuário admin fixo
- **database/seeders/DatabaseSeeder.php**: Orquestra todos os seeders

## Próximos Passos

Após o deploy estar funcionando:

1. Trocar senha do admin
2. Configurar email (SMTP)
3. Configurar MercadoPago (se necessário)
4. Adicionar domínio customizado
5. Habilitar backups do banco de dados
