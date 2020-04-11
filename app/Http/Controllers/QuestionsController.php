<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->all());
        return redirect('/questions')->with('success', 'Your question has been submitted.');
    }

    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        // if(\Gate::denies('update-question', $question)){
        //     abort(403, "Access denied!");   
        // }
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->update($request->all());
        return redirect('/questions')->with('success', 'Your question has been updated.');
    }

    public function destroy(Question $question)
    {
        // if(\Gate::denies('delete-question', $question)){
        //     abort(403, "Access denied!");   
        // }
        $this->authorize('delete', $question);
        $question->delete();
        return redirect('/questions')->with('success', 'Your question has been deleted.');
    }
}
