<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Lead</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7fafc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 30px;
        }
        .badge {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .info-grid {
            background: #f9fafb;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .info-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .info-value {
            color: #111827;
            font-size: 16px;
        }
        .tipo-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }
        .tipo-morador {
            background: #dbeafe;
            color: #1e40af;
        }
        .tipo-profissional {
            background: #dcfce7;
            color: #166534;
        }
        .tipo-administradora {
            background: #fce7f3;
            color: #9f1239;
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎯 Novo Lead Cadastrado!</h1>
        </div>

        <div class="content">
            <span class="badge">NOVO CADASTRO</span>

            <p style="font-size: 16px; margin-bottom: 20px;">
                Um novo síndico se cadastrou na landing page do <strong>SíndicoFácil</strong>!
            </p>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">👤 Nome</div>
                    <div class="info-value">{{ $lead->nome }}</div>
                </div>

                <div class="info-item">
                    <div class="info-label">📧 Email</div>
                    <div class="info-value">
                        <a href="mailto:{{ $lead->email }}" style="color: #2563eb; text-decoration: none;">
                            {{ $lead->email }}
                        </a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-label">📱 WhatsApp</div>
                    <div class="info-value">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp) }}"
                           style="color: #25D366; text-decoration: none;">
                            {{ $lead->whatsapp }}
                        </a>
                    </div>
                </div>

                @if($lead->unidades)
                <div class="info-item">
                    <div class="info-label">🏢 Unidades</div>
                    <div class="info-value">{{ $lead->unidades }} apartamentos/casas</div>
                </div>
                @endif

                <div class="info-item">
                    <div class="info-label">🎭 Tipo</div>
                    <div class="info-value">
                        @if($lead->tipo == 'morador')
                            <span class="tipo-badge tipo-morador">Síndico Morador</span>
                        @elseif($lead->tipo == 'profissional')
                            <span class="tipo-badge tipo-profissional">Síndico Profissional</span>
                        @else
                            <span class="tipo-badge tipo-administradora">Administradora</span>
                        @endif
                    </div>
                </div>

                @if($lead->mensagem)
                <div class="info-item">
                    <div class="info-label">💬 Mensagem</div>
                    <div class="info-value" style="font-style: italic; color: #4b5563;">
                        "{{ $lead->mensagem }}"
                    </div>
                </div>
                @endif

                <div class="info-item">
                    <div class="info-label">🕐 Data/Hora</div>
                    <div class="info-value">{{ $lead->created_at->format('d/m/Y \à\s H:i') }}</div>
                </div>
            </div>

            <center>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp) }}"
                   class="cta-button">
                    💬 Responder no WhatsApp
                </a>
            </center>

            <p style="font-size: 14px; color: #6b7280; margin-top: 30px;">
                <strong>💡 Próximos passos:</strong><br>
                1. Entre em contato em até 1 hora (lead quente!)<br>
                2. Faça perguntas sobre as dores dele como síndico<br>
                3. Ofereça uma demo rápida de 15 minutos
            </p>
        </div>

        <div class="footer">
            <p style="margin: 0;">
                Email automático do sistema SíndicoFácil<br>
                Recebido em {{ now()->format('d/m/Y \à\s H:i:s') }}
            </p>
        </div>
    </div>
</body>
</html>
