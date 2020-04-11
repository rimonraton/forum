<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(15);
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
        //
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        return redirect('/questions')->with('success', 'Your question has been Updated.');
    }

    public function destroy(Question $question)
    {
        //
    }
}
