<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Attendance;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attendance_id = $request->get('attendance_id');
        if ($attendance_id) {
            $comments = Comment::where('attendance_id', $attendance_id)->get();
        } else {
            $comments = Comment::all();
        }
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $attendance_id = $request->get('attendance_id'); 
        $attendance = Attendance::find($attendance_id);
        $attendances = Attendance::all();


        return view('comment.create', compact('attendance_id', 'attendance', 'attendances'));
    }
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Dados recebidos:', $request->all());

        $request->validate([
            'description' => 'required|string|max:255',
            'attendance_id' => 'required|exists:attendances,id',
        ]);

        Comment::create($request->all());

        return redirect()->route('comment.index', ['attendance_id' => $request->attendance_id])->with('success', 'Atendimento criado com sucesso.');
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
