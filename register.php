<?php
/**
 * Created by PhpStorm.
 * User: 卡卡
 * Date: 2017/6/2
 * Time: 14:10
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\RegisterUsers; //框架自带的
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirecTo = '/';

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        //Auth::guard('users')->check() 就是用来判断前台用户是否登录，
        //而 Auth::guard('admins')->check() 就是用来判断后台用户是否登录的
        $this->middleware('guest');
    }

    protected function showRegistratioForm()
    {
        return view('auth.register',[
           'email' => session()->has('email') ? session()->get('email') : '',
        ]);
    }

    protected function registe(Request $request)
    {
        $this->validate($request,$this->rules());
        $user = $this->createUser($request->all());
        $this->sendRegistrationEmail($request->all());
        auth()->login($user);
        return redirect($this->redirecTo);
    }

    /**
     * 验证规则
     * @return array
     */
    protected function rules()
    {
        return [
            'first_name' => 'required|max:20|min:3',
            'last_name' => 'required|max:20|min:3',
            'email' => 'required|email|max:255|unique:users',//unique在users表中唯一
            'password' => 'required|min:6',
        ];
    }

    /**
     * crypt加密 a为盐值
     * 加密算法有几种 md5+盐 md5后+盐再MD5
     */
    public function testCrypt()
    {
        $a = '123456';
        $b = crypt('a',$a);
        $c = crypt('a',$a);
        if ($b == $c) {
            echo 1;
        } else {
            echo 2;
        }
    }

    /**
     * 插入数据
     * @param array $data
     * @return static
     */
    protected function createUser(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'nickname' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'person',
        ]);

        Person::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
        ]);
        return $user;
    }

    /**
     * 发送邮件
     * @param array $data
     */
    protected function sendRegistrationEmail(array $data)
    {
        $title = trans('给你发邮件啦');
        $name = $data['first_name'].' '.$data['last_name'];
        \Mail::queue('你好',['data' => $data,'title'=>$title,'name'=>$name],function($message) use ($data) {
            $message->to($data['email'])->subject(trans('请接收'));
        });
        session()->put('message',trans('aa',['_name' => $name]));
        session()->save();
    }
}
?>
--------------------------user MODEL--------------
<?php
namespace app;

use App\Eloquent\Model;
use App\Log;
use App\Notifications\Auth\ResetPasswordNotification;
use App\Order;
use App\UserPoints;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use AuthenticatableContract,CanResetPassword, SoftDeletes, Notifiable;
    //数据库表名
    protected $table = 'users';
    //白名单
    protected $fillable = [
        'nickname',
        'email',
        'password',
        'role',
        'pic_url',
        'language',
        'website',
        'twitter',
        'facebook',
        'mobile_phone',
        'work_phone',
        'description',
        'disabled_at',
    ];
    
    //被软删除的字段
    protected $dates = ['deleted_at'];

    //转换成数组或 JSON 时隐藏属性 就不会有该字段了
    protected $hidden = ['password','remember_token'];

}
?>




