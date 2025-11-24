<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> SíndicoFácil - Economize 8 Horas por Semana na Gestão do Condomínio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 antialiased">

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-purple-800 text-white min-h-screen flex items-center">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-300 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <div class="inline-flex items-center px-4 py-2 bg-green-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-8 border border-green-400/30">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    + de 300 síndicos economizam 8h/semana com o SíndicoFácil
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                    Economize <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">8 Horas</span><br />
                    por Semana na Gestão<br />
                    do Seu Condomínio
                </h1>

                <p class="text-2xl md:text-3xl mb-8 font-light leading-relaxed">
                    Boletos automáticos, chamados organizados e<br />
                    prestação de contas em 1 clique.<br />
                    <strong class="text-yellow-400">Sem planilhas. Sem dor de cabeça.</strong>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                    <a href="#cadastro" class="group relative inline-flex items-center justify-center px-10 py-5 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-blue-900 font-bold text-xl rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-yellow-500/50">
                        COMEÇAR TESTE GRÁTIS (14 DIAS)
                        <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>

                <div class="flex flex-wrap justify-center gap-6 text-sm mb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Sem cartão de crédito</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Configure em menos de 5 minutos</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Cancele quando quiser</strong></span>
                    </div>
                </div>

                <p class="text-sm text-blue-200">
                    ⭐⭐⭐⭐⭐ 4.9/5 - Avaliação média de 300+ síndicos
                </p>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 float-animation">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Prova Social -->
    <section class="py-12 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 max-w-5xl mx-auto text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">300+</div>
                    <div class="text-gray-600">Condomínios ativos</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">8h</div>
                    <div class="text-gray-600">Economizadas por semana</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">94%</div>
                    <div class="text-gray-600">Redução de inadimplência</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">4.9⭐</div>
                    <div class="text-gray-600">Avaliação dos usuários</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dores Específicas -->
    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-red-100 text-red-600 rounded-full text-sm font-semibold mb-4">
                    VOCÊ ESTÁ PERDENDO TEMPO E DINHEIRO
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Reconhece Essas Situações?
                </h2>
                <p class="text-xl text-gray-600">
                    Se você passa por isso todo mês, precisa conhecer o SíndicoFácil
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto">
                <div class="bg-gradient-to-br from-red-50 to-red-100 p-8 rounded-3xl border-l-4 border-red-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center text-2xl">
                            💸
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-900">Inadimplência fora de controle?</h3>
                            <p class="text-gray-700">
                                <strong>Você esquece de cobrar</strong>, moradores "esquecem" de pagar, e o condomínio fica no vermelho.
                                <span class="text-red-600 font-semibold">Resultado: falta dinheiro para manutenção.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-3xl border-l-4 border-orange-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-2xl">
                            📊
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-900">Planilhas viraram bagunça?</h3>
                            <p class="text-gray-700">
                                Você <strong>perde 5+ horas todo mês</strong> atualizando Excel, mas ainda assim cobra valores errados ou perde informações.
                                <span class="text-orange-600 font-semibold">E moradores reclamam.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-8 rounded-3xl border-l-4 border-yellow-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-yellow-600 rounded-xl flex items-center justify-center text-2xl">
                            📱
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-900">Chamados dos moradores perdidos?</h3>
                            <p class="text-gray-700">
                                <strong>WhatsApp lotado</strong>, pedidos no grupo que você não anotou, moradores cobrando resposta.
                                <span class="text-yellow-700 font-semibold">Você parece desorganizado.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-3xl border-l-4 border-purple-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center text-2xl">
                            📄
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-900">Prestação de contas demorada?</h3>
                            <p class="text-gray-700">
                                <strong>Horas preparando relatórios</strong> para assembleia, juntando documentos espalhados,
                                <span class="text-purple-600 font-semibold">e sempre alguém questiona algum número.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-2xl font-bold text-gray-900 mb-4">
                    Se você respondeu SIM para 2 ou mais situações...
                </p>
                <p class="text-xl text-gray-600 mb-8">
                    Você está <strong class="text-red-600">perdendo tempo e dinheiro</strong> que poderiam ser economizados.
                </p>
                <a href="#cadastro" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg rounded-xl shadow-xl transition-all duration-300">
                    Quero Resolver Isso Agora
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Benefícios Concretos -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                    A SOLUÇÃO COMPLETA
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Como o SíndicoFácil Resolve Seus Problemas
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Cada funcionalidade foi pensada para <strong>eliminar trabalho manual</strong> e te dar <strong>mais tempo livre</strong>
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">Boletos Automáticos</h3>
                            <p class="text-gray-600 mb-4">Reduza inadimplência em <strong class="text-green-600">até 94%</strong></p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Gere todos os boletos em 1 clique</strong> - não precisa mais fazer um por um</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Lembrete automático por WhatsApp</strong> 3 dias antes do vencimento</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Dashboard visual:</strong> quem está em dia (verde) ou devendo (vermelho)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Pix integrado:</strong> pagamento instantâneo, baixa automática</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-green-50 rounded-xl border border-green-200">
                        <p class="text-sm text-green-800">
                            <strong>💰 Resultado real:</strong> Síndico João reduziu inadimplência de 23% para 4% em 2 meses
                        </p>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">Central de Chamados</h3>
                            <p class="text-gray-600 mb-4">Nunca mais perca um pedido de morador</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Todos os pedidos em um só lugar</strong> - acabou o WhatsApp perdido</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Status claro:</strong> pendente, em andamento, resolvido</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Histórico completo</strong> por apartamento (útil em assembleias)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Notificação automática</strong> quando você responde</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-200">
                        <p class="text-sm text-blue-800">
                            <strong>⏱️ Economia:</strong> Maria deixou de gastar 3h/semana procurando mensagens no WhatsApp
                        </p>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">Prestação de Contas Instantânea</h3>
                            <p class="text-gray-600 mb-4">Relatório pronto em <strong class="text-purple-600">1 clique</strong></p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Dashboard transparente:</strong> moradores veem onde o dinheiro foi gasto</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Gráficos automáticos</strong> por categoria (luz, água, limpeza...)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Exporta PDF profissional</strong> para assembleia</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Comparativo mensal:</strong> economizou ou gastou mais que o mês anterior?</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-purple-50 rounded-xl border border-purple-200">
                        <p class="text-sm text-purple-800">
                            <strong>📊 Transparência:</strong> 89% dos moradores aprovam a gestão quando veem o dashboard
                        </p>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">Documentos Organizados</h3>
                            <p class="text-gray-600 mb-4">Encontre qualquer documento em <strong class="text-pink-600">5 segundos</strong></p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Tudo em um só lugar:</strong> atas, estatuto, relatórios, contratos</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Busca inteligente</strong> por nome, data ou palavra-chave</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Compartilhe com 1 clique</strong> via WhatsApp ou email</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Backup automático na nuvem</strong> - nunca perca nada</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-pink-50 rounded-xl border border-pink-200">
                        <p class="text-sm text-pink-800">
                            <strong>🔍 Rapidez:</strong> Antes levava 15 minutos para achar um documento, agora leva 10 segundos
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gestão de Entregas -->
    <section class="py-24 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-yellow-400/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-4 border border-yellow-400/30">
                    NOVIDADE - DIFERENCIAL EXCLUSIVO
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Gestão Inteligente de <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">Entregas</span>
                </h2>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                    Acabou a bagunça na portaria. Um sistema moderno, rápido e seguro que os síndicos realmente <strong class="text-yellow-300">AMAM</strong>.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Registro -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📦
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">1. Registro Completo de Entregas</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Foto da encomenda</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Nome do porteiro responsável</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Data e hora automáticas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Morador selecionado</span>
                        </li>
                    </ul>
                </div>

                <!-- Card 2: Notificação -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        🔔
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">2. Notificação Automática ao Morador</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>WhatsApp</strong> instantâneo</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>Notificação</strong> no app</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>E-mail</strong> com detalhes</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-300 mt-1">⚡</span>
                            <span class="text-yellow-300 font-semibold">Morador avisado em segundos!</span>
                        </li>
                    </ul>
                </div>

                <!-- Card 3: Confirmação -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        ✍️
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">3. Confirmação de Retirada</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Assinatura digital do morador</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Ou confirmação pelo porteiro</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Registro de data/hora exatas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-300 mt-1">🛡️</span>
                            <span class="text-yellow-300 font-semibold">Proteção total contra perdas</span>
                        </li>
                    </ul>
                </div>

                <!-- Card 4: Dashboard -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105 md:col-span-2 lg:col-span-2">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📊
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">4. Dashboard do Síndico</h3>
                    <p class="text-yellow-300 font-semibold mb-4 text-sm sm:text-base">⭐ Isso o síndico AMA!</p>
                    <div class="grid sm:grid-cols-2 gap-3 text-sm sm:text-base text-blue-100">
                        <div class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>Entregas por dia</strong> em gráficos</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>Pendentes</strong> em tempo real</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>Atrasadas</strong> com alertas</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>Top moradores</strong> que nunca retiram</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>SLA da portaria</strong> (eficiência)</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-yellow-300 mt-1">📈</span>
                            <span class="text-yellow-300 font-semibold">Visibilidade total!</span>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Relatório -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105 lg:col-span-1">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-rose-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📄
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">5. Relatório Mensal</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span><strong>PDF automático</strong> com tudo</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Estatísticas completas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-green-400 mt-1">✓</span>
                            <span>Pronto para assembleias</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-300 mt-1">💼</span>
                            <span class="text-yellow-300 font-semibold">Ajuda na venda!</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- CTA da seção -->
            <div class="text-center mt-12">
                <div class="bg-yellow-400/20 backdrop-blur-sm border border-yellow-400/30 rounded-2xl p-6 sm:p-8 max-w-3xl mx-auto">
                    <p class="text-lg sm:text-xl mb-4">
                        <strong class="text-yellow-300">EXCLUSIVO:</strong> Poucos sistemas no Brasil têm isso. Diferencial competitivo enorme!
                    </p>
                    <a href="#cadastro" class="inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-5 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-blue-900 font-bold text-lg sm:text-xl rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105">
                        TESTAR GESTÃO DE ENTREGAS GRÁTIS
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Depoimentos -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">
                    DEPOIMENTOS REAIS
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Veja O Que Síndicos Estão Dizendo
                </h2>
                <p class="text-xl text-gray-600">
                    Mais de 300 síndicos já economizam horas todo mês
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border border-blue-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            JM
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">João Martins</div>
                            <div class="text-sm text-gray-600">Síndico há 3 anos, 28 unidades</div>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 italic mb-4">
                        "Antes eu gastava <strong>5 horas por mês só com cobrança</strong>.
                        Agora é automático. A inadimplência caiu de 18% para 3%. Vale cada centavo!"
                    </p>
                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Economizou 5h/mês
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-3xl border border-purple-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            AP
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Ana Paula</div>
                            <div class="text-sm text-gray-600">Condomínio de 15 casas</div>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 italic mb-4">
                        "Finalmente os moradores param de me questionar.
                        <strong>O relatório fica público</strong> e todo mundo vê onde vai o dinheiro. Transparência total!"
                    </p>
                    <div class="text-sm text-green-600 font-semibold">
                        ✓ 100% de aprovação nas assembleias
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl border border-green-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            RL
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Roberto Lima</div>
                            <div class="text-sm text-gray-600">Síndico profissional, 4 prédios</div>
                        </div>
                    </div>
                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 italic mb-4">
                        "Sou síndico de 4 prédios. <strong>Esse sistema me salvou.</strong>
                        Interface é tão simples que até minha mãe usaria. Melhor custo-benefício."
                    </p>
                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Gerencia 4 condomínios facilmente
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparação -->
    <section class="py-24 bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-semibold mb-4 border border-white/20">
                    POR QUE ESCOLHER O SÍNDICOFÁCIL?
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Veja a Diferença
                </h2>
                <p class="text-xl text-blue-100">
                    Compare nosso sistema com as principais opções do mercado
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl border border-white/20 overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead>
                            <tr class="border-b border-white/20">
                                <th class="p-3 sm:p-6 text-left"></th>
                                <th class="p-3 sm:p-6 text-center bg-yellow-500/20">
                                    <div class="font-bold text-base sm:text-xl">SíndicoFácil</div>
                                    <div class="text-xs sm:text-sm text-yellow-300">✨ Nossa solução</div>
                                </th>
                                <th class="p-3 sm:p-6 text-center">
                                    <div class="text-sm sm:text-base text-gray-300">Outros Sistemas</div>
                                    <div class="text-xs text-gray-400">(Superlógica, TownSq, etc.)</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Mensalidade</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-lg sm:text-2xl font-bold text-yellow-400">R$ 79–179</div>
                                    <div class="text-xs text-gray-300">por condomínio</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-base sm:text-xl text-red-300">R$ 200–500+</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Tempo de configuração</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-green-400 font-bold text-sm sm:text-base">5 minutos</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-red-300 text-sm sm:text-base">2–3 dias</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Facilidade de uso</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-green-400 text-xs sm:text-base">✓ Interface simples e intuitiva</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-red-300 text-xs sm:text-base">✗ Exige treinamento</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Suporte</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-green-400 text-xs sm:text-base">✓ Suporte rápido via WhatsApp</div>
                                    <div class="text-xs text-gray-300">Resposta em menos de 2 horas</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-red-300 text-xs sm:text-base">✗ Atendimento apenas por e-mail</div>
                                    <div class="text-xs text-gray-400">Demora de vários dias</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Teste grátis</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-green-400 font-bold text-sm sm:text-base">14 dias</div>
                                    <div class="text-xs text-gray-300">Sem cartão de crédito</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-red-300 text-sm sm:text-base">7 dias</div>
                                    <div class="text-xs text-gray-400">Cartão obrigatório</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3 sm:p-6 text-sm sm:text-base">Contrato</td>
                                <td class="p-3 sm:p-6 text-center bg-yellow-500/10">
                                    <div class="text-green-400 text-xs sm:text-base">✓ Cancele quando quiser</div>
                                </td>
                                <td class="p-3 sm:p-6 text-center">
                                    <div class="text-red-300 text-xs sm:text-base">✗ Fidelidade mínima de 12 meses</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-12">
                    <a href="#cadastro" class="inline-flex items-center justify-center px-10 py-5 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-blue-900 font-bold text-xl rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105">
                        COMEÇAR TESTE GRÁTIS AGORA
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Segurança / LGPD -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <span class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold mb-4">
                    SEUS DADOS ESTÃO PROTEGIDOS
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Segurança e Conformidade
                </h2>
                <p class="text-xl text-gray-600">
                    Priorizamos a proteção das informações do seu condomínio
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="text-center p-8">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">100% Conforme LGPD</h3>
                    <p class="text-gray-600">
                        Sistema totalmente aderente à Lei Geral de Proteção de Dados, com armazenamento criptografado no Brasil.
                    </p>
                </div>

                <div class="text-center p-8">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">Backup Automático</h3>
                    <p class="text-gray-600">
                        Seus dados são armazenados automaticamente a cada 6 horas — sem risco de perda.
                    </p>
                </div>

                <div class="text-center p-8">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">Criptografia SSL</h3>
                    <p class="text-gray-600">
                        Segurança de nível bancário com criptografia SSL 256-bit, protegendo todo o tráfego de dados.
                    </p>
                </div>
            </div>

            <div class="max-w-3xl mx-auto mt-12 p-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-3xl border border-blue-200">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Criado por especialistas em condomínios</h4>
                        <p class="text-gray-700">
                            Nossa equipe é formada por ex-síndicos e administradores com mais de 10 anos de experiência real no setor.
                            Entendemos suas dores porque já estivemos no seu lugar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preços -->
    <section class="py-24 bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 right-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-semibold mb-4 border border-white/20">
                    PREÇOS TRANSPARENTES
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Planos Para Condomínios de Todos os Tamanhos
                </h2>
                <p class="text-xl text-blue-100">
                    Sem surpresas. Sem taxas escondidas. Cancele quando quiser.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                    <h3 class="text-2xl font-bold mb-2">BÁSICO</h3>
                    <div class="mb-6">
                        <span class="text-5xl font-bold">R$ 79</span>
                        <span class="text-blue-200">/mês</span>
                    </div>
                    <p class="text-blue-100 mb-6">Perfeito para condomínios pequenos</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Até <strong>20 unidades</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Boletos automáticos</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Controle financeiro</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Suporte essencial</span>
                        </li>
                    </ul>
                    <a href="#cadastro" class="block text-center bg-white/20 hover:bg-white/30 font-bold py-4 rounded-xl transition duration-300 border border-white/30">
                        TESTAR GRÁTIS 14 DIAS
                    </a>
                </div>

                <div class="relative bg-gradient-to-br from-yellow-400 to-orange-500 p-8 rounded-3xl shadow-2xl transform scale-105 border-4 border-yellow-300">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-bold px-6 py-2 rounded-full shadow-lg">
                        MAIS POPULAR
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">STANDARD</h3>
                    <div class="mb-6 text-gray-900">
                        <span class="text-5xl font-bold">R$ 119</span>
                        <span class="text-gray-800">/mês</span>
                    </div>
                    <p class="text-gray-800 mb-6 font-semibold">Ideal para a maioria dos condomínios</p>
                    <ul class="space-y-4 mb-8 text-gray-900">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Até <strong>50 unidades</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Tudo do Básico +</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Central de chamados</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Assembleias e atas</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>WhatsApp automático</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>📦 Módulo de Entregas</strong> incluso</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Painel da Portaria</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Comunicados ilimitados</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Suporte WhatsApp</strong> (comercial)</span>
                        </li>
                    </ul>
                    <a href="#cadastro" class="block text-center bg-gray-900 hover:bg-gray-800 text-white font-bold py-4 rounded-xl transition duration-300 shadow-lg">
                        TESTAR GRÁTIS 14 DIAS
                    </a>
                </div>

                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                    <h3 class="text-2xl font-bold mb-2">PRO</h3>
                    <div class="mb-6">
                        <span class="text-5xl font-bold">R$ 179</span>
                        <span class="text-blue-200">/mês</span>
                    </div>
                    <p class="text-blue-100 mb-6">Para síndicos profissionais</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Unidades ilimitadas</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Tudo do Standard +</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Múltiplos condomínios</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>🎓 Treinamento completo</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>📊 Relatórios avançados</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Onboarding assistido</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>👑 Atendimento VIP</strong> exclusivo</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>⚡ SLA de suporte</strong> garantido</span>
                        </li>
                    </ul>
                    <a href="#cadastro" class="block text-center bg-white/20 hover:bg-white/30 font-bold py-4 rounded-xl transition duration-300 border border-white/30">
                        FALAR COM VENDAS
                    </a>
                </div>
            </div>

            <div class="text-center mt-12 space-y-3">
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>14 dias grátis</strong>, sem cartão de crédito</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Cancele quando quiser</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Migração gratuita</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulário de Cadastro -->
    <section id="cadastro" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <span class="inline-block px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold mb-4">
                        RISCO ZERO
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
                        Comece Grátis em Menos de 2 Minutos
                    </h2>
                    <p class="text-xl text-gray-600 mb-2">
                        Teste por 14 dias sem pagar nada
                    </p>
                    <p class="text-lg text-gray-500">
                        ✓ Sem cartão de crédito ✓ Sem compromisso ✓ Cancele quando quiser
                    </p>
                </div>

                @if(session('success'))
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6 mb-8 rounded-2xl shadow-lg flex items-start gap-4">
                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="font-bold text-lg mb-1">Cadastro realizado com sucesso!</h3>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <form action="{{ route('contato.store') }}" method="POST" class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nome" class="block text-gray-800 font-bold mb-2 text-sm uppercase tracking-wide">Nome completo *</label>
                            <input type="text" id="nome" name="nome" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="João Silva"
                                value="{{ old('nome') }}">
                            @error('nome')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-gray-800 font-bold mb-2 text-sm uppercase tracking-wide">Email *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="joao@email.com"
                                value="{{ old('email') }}">
                            @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="whatsapp" class="block text-gray-800 font-bold mb-2 text-sm uppercase tracking-wide">WhatsApp *</label>
                            <input type="tel" id="whatsapp" name="whatsapp" required
                                placeholder="(11) 99999-9999"
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                value="{{ old('whatsapp') }}">
                            @error('whatsapp')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="unidades" class="block text-gray-800 font-bold mb-2 text-sm uppercase tracking-wide">Quantas unidades? (Apts/Casas)</label>
                            <input type="number" id="unidades" name="unidades" min="1"
                                placeholder="Ex: 25 apartamentos"
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                value="{{ old('unidades') }}">
                            <p class="text-xs text-gray-500 mt-1">Número total de apartamentos ou casas do condomínio</p>
                            @error('unidades')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-800 font-bold mb-3 text-sm uppercase tracking-wide">Você é: *</label>
                        <div class="grid md:grid-cols-3 gap-4">
                            <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                <input type="radio" name="tipo" value="morador" required class="mr-3 w-5 h-5 text-blue-600"
                                    {{ old('tipo') == 'morador' ? 'checked' : '' }}>
                                <span class="font-medium text-gray-700">Síndico morador</span>
                            </label>
                            <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                <input type="radio" name="tipo" value="profissional" required class="mr-3 w-5 h-5 text-blue-600"
                                    {{ old('tipo') == 'profissional' ? 'checked' : '' }}>
                                <span class="font-medium text-gray-700">Síndico profissional</span>
                            </label>
                            <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                                <input type="radio" name="tipo" value="administradora" required class="mr-3 w-5 h-5 text-blue-600"
                                    {{ old('tipo') == 'administradora' ? 'checked' : '' }}>
                                <span class="font-medium text-gray-700">Administradora</span>
                            </label>
                        </div>
                        @error('tipo')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="mensagem" class="block text-gray-800 font-bold mb-2 text-sm uppercase tracking-wide">Qual sua maior dificuldade hoje? (opcional)</label>
                        <textarea id="mensagem" name="mensagem" rows="4"
                            placeholder="Ex: Perco muito tempo com cobrança manual, moradores reclamam de falta de transparência..."
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none">{{ old('mensagem') }}</textarea>
                        @error('mensagem')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold text-xl py-5 rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-blue-500/50 flex items-center justify-center gap-2">
                        <span>COMEÇAR TESTE GRÁTIS (14 DIAS)</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>

                    <p class="text-center text-sm text-gray-500 mt-6 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        Seus dados estão 100% seguros | Proteção LGPD
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-2">SíndicoFácil</h3>
                <p class="text-gray-400 mb-6">O sistema que economiza 8 horas por semana na gestão do seu condomínio</p>
                <div class="flex justify-center gap-8 text-sm text-gray-400 mb-6">
                    <span>&copy; 2025 SíndicoFácil</span>
                    <span>•</span>
                    <span>CNPJ: 50.323.616/0001-71</span>
                    <span>•</span>
                    <span>Todos os direitos reservados</span>
                </div>
                <p class="text-xs text-gray-500">
                    Feito com ❤️ por quem entende de condomínio
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
