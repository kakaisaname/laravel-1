<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\Response;
class StudentController extends Controller
{
    public function test1()
    {
//        $students = DB::select('select * from student');
//        var_dump($students);
//        $students = DB::insert('insert into student(name,age) values(?,?)',
//            ['qiao',16]);
        //修改
//        $num = DB::update('update student set age = ? where name = ?',
//            [22,'caoyi']);
//        $students = DB::select('select * from student');
//        $students = DB::select('select * from student where id >?',[1001]);
//        $students = DB::select('delete from student where id >?',[1001]);
//        var_dump($students);

    }

    //这个方便点
    public function query1()
    {
//      $id = DB::table('student')->insertGetId(
//          ['name'=>'chenqiao','age'=>22]
//      );
//        var_dump($id);
        $haha = DB::table('student')->insert([
            ['name'=>'name3','age'=>'24'],
            ['name'=>'name2','age'=>'23']
        ]);
        var_dump($haha);
    }
    //更新
    public function query2()
    {
        $id = DB::table('student')
            ->where('id',1001)
            ->update(['age'=>56]);
        var_dump($id);
    }
    //删除
    public function query3()
    {
        $id = DB::table('student')
            ->where('id','>','1014')
            ->delete();
        var_dump($id);
    }

    //查询
    public function query4()
    {
//        $id = DB::table('student')
//            ->where('id','1005')
//            ->get();

//        $id = DB::table('student')
//            ->where('id','1005')
//            ->first();

//        $id = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();

//        $id = DB::table('student')
//            ->whereRaw('id >=? and age > ?',[1008,22])
//            ->get();

//        $id = DB::table('student')
//            ->whereRaw('id >=? and age > ?',[1008,22])
//            ->pluck('name');

//        $id = DB::table('student')
//            ->whereRaw('id >=? and age > ?',[1008,22])
//            ->lists('name','id');

//        $id = DB::table('student')
//            ->select('name','age')
//            ->whereRaw('id >=? and age > ?',[1008,22])
//            ->get();

//        DB::table('student')->chunk(2,function($students){
//            var_dump($students);
//        });
//            ->select('name','age')
//            ->whereRaw('id >=? and age > ?',[1008,22])
//            ->chunk('2');
//        dd($id);

//        $num = DB::table('student')->count();
//        $num = DB::table('student')->max('age');
//        $num = DB::table('student')->min('age');
//        $num = DB::table('student')->avg('age');
//        $num = DB::table('student')->sum('age');
//        echo $num;

    }

    public function orm1()
    {
        //all()
//        $students = Student::all();
//        $students = Student::find('1012');
//        $students = Student::findOrFail('1015');
//        $students = Student::get();
//        $students = Student::where('id','>','1010')
//                ->orderby('age','desc')
//                ->first();
//        Student::chunk('2',function($result){
//            var_dump($result);
//        });
    }

    public function orm2()
    {
//        $student = new Student();
//        $student->name = 'tot';
//        $student->age = 19;
//        $k = $student->save();
//        dd($k);

//        $student = Student::find('1018');
////        echo $student->created_at;
//        echo date('Y-m-d H:i:s',$student->created_at);

        //新增数据
//        $student = Student::create(
//            ['name'=>'dian','age'=>22]
//        );
//        dd($student);

//        $student = Student::firstOrCreate(
//            ['name' => 'diandd']
//        );
//        $student = Student::firstOrNew(
//            ['name'=>'dianss']
//        );
//        $kaka = $student->save();
//        dd($kaka);
    }

    //更新
    public function orm3()
    {
//        $student = Student::find(1021);
//        $student->name = 'kitty';
//        $kaka = $student->save();
//        var_dump($kaka);
        $num = student::where('id','>','1019')->update(
            ['age'=>41]
        );
        var_dump($num);
    }
    
    //删除
    public function orm4()
    {
//        $student = Student::find(1021);
//        $bool = $student->delete();
//        var_dump($bool);
//        $num = Student::destroy(1020);
//        $num = Student::destroy(1018,1019);
//        $num = Student::destroy([1016,1017]);
        $num = Student::where('id','>','1014')->delete();
        var_dump($num);
    }

    public function section1()
    {
        return view('student.section1',[
            'name' => 'caoyi'
        ]);
    }

    //request
    public function request1(Request $request)
    {
//        echo $request->input('name');
        //默认值
//        echo $request->input('sex','未知');
//        if($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo '参数未知';
//        }

//        $res = $request->all();
//        dd($res);

//       echo  $request->method();
//        if($request->isMethod('POST')){
//            echo 'yes';
//        }else{
//            echo 'no';
//        }

//        $res = $request->ajax();
//        var_dump($res);
//        $res = $request->is('student/*');
//        var_dump($res);


    }

    //session
    public function session1(Request $request){
//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');

//        session()->put('key2','value2');
//        echo session()->get('key2');
//       $request->session()->push('key4','value4');
//        $data = $request->session()->all();
//        var_dump($data);
//        var_dump($res);
        $res = Session::get('key1');
        echo $res;
    }

    public function session2(Request $request){
//        echo Session::get('key3');
//        $res = Session::pull('key1'); 取出就删除
//        var_dump($res);
//        Session::flush();
//        dd($res);
        return Session::get('message','你好');
    }
    
    //response
    public function response()
    {
//        $data = [
//            'error' => 0,
//            'errorMsg' => 'success',
//            'data' => 'caoyi'
//        ];
//        return response()->json($data); 返回json数据
        //重定向
//        return redirect('session2')->with('message','喀喀喀');
//        return redirect()->back();  返回上一级
    }




}