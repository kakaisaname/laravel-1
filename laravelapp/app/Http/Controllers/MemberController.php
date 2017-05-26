<?php
namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;

use App\Models\Member;

class MemberController extends Controller{
    public function index($id)
    {
//        return 'hello world';
//        return route('memberinfo');
        return 'qiao'.$id;
    }
    
    public function qiao()
    {
        return 'hello qiao';
    }

    public function view()
    {
        return Member::getMember();
//        return view('memberinfo');
//        return view('member/info',[
//            'name' => '曹义',
//            'age' => 18
//        ]);
    }
    
    public function yi()
    {
        
    }

}