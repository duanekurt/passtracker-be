<?php

namespace App\Services;

use App\Http\Requests\CreatePwTrackRequest;
use App\Http\Resources\PwTrackResource;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneratorTrait;
use App\Traits\ScryptTrait;
use App\Models\PwTrack;

class PwTrackService
{
    use GeneratorTrait, ScryptTrait;

    public function getAll(array $filters)
    {
        $data = PwTrack::with('account_type')->orderBy('created_at', 'DESC')->simplePaginate(6);

        return $data;
    }

    public function create(CreatePwTrackRequest $request)
    {
        $slug = $this->generateSlug($request->password_for);
        $encoded = $this->base64_encode($slug, $request->password);
        $hashed_password = $this->generateHashedPassword($encoded);

        $data = PwTrack::create([
            'slug' => $slug,
            'email_username' => $request->email_username,
            'hashed_password' => $hashed_password,
            'account_type_id' => $request->account_type_id,
            // 'password' => $request->password,
            'password_for' => $request->password_for,
            // 'user_id' => Auth::user()->id,
            'user_id' => 1,
        ]);

        return (new PwTrackResource($data));
    }
}
