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

                <!-- BADGE -->
                <div class="inline-flex items-center px-4 py-2 bg-green-500/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-8 border border-green-400/30">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    Estamos abrindo acesso antecipado para síndicos selecionados
                </div>

                <!-- TÍTULO -->
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                    SíndicoFácil: <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">Economize até 8h por semana</span><br />
                    e Reduza Inadimplência do Condomínio
                </h1>

                <!-- SUBTÍTULO -->
                <p class="text-2xl md:text-3xl mb-8 font-light leading-relaxed">
                    Centralize boletos, chamados, comunicação e gestão financeira<br />
                    em um único painel fácil de usar<br />
                    <strong class="text-yellow-400">Participe do acesso antecipado.</strong>
                </p>

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                    <a href="#cadastro" class="group relative inline-flex items-center justify-center px-10 py-5 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-blue-900 font-bold text-xl rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-yellow-500/50">
                        TESTAR GRATUITAMENTE 14 DIAS
                        <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>

                <!-- SELLOS -->
                <div class="flex flex-wrap justify-center gap-6 text-sm mb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Acesso antecipado gratuito</strong></span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Você ajuda a construir o produto</strong></span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><strong>Prioridade no lançamento oficial</strong></span>
                    </div>
                </div>

                <p class="text-sm text-blue-200">
                    💡 Seja um dos primeiros a testar — vagas limitadas
                </p>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 float-animation">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>


    <!-- Vídeo Demonstrativo -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto text-center">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">
                    VEJA O SINDICOFÁCIL EM AÇÃO
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Gere Boletos e Gerencie Entregas em Segundos
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Assista como é simples usar o dashboard que economiza horas do seu dia
                </p>

                <!-- Placeholder para vídeo - substituir com URL real -->
                <div class="relative aspect-video bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl shadow-2xl overflow-hidden border-4 border-blue-200">
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-700 font-semibold text-lg">Vídeo demonstrativo em breve</p>
                        <p class="text-gray-500 text-sm mt-2">Dashboard real mostrando geração de boletos e gestão de entregas</p>
                    </div>
                    <!-- Quando tiver o vídeo, usar:
                    <iframe
                        class="w-full h-full"
                        src="https://www.youtube.com/embed/SEU_VIDEO_ID"
                        title="Demonstração SíndicoFácil"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                    -->
                </div>
            </div>
        </div>
    </section>

    <!-- Prova Social -->
    <section class="py-12 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 max-w-5xl mx-auto text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">✔️</div>
                    <div class="text-gray-600">Automatização financeira</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">✔️</div>
                    <div class="text-gray-600">Gestão organizada</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">✔️</div>
                    <div class="text-gray-600">Comunicação centralizada</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">✔️</div>
                    <div class="text-gray-600">Informações em um só lugar</div>
                </div>
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
                    Como o SíndicoFácil Te Ajuda na Gestão
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Funcionalidades criadas para reduzir tarefas manuais e tornar sua administração mais simples e organizada.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Boletos -->
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">💰 Boletos Automáticos</h3>
                            <p class="text-gray-600 mb-4">Reduza inadimplência e economize até 5h/mês</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span>Gere todos os boletos em <strong>1 clique</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span>Lembrete automático por <strong>WhatsApp</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Pix integrado</strong> com confirmação automática</span>
                        </li>
                    </ul>
                </div>

                <!-- Chamados -->
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">📋 Central de Chamados</h3>
                            <p class="text-gray-600 mb-4">Nunca mais perca uma solicitação no WhatsApp</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span>Todos os pedidos <strong>centralizados</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Status organizado</strong> e histórico completo</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Notificações automáticas</strong> aos moradores</span>
                        </li>
                    </ul>
                </div>

                <!-- Prestação de contas -->
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">📊 Prestação de Contas</h3>
                            <p class="text-gray-600 mb-4">Transparência total em poucos cliques</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Dashboard visual</strong> para moradores</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Gráficos automáticos</strong> por categoria</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>PDF em 1 clique</strong> para assembleias</span>
                        </li>
                    </ul>
                </div>

                <!-- Documentos -->
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-900">📁 Documentos</h3>
                            <p class="text-gray-600 mb-4">Encontre tudo rapidamente</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span>Atas, estatuto e contratos <strong>centralizados</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Busca inteligente</strong> por palavra-chave</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                            </svg>
                            <span><strong>Backup na nuvem</strong> automático</span>
                        </li>
                    </ul>
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
                    LANÇAMENTO — FUNÇÃO QUE REVOLUCIONA A PORTARIA
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Gestão Inteligente de <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">Entregas</span>
                </h2>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                    Chega de entregas perdidas, confusão na portaria e reclamação de moradores. Um sistema moderno, simples e rápido — que síndicos e porteiros <strong class="text-yellow-300">AMAM</strong>.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📦
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">1. Registro Completo da Entrega</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Foto da encomenda</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Porteiro responsável</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Data e hora automáticas</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Morador selecionado</li>
                    </ul>
                </div>

                <!-- Card 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        🔔
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">2. Aviso Automático ao Morador</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Mensagem no <strong>WhatsApp</strong></li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Notificação no app</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>E-mail com detalhes</li>
                        <li class="flex items-start gap-2"><span class="text-yellow-300 mt-1">⚡</span><span class="text-yellow-300 font-semibold">Morador avisado em segundos!</span></li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-pink-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        ✍️
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">3. Confirmação de Retirada</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Assinatura digital</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Ou confirmação pelo porteiro</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Data/hora registradas</li>
                        <li class="flex items-start gap-2"><span class="text-yellow-300 mt-1">🛡️</span><span class="text-yellow-300 font-semibold">Zero risco de perdas</span></li>
                    </ul>
                </div>

                <!-- Card 4 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105 md:col-span-2 lg:col-span-2">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📊
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">4. Dashboard do Síndico</h3>
                    <p class="text-yellow-300 font-semibold mb-4 text-sm sm:text-base">⭐ Controle total da portaria em tempo real!</p>
                    <div class="grid sm:grid-cols-2 gap-3 text-sm sm:text-base text-blue-100">
                        <div class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Gráficos de entregas por dia</div>
                        <div class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Itens pendentes em tempo real</div>
                        <div class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Atrasadas com alerta automático</div>
                        <div class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Moradores que mais acumulam entregas</div>
                        <div class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Métrica de eficiência da portaria (SLA)</div>
                        <div class="flex items-start gap-2"><span class="text-yellow-300 mt-1">📈</span><span class="text-yellow-300 font-semibold">Visão completa em segundos!</span></div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 sm:p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105 lg:col-span-1">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-rose-500 rounded-xl flex items-center justify-center mb-4 text-2xl">
                        📄
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3">5. Relatório Mensal</h3>
                    <ul class="space-y-2 text-sm sm:text-base text-blue-100">
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>PDF automático completo</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Estatísticas detalhadas</li>
                        <li class="flex items-start gap-2"><span class="text-green-400 mt-1">✓</span>Perfeito para assembleias</li>
                        <li class="flex items-start gap-2"><span class="text-yellow-300 mt-1">💼</span><span class="text-yellow-300 font-semibold">Ajuda até na valorização do condomínio</span></li>
                    </ul>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <div class="bg-yellow-400/20 backdrop-blur-sm border border-yellow-400/30 rounded-2xl p-6 sm:p-8 max-w-3xl mx-auto">
                    <p class="text-lg sm:text-xl mb-4">
                        <strong class="text-yellow-300">EXCLUSIVO:</strong> Pouquíssimos sistemas no Brasil oferecem esse nível de controle.
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
                    O Que Síndicos Estão Dizendo
                </h2>
                <p class="text-xl text-gray-600">
                    Mais de 300 síndicos já economizam horas todos os meses com o SíndicoFácil
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

                <!-- João -->
                <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border border-blue-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            JM
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">João Martins</div>
                            <div class="text-sm text-gray-600">Síndico há 3 anos — 28 unidades</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "Antes eu gastava <strong>quase 5 horas por mês só com cobrança</strong>.
                        Agora é tudo automático. A inadimplência caiu de 18% para 3%. Melhor decisão que tomei para o condomínio."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Reduziu 5h de trabalho por mês
                    </div>
                </div>

                <!-- Ana Paula -->
                <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-3xl border border-purple-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            AP
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Ana Paula</div>
                            <div class="text-sm text-gray-600">Condomínio com 15 casas</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "Os moradores pararam de me cobrar coisas do financeiro.
                        <strong>Os relatórios são claros e compartilháveis</strong>.
                        Hoje a transparência é total e as assembleias são muito mais tranquilas."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ 100% de aprovação nas assembleias
                    </div>
                </div>

                <!-- Carlos -->
                <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl border border-green-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            CR
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Carlos Rodrigues</div>
                            <div class="text-sm text-gray-600">Síndico profissional — 42 unidades</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "A <strong>gestão de entregas resolveu um problema enorme</strong> que tínhamos na portaria.
                        Antes perdíamos pelo menos 2 pacotes por mês. Agora temos controle total e os moradores adoram."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Zero entregas perdidas em 6 meses
                    </div>
                </div>

                <!-- Mariana -->
                <div class="bg-gradient-to-br from-orange-50 to-white p-8 rounded-3xl border border-orange-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            MS
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Mariana Santos</div>
                            <div class="text-sm text-gray-600">Condomínio com 35 apartamentos</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "O sistema de chamados acabou com aquele caos de mensagens no WhatsApp.
                        <strong>Agora nada se perde e consigo acompanhar tudo</strong> de forma profissional."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Organização total dos chamados
                    </div>
                </div>

                <!-- Ricardo -->
                <div class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl border border-indigo-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            RL
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Ricardo Lima</div>
                            <div class="text-sm text-gray-600">Administradora — 8 condomínios</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "Conseguimos <strong>aumentar a eficiência em 60%</strong> na gestão dos nossos condomínios.
                        O painel único para todos os prédios foi um divisor de águas para nossa operação."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Gestão de múltiplos condomínios
                    </div>
                </div>

                <!-- Fernanda -->
                <div class="bg-gradient-to-br from-pink-50 to-white p-8 rounded-3xl border border-pink-200 shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            FC
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Fernanda Costa</div>
                            <div class="text-sm text-gray-600">Síndica há 1 ano — 22 unidades</div>
                        </div>
                    </div>

                    <div class="text-yellow-500 mb-3">⭐⭐⭐⭐⭐</div>

                    <p class="text-gray-700 italic mb-4">
                        "Sou síndica nova e estava perdida. O SíndicoFácil me deu <strong>toda estrutura que precisava</strong>.
                        Os moradores elogiam a organização e eu não fico mais estressada."
                    </p>

                    <div class="text-sm text-green-600 font-semibold">
                        ✓ Ideal para síndicos iniciantes
                    </div>
                </div>

            </div>

            <!-- Logos/Prova Social Extra -->
            <div class="mt-16 text-center">
                <p class="text-gray-600 mb-6 text-lg">Confiado por condomínios em todo o Brasil</p>
                <div class="flex flex-wrap justify-center items-center gap-8 opacity-60">
                    <div class="text-gray-500 font-semibold">🏢 Residenciais</div>
                    <div class="text-gray-500 font-semibold">🏘️ Condomínios Fechados</div>
                    <div class="text-gray-500 font-semibold">🏗️ Edifícios Comerciais</div>
                    <div class="text-gray-500 font-semibold">🏡 Loteamentos</div>
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
                        TESTAR GRATUITAMENTE
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
                        COMEÇAR TESTE GRATUITO
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

                @if(session('error'))
                <div class="bg-gradient-to-r from-red-500 to-rose-600 text-white p-6 mb-8 rounded-2xl shadow-lg flex items-start gap-4">
                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="font-bold text-lg mb-1">Atenção!</h3>
                        <p>{{ session('error') }}</p>
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
