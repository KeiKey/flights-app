<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::query()->where('id', '!=', Auth::id())->get()
        ]);
    }

    /**
     * Update the user.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        try {
            if ($request->email_verified_at == 'true') {
                $user->email_verified_at = now();
                $user->save();
                return redirect()->back();
            }

            $user->email_verified_at = null;
            $user->save();
            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
