<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SecurityQuestionRecovery extends Component
{
    public string $email = '';
    public array $questions = [];
    public array $answers = [];

    public function loadQuestions(): void
    {
        $user = User::where('email', $this->email)->first();

        if (! $user || ! is_array($user->security_questions)) {
            $this->addError('email', 'No se encontraron preguntas para este correo electrónico.');
            return;
        }

        $this->questions = $user->security_questions;
        $this->answers = array_fill(0, count($this->questions), '');
    }

    public function verifyAnswers(): void
    {
        $user = User::where('email', $this->email)->first();

        if (! $user || ! is_array($user->security_questions)) {
            $this->addError('email', 'Correo electrónico inválido.');
            return;
        }

        $correct = true;

        foreach ($user->security_questions as $index => $item) {
            if (trim(strtolower($this->answers[$index])) !== trim(strtolower($item['answer'] ?? ''))) {
                $correct = false;
                break;
            }
        }

        if (! $correct) {
            $this->addError('answers', 'Las respuestas no coinciden.');
            return;
        }

        // Guardar temporalmente el email para el siguiente paso
        Session::put('verified_email', $this->email);

        // Redirigir al formulario para cambiar contraseña
        $this->redirectRoute('password.reset-without-token');
    }

    public function render()
    {
        return view('livewire.auth.security-question-recovery');
    }
}
