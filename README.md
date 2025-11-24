# SíndicoFácil - Landing Page

Landing page de validação para SaaS de gestão de condomínios.

## 🚀 Stack Técnica

- **Laravel 12** - Framework PHP
- **Tailwind CSS v4** - Design responsivo e moderno
- **SQLite** - Banco de dados (já configurado)
- **Vite** - Build tool

## 📦 Instalação

O projeto já está configurado! Para rodar novamente:

```bash
cd /home/lucas/projetos/sindico-saas

# Instalar dependências (se necessário)
composer install
npm install

# Compilar assets
npm run build

# Rodar migrations
php artisan migrate

# Iniciar servidor
php artisan serve
```

## 🌐 Acessar

Servidor rodando em: **http://localhost:8000**

## 📊 Funcionalidades Implementadas

✅ Landing page completa com 6 seções:
- Hero (chamada para ação)
- Problemas (dores do síndico)
- Soluções (features)
- Como funciona (3 passos)
- Preços (3 planos)
- Formulário de cadastro

✅ Backend funcional:
- Captura de leads no banco de dados
- Validação de formulário
- Mensagem de sucesso
- Campos: nome, email, whatsapp, unidades, tipo, mensagem

## 🗄️ Visualizar Leads Cadastrados

```bash
# Via tinker (CLI interativo)
php artisan tinker
>>> Lead::all();

# Ou direto no SQLite
sqlite3 database/database.sqlite
> SELECT * FROM leads;
```

## 🎨 Customizar

### Mudar cores/texto:
Edite: `resources/views/landing.blade.php`

### Mudar campos do formulário:
1. Edite o HTML em `landing.blade.php`
2. Ajuste validação em `LandingController.php`
3. Adicione campos na migration e rode `php artisan migrate:fresh`

### Compilar após mudanças:
```bash
# Development (watch mode)
npm run dev

# Production (minificado)
npm run build
```

## 📈 Validação

### Meta de validação (30 dias):
- [ ] 30+ cadastros
- [ ] 5+ demos agendadas
- [ ] 2+ pessoas querendo pagar

## 📞 Contato

Criado para validação do SaaS SíndicoFácil.
**Data de criação:** 24/11/2025
