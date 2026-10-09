<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect jika mengakses area tanpa izin
        if ($user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        }

        return redirect()->route('siswa.beranda');
    }
}