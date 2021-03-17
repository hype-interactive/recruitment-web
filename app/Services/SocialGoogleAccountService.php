<?php
namespace App\Services;
use App\Models\SocialGoogleAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService{

    public function createOrGetUser(ProviderUser $providerUser)
    {

        $account = SocialGoogleAccount::where('provider','=','google')
            ->where('provider_user_id','=',$providerUser->getId())
            ->first();
            
        if ($account) {
            return $account->user;
        } else {

            $account = new SocialGoogleAccount([
                            'provider_user_id' => $providerUser->getId(),
                            'provider' => 'google'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $names=explode(" ",$providerUser->getName());
                $user = User::create([
                                'email' => $providerUser->getEmail(),
                                'fname' =>$names[0] ,
                                'lname' => $names[1],
                                'type'=>'other',
                            ]);
                        }
            $account->user()->associate($user);
                        $account->save();
            return $user;
        }
    }
}

?>