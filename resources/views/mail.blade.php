<!DOCTYPE html>
<html lang="en">
<!-- body -->

<body>

問題標題：{{ $request['title'] }}
<br>
問題內文：{!! html_entity_decode($request['editor']) !!}
<br>
<a href="http://127.0.0.1:8000/questions/{{ $id }}">請點此前往！</a>

</body>

</html>
