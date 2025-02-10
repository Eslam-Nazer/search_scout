<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $comments_query = Comment::query();
        // ->get();
        $search = $request->query("search");

        if (filled($search)) {
            $comments_query = Comment::search($search);
        }

        $comments = $comments_query->get();

        return view(
            "dashboard",
            compact("comments")
        );
    }

    public function search(Request $request)
    {
        $comments_query = Comment::query();
        $search = $request->search;

        if (filled($search)) {
            $comments_query = Comment::search($search);
        }
        $comments = $comments_query->get();
        // return redirect()->route('dashboard', ['comments' => $comments]);
        return view("dashboard", compact("comments"));
    }
}
