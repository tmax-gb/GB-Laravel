<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileeController extends Controller
{
    /**
     * @param Request $request
     */
    public function update(Request $request){
        $user = Auth::user();
        
        if ($request->isMethod('post')){
            $this->validate($request,$this->validateRules(), [], $this->attributesName());
            $errors = [];
            if (Hash::check($request->post('password'),$user->password)){
                $user->fill([
                    'name'=> $request-> post('name'),
                    'password' => Hash::make($request-> post('newPassword')),
                    'email' => $request-> post('email'),
                ]);
                $user-> save();
            }else{
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()-> route('admin.updateProfile')->withErrors($errors);
        }
        return view ('admin.profilee', [
            'user'=> $user,
        ]);
    }

    protected function validateRules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email','max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['required'],
            'newPassword' => ['required', 'string', 'min:8'],
        ];
    }
    protected function attributesName(){
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}