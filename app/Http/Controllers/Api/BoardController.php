<?php

namespace App\Http\Controllers\Api;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;


class BoardController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Board::class, 'board');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user()
            ->boards()
            ->latest()
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardRequest $request)
    {
        return $request->user()
            ->boards()
            ->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        return $board;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        $board->update($request->validated());

        return $board;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        $board->delete();

        return response()->noContent();
    }
}
