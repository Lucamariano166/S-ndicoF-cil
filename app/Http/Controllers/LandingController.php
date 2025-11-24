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
        // Log that we reached the controller
        error_log('LandingController::index() called');

        try {
            // Test if view file exists
            if (!view()->exists('landing-v3')) {
                error_log('View landing-v3 not found');
                return response('View landing-v3 not found', 404);
            }

            error_log('Attempting to render view');

            // Try to render with explicit empty errors bag
            $view = view('landing-v3')->with('errors', new \Illuminate\Support\ViewErrorBag());

            error_log('View rendered successfully');
            return $view;
        } catch (\Throwable $e) {
            error_log('Exception in LandingController: ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            return response('Error: ' . $e->getMessage() . "\n\nFile: " . $e->getFile() . "\nLine: " . $e->getLine(), 500);
        }
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
