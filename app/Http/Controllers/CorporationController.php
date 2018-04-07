<?php

namespace App\Http\Controllers;

use App\Corporation;
use Illuminate\Http\Request;
use App\Resources\Stellar\AccountResource;

class CorporationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('corporation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resources\Stellar\AccountResource  $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        Request $request,
        AccountResource $resource
    ) {
        // To-do: validation

        $corporation = $request->user()
            ->corporations()
            ->create($request->all());

        $corporationAccount = $resource->create();
        $corporation->account_address = $corporationAccount->publicKey;
        $corporation->account_secret = $corporationAccount->secret;
        $corporation->save();

        $userAccount = $resource->create();
        $request->user()->account_address = $userAccount->publicKey;
        $request->user()->account_secret = $userAccount->secret;
        $request->user()->save();

        $assetResource = resolve('App\Resources\Stellar\AssetResource');
        $assetResource->create($corporation);
        $assetResource->trust($corporation, $request->user());

        return redirect()->action('CorporationController@show', $corporation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporation  $corporation
     * @return \Illuminate\View\View
     */
    public function show(Corporation $corporation)
    {
        return view('corporation.show', [
            'corporation' => $corporation->load('users'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporation  $corporation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Corporation $corporation)
    {
        $corporation->delete();

        return redirect()->back();
    }

    /**
     * Invite user from request to the specified corporation.
     *
     * @param  \App\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function join(
        Corporation $corporation,
        Request $request
    ) {
        $corporation->users()->syncWithoutDetaching($request->user());

        return redirect()->action(
            'CorporationController@show',
            $corporation
        )->with([
            'status' => 'Yeah! You\'re part of this corporation.',
        ]);
    }
}
