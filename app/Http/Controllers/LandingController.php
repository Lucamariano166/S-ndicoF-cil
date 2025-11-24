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
        error_log('========================================');
        error_log('LandingController::index() called at ' . date('Y-m-d H:i:s'));
        error_log('Request URL: ' . request()->fullUrl());
        error_log('========================================');

        try {
            // Simple test first
            error_log('Step 1: Checking view exists');
            if (!view()->exists('landing-v3')) {
                error_log('ERROR: View landing-v3 not found');
                return response('View landing-v3 not found', 404);
            }

            error_log('Step 2: Creating empty ViewErrorBag');
            $errorBag = new \Illuminate\Support\ViewErrorBag();

            error_log('Step 3: Attempting to render view');
            $content = view('landing-v3')->with('errors', $errorBag)->render();

            error_log('Step 4: View rendered successfully, length: ' . strlen($content));
            return response($content)->header('X-Laravel-Response', 'true');
        } catch (\Throwable $e) {
            $error = 'Exception in LandingController: ' . $e->getMessage() . "\n\nFile: " . $e->getFile() . ':' . $e->getLine();
            error_log('========================================');
            error_log('EXCEPTION: ' . $error);
            error_log('Stack trace: ' . $e->getTraceAsString());
            error_log('========================================');
            return response($error, 500)->header('X-Laravel-Response', 'error');
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
