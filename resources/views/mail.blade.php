<!DOCTYPE html>
<html lang="en">
<!-- body -->

<body>
問題標題：{{ $request['title'] }}
<br>
問題內文：{{ html_entity_decode($request['editor']) }}

</body>

</html>
