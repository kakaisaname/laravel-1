<?php
/**
 * Created by PhpStorm.
 * User: 卡卡
 * Date: 2017/6/2
 * Time: 12:59
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LogController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest',['except' => 'logout']);
    }

    public function login(Request $request){
        if ($request->input('newuser')) {
            session()->flash('email',$request->input('email'));

            return redirect('/register');
        }
        return $this->handle($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function handle(Request $request)
    {
        $this->validate($request,$this->rules());
        if (auth()->attempt($this->credentials($request),$request->has('remember'))) {
            return $this->redirect($this->redirectTo);
        }
        return redirect('/login')
            //only得到请求里的部分输入值
            ->withInput($request->only('email','remember'))
            ->withErrors([
               'email' => $this->getFailedLoginMessage(),
            ]);
    }

    protected function rules()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        if (!env('APP_DEBUG')) {
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }
        return $rules;
    }

    /**
     * 返回请求的email password
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
        ];
    }

    /**
     * @return mixed
     */
    public function getFailedLoginMessage()
    {
        //trans
        return trans('用户信息有误');
    }
}
