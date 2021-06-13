@extends("layouts.app")
@section("content")

{{-- ログイン判定で表示を変更 --}}
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    @if (Auth::check())
    <a href="../order/create" class="btn btn-success">新規登録</a>
    @else
    <p>ログインしていません。新規登録や受取り状況の変更ををする場合はログインして下さい。</p>
    @endif
    </div>
<p>
{{-- 表示される日付を選択する --}}
<form  action="/order/selectdate" method="post">
    @csrf
    <input type="date" name="selectdate" value="{{$date}}">
    <input type="submit" value="表示日切替">
</form>
{{-- 項目を表示する --}}
      <table class="table">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">受渡し予定日</th>
              <th scope="col">予約者名</th>
              <th scope="col">予約内容</th>
              <th scope="col">数量</th>
              <th scope="col">電話番号</th>
              <th scope="col">受渡し状況</th>
            </tr>
          </thead>
{{-- 指定された日付のレコードを表示する --}}
        <tbody>
            @foreach ($items as $item)
            @if ($item->arrival_date == $date)
            <tr>
              <th scope="row">{{$item->order_id}}</th>
              <td>{{$item->arrival_date}}</td>
              <td>{{$item->vendor}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->memo}}</td>
{{-- 入荷状況によって表示を切り替える --}}
                    <td> @if ($item->flg == 1)
                        @auth
                            <a href="../order/instock/{{$item->order_id}}" onclick="return confirm('来店済みにしますか？')" class="btn btn-warning">未来店</a></td>
                        @else
                        未来店
                        @endauth
                    @else
                        @auth
                        <a href="../order/notinstock/{{$item->order_id}}" onclick="return confirm('未来店にしますか？')" class="btn btn-info">来店済み</a></td>
                    @else
                    来店済み
                    @endauth
                    @endif
                        </td>
                    @auth
                        <td><a href="../order/edit/{{$item->order_id}}" class="btn btn-success">編集</a></td>
                    @endauth
                    </tr>
                @else
            @endif
          @endforeach
        </tbody>
      </table>
</body>
@endsection
