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
        error_log('LandingController called');

        // Test with simple view first
        return view('test-simple');
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

        // Envia email de notificação
        Mail::to(env('MAIL_ADMIN', 'admin@example.com'))
            ->send(new NovoLeadNotification($lead));

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso! Entraremos em contato em breve.');
    }
}
