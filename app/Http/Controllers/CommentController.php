<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Attendance;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function index(Request $request)
    {
        $attendance_id = $request->get('attendance_id');
        if ($attendance_id) {
            $comments = Comment::with(['attendance.type', 'attendance.client'])->where('attendance_id', $attendance_id)->get();
        } else {
            $comments = Comment::all();
        }
        return view('comment.index', compact('comments', 'attendance_id'));
    }


    public function create(Request $request)
    {
        $attendance_id = $request->get('attendance_id');

        if ($attendance_id) {
            $attendance = Attendance::find($attendance_id);
            $attendances = [$attendance];
        } else {
            $attendances = Attendance::all();
        }

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

        if ($request->finish == '1') {
            Attendance::whereId($request->attendance_id)->update(['status' => 'Finalizado']);
        }

        return redirect()->route('comment.index', ['attendance_id' => $request->attendance_id])->with('success', 'Atendimento criado com sucesso.');
    }


    public function show(Comment $comment)
    {
        $attendance_id = $comment->get('attendance_id');
        if ($attendance_id) {
            $attendance = Attendance::find($attendance_id);
            $attendances = [$attendance];
        } else {
            $attendances = Attendance::all();
        }

        return view('comment.show', compact('comment', 'attendance_id', 'attendance', 'attendances'));
    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $attendance_id = $comment->attendance_id; // Obter o attendance_id do comentário
        return view('comment.edit', compact('comment', "attendance_id"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comment.index', ['attendance_id' => $comment->attendance_id])->with('success', 'Comentário atualizado com sucesso.');
    }


    public function destroy(Request $request, Comment $comment)
    {
        $attendance_id = $request->input('attendance_id');
        $comment->delete();

        return redirect()->route('comment.index', ['attendance_id' => $attendance_id])
            ->with('success', 'Comentário excluído com sucesso.');
    }
}

