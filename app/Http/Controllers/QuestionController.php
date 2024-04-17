<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        // Validate the request data
        Question::create(array_merge($this->validateQuestion()));

        return redirect()->route('dashboard')->with('success', 'Question added successfully!');
    }
    public function edit(Question $question)
    {
        return view('admin.edit', ['question' => $question]);
    }
    public function index()
    {
        $questions = Question::all();
        return view('admin.index', compact('questions'));
    }

    public function update(Question $question)
    {
        $attributes= $this->validateQuestion($question);

        $question->update($attributes);
        // Redirect back with success message
        return redirect()->back()->with('success', 'Question updated successfully!');
    }
    protected function validateQuestion(?Question $question = null): array
    {
        $question ??= new Question();

        return request()->validate([
            'question' => 'required',
            'option_A' => 'required',
            'option_B' => 'required',
            'option_C' => 'required',
            'option_D' => 'required',
            'category_id' => ['required', Rule::exists('category', 'id')],
        ]);
    }
    public function destroy(Question $question)
    {
        // Delete the question
        $question->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Question deleted successfully!');
    }
    public function manageUser(){
        $users = User::paginate(10); // Paginate the results, 10 users per page

        return view('admin.manageUser', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
