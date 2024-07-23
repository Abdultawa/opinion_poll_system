<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show(){
        $questions = Question:: paginate(10);
        return view('dashboard', compact('questions'));
    }
    public function question(Question $question)
    {
        return view('question.show', ['question' => $question]);

    }
    public function vote(Request $request, $questionId)
    {
        if (!Auth::check()) {
            // Redirect the user to the login page or show an error message
            return redirect()->route('login');
        }
    
        $user = Auth::user();
        $question = Question::findOrFail($questionId);
    
        // Check if the user has already voted for this question
        if ($question->hasUserVoted($user->id)) {
            // Redirect the user back with an error message or show a message indicating they have already voted
            return redirect()->back()->with('error', 'You have already voted for this question.');
        }
    
        // Add the user's ID to the voted_users column
        $votedUsers = json_decode($question->voted_users);
        $votedUsers[] = $user->id;
        $question->voted_users = json_encode($votedUsers);
        $question->save();
        $question = Question::findOrFail($questionId);
    
        // Validate the selected option
        $selectedOption = $request->input('selected_option');
        if (!in_array($selectedOption, ['option_A', 'option_B', 'option_C', 'option_D'])) {
            return redirect()->back()->with('error', 'Invalid option selected.');
        }
    
        // Increment the vote count for the selected option
        $question->increment($selectedOption . '_votes');
    
        return redirect()->back()->with('success', 'Vote submitted successfully!');
    }
    public function showquestion($question)
    {
        $question = Question::findOrFail($question);

        // Calculate vote percentages for each option
        $totalVotes = $question->option_A_votes + $question->option_B_votes +
                      ($question->option_C ? $question->option_C_votes : 0) +
                      ($question->option_D ? $question->option_D_votes : 0);

        $optionAPercentage = $totalVotes > 0 ? ($question->option_A_votes / $totalVotes) * 100 : 0;
        $optionBPercentage = $totalVotes > 0 ? ($question->option_B_votes / $totalVotes) * 100 : 0;
        $optionCPercentage = $totalVotes > 0 && $question->option_C ? ($question->option_C_votes / $totalVotes) * 100 : 0;
        $optionDPercentage = $totalVotes > 0 && $question->option_D ? ($question->option_D_votes / $totalVotes) * 100 : 0;

        return view('question.show', [
            'question' => $question,
            'optionAPercentage' => $optionAPercentage,
            'optionBPercentage' => $optionBPercentage,
            'optionCPercentage' => $optionCPercentage,
            'optionDPercentage' => $optionDPercentage,
        ]);
    }

    public function destroy(User $user)
    {
        // Delete the question
        $user->delete();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}