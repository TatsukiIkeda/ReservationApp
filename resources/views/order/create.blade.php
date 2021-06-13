@extends("layouts.app")
@section("content")

<h1>予約情報入力フォーム</h1>
<body>
{{-- 予定入力フォーム --}}
    <form action="/order/create" method="post">
        @csrf

        <form class="row g-3">
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">受渡し予定日</label>
              <input type="date" name="arrival_date" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress" class="form-label">予約者名</label>
              <input type="text" name="vendor" class="form-control" id="inputAddress" placeholder="" required>
            </div>
            <div class="col-md-6">
              <label for="inputAddress2" class="form-label">予約内容</label>
              <input type="text" name="title" class="form-control" id="inputAddress2" placeholder="" required>
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">数量</label>
                <input type="text" name="quantity" class="form-control" id="inputAddress2" placeholder="">
              </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">電話番号</label>
              <input type="text" name="memo" class="form-control" id="inputCity">
            </div>
{{-- 入力した項目を送信 --}}
            <div class="col-12">
              <button  type="submit" value="send" class="btn btn-success">登録</button>
            </div>
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
{{-- 保存されているレコードを表示する --}}
        <tbody>
            @foreach ($items as $item)
          <tr>
            <th scope="row">{{$item->order_id}}</th>
            <td>{{$item->arrival_date}}</td>
            <td>{{$item->vendor}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->memo}}</td>
            <td> @if ($item->flg == 1)
                未来店
               @else
               来店済み
           @endif</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection
