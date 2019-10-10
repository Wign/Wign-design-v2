<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class RequestController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $limit = config('global.list_limit');
        $requests = Word::doesntHave('posts')->has('requests')->withCount('requests')->orderBy('requests_count', 'desc')->orderBy('word')->paginate($limit);

        return view('requests')->with($requests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $this->validate($request, [
            'literal' => 'required|string',
            'new' => 'required|in:true,false'
        ]);
        $literal = $request->input('literal');
        $newRequest = $request->input('new') == 'true' ? 1 : 0;

        if (empty($literal)) {
            return redirect()->back()->withErrors(__('error.missingLiteral'));
        }

        $user = \Auth::user();
        $word = Word::firstOrCreate([
            'literal' => $literal
        ], [
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);

        if ($newRequest && $word->translations->isEmpty()) {
            $word->requesters()->attach($user);
            return view('home')->with('message', __('success.request.created'));
        } elseif (!$newRequest) {
            $word->requesters()->detach($user);
            return view('home')->with('message', __('success.request.removed'));
        }

        return redirect()->back()->withErrors(__('error.request.notUpdated'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id) {
        $user = \Auth::user();

        $this->validate($request, [
            'literal' => 'required|string'
        ]);
        $literal = $request->input('literal');

        $word = Word::findOrFail($id);
        if (!$word->literal.equalTo($literal)) {
            $word->save([
                'literal' => $literal,
                'editor_id' => $user->getAuthIdentifier()
            ]);
        }

        return view('home')->with('message', __('success.request.renamed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $word = Word::findOrFail($id);

        if ($word->translations->isEmpty()) {
            try {
                $word->delete();
                $word->requesters()->detach();
            } catch (\Exception $e) {
                return view()->withErrors(__('error.deleteFailed'));
            }
        }

        return view('home')->with('message', __('success.word.deleted'));
    }


}
