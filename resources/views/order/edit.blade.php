@extends("layouts.app")
@section("content")

<tbody>
<h1>内容編集画面</h1>
{{-- レコード削除ボタン --}}
<form action="/order/del/" method="post">
    @csrf
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button  type="submit" value="{{$item->order_id}}" name="order_id" class="btn btn-danger" onclick="return confirm('このレコードを削除しますか？')">削除</button>
        </div>
      </form>
{{-- 入荷状況によって表示を切り替える --}}
受渡し状況:<td>
        @if ($item->flg == 1)
            <a href="../instock/{{$item->order_id}}" class="btn btn-warning" onclick="return confirm('来店済みにしますか？')">未来店</a></td>
        @else
            <a href="../notinstock/{{$item->order_id}}" class="btn btn-info" onclick="return confirm('未来店にしますか？')">来店済み</a></td>
    </td>
@endif</td>
{{-- 選択したレコードをinputタグに表示 --}}
   <form action="/order/edit" method="post">
    @csrf
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">予約No</label>
            <input type="text" name="order_id" class="form-control" id="inputPassword4" value="{{$item->order_id}}" readonly>
        </div>

            <div class="col-md-6">
            <label for="inputPassword4" class="form-label">登録者</label>
            <input type="text" name="order_name" class="form-control" id="inputPassword4" value="{{$item->order_name}}" readonly>
        </div>

        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">受渡し予定日</label>
          <input type="date" name="arrival_date" class="form-control" id="inputPassword4" value="{{$item->arrival_date}}">
        </div>

        <div class="col-md-6">
          <label for="inputAddress" class="form-label">予約者名</label>
          <input type="text" name="vendor" class="form-control" id="inputAddress" placeholder="" value="{{$item->vendor}}">
        </div>

        <div class="col-md-6">
          <label for="inputAddress2" class="form-label">予約内容</label>
          <input type="text" name="title" name="Vendor" class="form-control" id="inputAddress2"  value="{{$item->title}}">
        </div>

        <div class="col-md-6">
            <label for="inputCity" class="form-label">数量</label>
            <input type="text" name="quantity" class="form-control" id="inputCity" value="{{$item->quantity}}">
        </div>

        <div class="col-md-6">
          <label for="inputCity" class="form-label">電話番号</label>
          <input type="text" name="memo" class="form-control" id="inputCity" value="{{$item->memo}}">
        </div>
        <div class="col-md-6">
          <button  type="submit" value="send" class="btn btn-success">修正</button>
        </div>
      </form>
    </tr>
    </tr>
    </tbody>
    </table>

@endsection
