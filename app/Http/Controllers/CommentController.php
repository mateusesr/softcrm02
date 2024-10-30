<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Dados recebidos:', $request->all());

        $request->validate([
            'description' => 'required|string|max:255',
            'attendance_id' => 'required|exists:attendances,id',
        ]);

        Comment::create([
            'description' => $request->description,
            'attendance_id' => $request->attendance_id,
        ]);

        return redirect()->route('comment.index')->with('success', 'Comentário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $comment->update($request->all());

        return redirect()->route('comment.index')->with('success', 'Comentário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comment.index')->with('success', 'Comentário excluído com sucesso.');
    }
}
