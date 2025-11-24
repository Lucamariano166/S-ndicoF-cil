<?php

namespace App\Http\Controllers;

use App\Mail\NovoLeadNotification;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing-v3');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'unidades' => 'nullable|integer|min:1',
            'tipo' => 'required|in:morador,profissional,administradora',
            'mensagem' => 'nullable|string|max:1000',
        ]);

        $lead = Lead::create($validated);

        // TEMPORARIAMENTE DESABILITADO: Envio de email comentado até resolver config SMTP
        // TODO: Reativar após configurar SMTP corretamente no Railway
        // Mail::to(env('MAIL_ADMIN', 'admin@example.com'))
        //     ->queue(new NovoLeadNotification($lead));

        // Leads são salvos no banco de dados (tabela 'leads')
        // Você pode consultar com: SELECT * FROM leads;

        // Redireciona para home com mensagem de sucesso (padrão PRG - Post/Redirect/Get)
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso! Entraremos em contato em breve.');
    }
}
