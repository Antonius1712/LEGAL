<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\LGIGlobal_Users;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->header = ['Content-Type: application/x-www-form-urlencoded'];
        $this->passwordIvEncodeLgiGlobal = base64_decode( env('PASSWORD_IV_ENCODE_LGI_GLOBAL') );// IV OUTPUT FROM C# CODE
        $this->passwordKeyEncodeLgiGlobal = base64_decode( env('PASSWORD_KEY_ENCODE_LGI_GLOBAL') );// KEY OUTPUT FROM C# CODE
    }

    public function EncryptLgiGlobalPassword($plainTextPassword){

        $iv = $this->passwordIvEncodeLgiGlobal;
        $key = $this->passwordKeyEncodeLgiGlobal;

        $unicodePassword = mb_convert_encoding($plainTextPassword, 'UTF-16LE', 'UTF-8');// Convert string to unicode
        $text =  base64_decode( base64_encode( $unicodePassword ) );

        // to append string with trailing characters as for PKCS7 padding scheme
        $block = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $padding = $block - (strlen($text) % $block);
        $text .= str_repeat(chr($padding), $padding);

        $crypttext = @mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv);
        return base64_encode( $crypttext );
    }

    public function DecryptLgiGlobalPassword($encryptedTextPassword){

        $iv = $this->passwordIvEncodeLgiGlobal;
        $key = $this->passwordKeyEncodeLgiGlobal;

        $decrypttext = @mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,  base64_decode($encryptedTextPassword), MCRYPT_MODE_CBC, $iv);

        return preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/u', '', $decrypttext);// remove unwanted bytes from encrypting binary data

    }

    protected function attemptLogin(Request $request)
    {
        $lgi = LGIGlobal_Users::where('NIK', $request->NIK)
                ->where('password', $this->EncryptLgiGlobalPassword($request->password))
                ->with('getDept')
                ->with('getBranch')
                ->first();
        $user = User::where('NIK', $lgi->NIK)->first();
        if( !$user ){
            $user = User::create([
                'Name' => $lgi->Name, 
                'NIK' => $lgi->NIK, 
                'Email' => $lgi->Email, 
                'Password' => Hash::make($request->password), 
                'DeptCode' => $lgi->DeptCode, 
                'DeptName' => $lgi->getDept->DeptName, 
                'BranchCode' => $lgi->BranchCode, 
                'BranchName' => $lgi->getBranch->BranchName, 
                'Status' => $lgi->Status
            ]);
        }else{
            $password = $this->DecryptLgiGlobalPassword($lgi->Password);
            $user = User::where('NIK', $lgi->NIK)->first();

            if( !Hash::check($password, $user->Password) ){
                $user->Password = Hash::make($password);
            }

            $user->Name = $lgi->Name; 
            $user->NIK = $lgi->NIK; 
            $user->Email = $lgi->Email; 
            $user->DeptCode = $lgi->DeptCode; 
            $user->DeptName = $lgi->getDept->DeptName; 
            $user->BranchCode = $lgi->BranchCode; 
            $user->BranchName = $lgi->getBranch->BranchName; 
            $user->Status = $lgi->Status;
            $user->save();
        }
        
        if( $lgi ){
            Auth::login($user);
            return redirect()->route('home');
        }
    }

    public function username()
    {
        return 'NIK';
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
