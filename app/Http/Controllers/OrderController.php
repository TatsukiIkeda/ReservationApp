<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //メイン画面、一覧に戻る時にindexへ戻る
    public function index(Request $request)
    {
        //ログインユーザ情報を取得
        $user = Auth::user();
        //DBからデータを取得
        $items = DB::table('ordres')->get();
        return view('order.index', ['items' => $items,'user' => $user]);
    }

    //日付を切り替えた画面での処理indexから値を受け取る
    public function selectdate(Request $request)
    {
        //ログインユーザ情報を取得
        $user = Auth::user();
        // $sort = $request->stat;
        //選択した日付を取り出す
        $date =  $request->selectdate;
        //DBからデータを取得
        $items = DB::table('ordres')->get();
        return view('order/selectdate', ['items' => $items,'date' => $date,'user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //新規登録の画面へ遷移
    public function create(Request $request)
    {
        //ログインユーザ情報を取得
        $user = Auth::user();
        //DBからデータを取得
        $items = DB::table('ordres')->get();
        return view('order/create',['items' => $items,'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //新規で入力情報をDBに記憶する
    public function store(Request $request)
    {
        //ログインユーザ情報を取得
        $user = Auth::user();
        //入力したデータを変数$paramに入れる
        $param = [
            'order_name' => $user->name,
            'arrival_date' => $request->arrival_date,
            'vendor' => $request->vendor,
            'title' => $request->title,
            'quantity' => $request->quantity,
            'memo' => $request->memo,
            'flg' => '1',
        ];
        // $items = DB::table('ordres')->get();
        //変数に代入したデータをDBに保存する
        DB::table('ordres')->insert($param);
        return  redirect('order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //indexから編集画面へ遷移
    public function edit(Request $request, $order_id)
    {
        //ログインユーザ情報を取得
        $user = Auth::user();
        //受け取った$order_idから対象のレコードを呼び出す
        $item = DB::table('ordres')->where('order_id', $order_id)->first();
        return view('order/edit',['item' => $item,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //編集画面で変更した情報をDBに上書きする
    public function update(Request $request)
    {
        //入力したデータを変数$paramに入れる
        $param = [
            'order_name' => $request->order_name,
            'arrival_date' => $request->arrival_date,
            'quantity' => $request->quantity,
            'vendor' => $request->vendor,
            'title' => $request->title,
            'memo' => $request->memo,
            'flg' => '1',
        ];
         //変数に代入したデータを指定したレコードに保存する
        DB::table('ordres')->where('order_id', $request->order_id)->update($param);
        return redirect('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //削除ボタンを押した時の処理
    public function del($order_id)
    {
        //受け取った$order_idから対象のレコードを呼び出す
        $item = DB::table('ordres')->where('order_id', $order_id)->first();
        return view('order/del',['item' => $item]);

    }

    //削除処理
    public function rmove(Request $request)
    {
        //受け取った$order_idから対象のレコードを削除する
        DB::table('ordres')->where('order_id', $request->order_id)->delete();
        return redirect('order');
    }

    //入荷状況を変更する時の処理、入荷済みに変更
    public function instock($order_id)
    {
        //変更するflgを変数$paramに入れる
        $param = [
            'flg' => '0',
        ];
        //受け取った$order_idから対象レコードをflgデータを上書きする
        DB::table('ordres')->where('order_id', $order_id)->update($param);

        return redirect('order');
    }

    //入荷状況を変更する時の処理、未入荷に変更
    public function notinstock($order_id)
    {
        //変更するflgを変数$paramに入れる
        $param = [
            'flg' => '1',
        ];
        //受け取った$order_idから対象レコードをflgデータを上書きする
        DB::table('ordres')->where('order_id', $order_id)->update($param);

        return redirect('order');
    }

    //ログアウト処理
    public function logout()
    {
        //ログアウトする
        Auth::logout();
        return redirect('order');
      }


}
