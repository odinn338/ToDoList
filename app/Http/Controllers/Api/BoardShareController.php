<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardShareController extends Controller
{
    public function store(Request $request, Board $board)
    {
        $this->authorize('update', $board);

        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'role'  => 'required|in:editor,viewer',
        ]);

        $user = User::where('email', $data['email'])->first();

        $board->users()->syncWithoutDetaching([
            $user->id => ['role' => $data['role']]
        ]);

        return response()->json([
            'message' => 'Board shared successfully'
        ]);
    }
}
