# 🌐 Configuração do ngrok para Webhooks do Mercado Pago

## 📋 Pré-requisitos

- ngrok instalado (já está em `/snap/bin/ngrok`)
- Aplicação Laravel rodando (`php artisan serve`)
- Conta no Mercado Pago Developers

## 🚀 Passo a Passo

### 1. Iniciar a aplicação Laravel

```bash
php artisan serve
```

Aplicação rodará em: `http://127.0.0.1:8000`

### 2. Iniciar o ngrok em outro terminal

```bash
ngrok http 8000
```

Você verá algo assim:

```
ngrok                                                                      

Session Status                online
Account                       seu-email@example.com
Version                       3.x.x
Region                        South America (sa)
Latency                       -
Web Interface                 http://127.0.0.1:4040
Forwarding                    https://abc123.ngrok-free.app -> http://localhost:8000

Connections                   ttl     opn     rt1     rt5     p50     p90
                              0       0       0.00    0.00    0.00    0.00
```

### 3. Copiar a URL do ngrok

Copie a URL HTTPS gerada (ex: `https://abc123.ngrok-free.app`)

### 4. Configurar Webhook no Mercado Pago

1. Acesse: https://www.mercadopago.com.br/developers/panel/app
2. Selecione sua aplicação
3. Vá em **Webhooks** no menu lateral
4. Cole a URL do webhook:
   ```
   https://abc123.ngrok-free.app/webhook/mp
   ```

   **Nota:** Se o campo da URL for muito limitado, use apenas `/webhook/mp` que já está configurado no projeto.
5. Selecione os eventos:
   - ✅ `payment` (pagamentos)
6. Salve

### 5. Testar o Webhook

1. No admin (`http://localhost:8000/admin`), acesse **Boletos**
2. Clique em **Gerar via Mercado Pago** em algum boleto
3. O Mercado Pago enviará notificações para:
   ```
   https://abc123.ngrok-free.app/webhook/mp
   ```

### 6. Monitorar Requisições

Acesse o dashboard do ngrok em: http://127.0.0.1:4040

Você verá todas as requisições HTTP em tempo real, incluindo:
- Headers
- Body
- Response
- Tempo de resposta

### 7. Verificar Logs

No Laravel, verifique os logs em:
```bash
tail -f storage/logs/laravel.log
```

Você verá:
```
[2025-11-27 14:30:00] local.INFO: Mercado Pago Webhook recebido {"type":"payment","data":{"id":"123456"}}
[2025-11-27 14:30:01] local.INFO: Status do boleto atualizado {"boleto_id":1,"status_anterior":"pendente","status_novo":"pago"}
```

## 🔄 Fluxo do Webhook

```
Mercado Pago → ngrok (https://abc123.ngrok-free.app)
                 ↓
              Laravel (localhost:8000/webhook/mp)
                 ↓
          MercadoPagoWebhookController
                 ↓
          Atualiza status do Boleto no banco
```

## ⚙️ Status Mapeados

| Status Mercado Pago | Status no Sistema |
|---------------------|-------------------|
| `approved`          | `pago`            |
| `pending`           | `pendente`        |
| `in_process`        | `pendente`        |
| `rejected`          | `cancelado`       |
| `cancelled`         | `cancelado`       |

## 🛡️ Segurança

⚠️ **Importante para Produção:**

1. Adicionar validação de assinatura do Mercado Pago
2. Validar IP de origem
3. Usar HTTPS (ngrok já fornece)
4. Rate limiting na rota

## 🔧 Troubleshooting

### Webhook não está sendo chamado?

1. Verifique se o ngrok está rodando
2. Verifique se a URL no Mercado Pago está correta
3. Verifique os logs: `tail -f storage/logs/laravel.log`
4. Acesse o dashboard do ngrok: http://127.0.0.1:4040

### Erro CSRF Token?

A rota já está configurada sem CSRF. Se der erro, verifique em `routes/web.php`:
```php
->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
```

### Ngrok expirou?

O ngrok free gera URLs temporárias. Cada vez que reiniciar:
1. Copie a nova URL
2. Atualize no painel do Mercado Pago

## 💡 Dicas

- Mantenha o ngrok rodando enquanto testa
- Use o dashboard do ngrok (http://127.0.0.1:4040) para debug
- Em produção, use domínio real (não precisa ngrok)
- Teste pagamentos no modo Sandbox primeiro

## 🎯 Comandos Úteis

```bash
# Iniciar Laravel
php artisan serve

# Iniciar ngrok (em outro terminal)
ngrok http 8000

# Ver logs em tempo real
tail -f storage/logs/laravel.log

# Limpar cache
php artisan cache:clear
php artisan config:clear
```

