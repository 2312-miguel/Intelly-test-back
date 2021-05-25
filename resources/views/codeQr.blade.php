<!DOCTYPE html>
<html>

<head></head>

<body>
  <p>{{ $name }}</p>
  <p>{{ $code }}</p>
  <img src="{{ $message->embedData($code, 'QR.png') }}" />
</body>

</html>