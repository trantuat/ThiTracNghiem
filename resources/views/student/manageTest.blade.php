@extends('layouts.student.app')
@section('title_page')
<title>Chọn lựa bài thi</title>
@endsection
@section('content')
@if (isset($error)) 
<script language='javascript'>
  window.confirm("{{$error}}");
</script>
@endif
@endsection