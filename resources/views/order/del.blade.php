@extends("layouts.app")
@section("content")
<div class="btn-group" role="group" aria-label="Basic example">
    <button id="square_btn" onClick="history.back()" class="btn btn-secondary">一覧に戻る</button>
    </div>
<tbody>
<h1>削除内容確認画面</h1>

   <form action="/order/del/" method="post">
    @csrf
    <ul class="list-group">
        <input type="text" name="order_id" class="form-control" id="inputPassword4" value="{{$item->order_id}}" readonly>
        <li class="list-group-item">予約No:{{$item->order_id}}</li>
        <li class="list-group-item">入荷予定日:{{$item->arrival_date}}</li>
        <li class="list-group-item">仕入れ先:{{$item->arrival_date}}</li>
        <li class="list-group-item">入荷内容:{{$item->title}}</li>
        <li class="list-group-item">数量:{{$item->quantity}}</li>
        <li class="list-group-item">詳細:{{$item->memo}}</li>
      </ul>
        <div class="col-12">
          <button  type="submit" value="send" class="btn btn-primary">削除</button>
        </div>
      </form>

</tbody>
</table>
@endsection
