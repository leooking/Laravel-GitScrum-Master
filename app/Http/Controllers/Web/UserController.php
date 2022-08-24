<?php

namespace GitScrum\Http\Controllers\Web;

use Illuminate\Http\Request;
use GitScrum\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::user();
        $sprints = $user->sprints()->take(2);
        $sprintColumns = ['tbody_sprintFavorite',
            'tbody_sprintBacklog',
            'tbody_sprintProductBacklog', ];

        $sprints = $sprints->get()->map(function ($sprint) use ($sprintColumns) {
            $sprint['column'] = $sprintColumns;

            return $sprint;
        });

        return view('users.dashboard')
            ->with('sprints', $sprints)
            ->with('sprintColumns', $sprintColumns)
            ->with('user', $user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)
            ->where('provider', Auth::user()->provider)
            ->first();

        $activities = $user->activities($user->id);

        return view('users.show')
                ->with('user', $user)
                ->with('activities', $activities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
