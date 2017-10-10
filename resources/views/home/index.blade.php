@extends('layouts.home.app')
@section('title_page')
<title>Trang chủ</title>
@endsection
@section('carousel')
<div id="myCarousel" class="carousel slide" data-ride="carousel" style = "width: 100%;">
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="first-slide" src="img/slide-1.jpg" alt="First slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-left">
        <h1 class="">Thành công chỉ đến với những người luôn bận rộn tìm nó</h1>
        <p><a class="btn btn-lg btn-primary" href="Login" role="button">Thi Thử</a></p>
        <!-- <p>.</p> -->
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <img class="second-slide" src="img/slide-2.jpg" alt="Second slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block ">
        <h1>Điều quan trọng không phải vị trí đứng mà là hướng đi.</h1>
        <p><a class="btn btn-lg btn-primary" href="Login" role="button">Thi Thử</a></p>
        <!-- <p>Điều quan trọng không phải vị trí đứng mà là hướng đi.</p> -->
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <img class="third-slide" src="img/slide-1.jpg" alt="Third slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-right">
        <h1>Thất bại đơn giản chỉ là cơ hội để bắt đầu lại mọi thứ thông minh hơn.</h1>
        <p><a class="btn btn-lg btn-primary" href="Login" role="button">Thi Thử</a></p>
        <!-- <p>Thất bại đơn giản chỉ là cơ hội để bắt đầu lại mọi thứ thông minh hơn.</p> -->
      </div>
    </div>
  </div>
</div>
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
@endsection

@section('content')

<div class="container-fluid">

    <!-- Introduction Row -->
    <h1 class="my-4">Giới thiệu
    </h1>
    <p>Luyện thi trắc nghiệm là website được xây dựng nhằm giúp cho học sinh luyện tập quen dần với hình thức trắc nghiệm nhiều đáp án. Sau khi làm bài các bạn học sinh sẽ biết điểm, lỗ hổng kiến thức ở từng môn. Qua đó cũng cố và hệ thống cho ra những đáp án chính xác để học sinh có thể tự luyện tập và nâng cao kiến thức cho bản thân.</p>

    <!-- Team Members Row -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="my-4"></h1></br>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-1.jpg" alt=""></br>
        <h3>Trần Văn Tuất
          <small>20/20</small>
        </h3>
        <p>Don't complain</p>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-2.jpg" alt=""></br>
        <h3>Lê Hải Nghi
          <small>20/20</small>
        </h3>
        <p>Học, học nữa, học mãi!</p>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-3.jpg" alt=""></br>
        <h3>Lê Thị Hiếu
          <small>20/20</small>
        </h3>
        <p>Có công mài sắt có ngày nên kim</p>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-4.jpg" alt=""></br>
        <h3>Nguyễn Quang Triều
          <small>20/20</small>
        </h3>
        <p>I can do it!</p>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-5.jpg" alt=""></br>
        <h3>Đặng Vương Dũng
          <small>20/20</small>
        </h3>
        <p>Nghị lực và bền bĩ có thể chinh phục mọi thứ</p>
      </div>
      <div class="col-lg-4 col-sm-6 text-center mb-4">
        <img class="rounded-circle img-fluid d-block mx-auto" src="img/ava-6.jpg" alt=""></br>
        <h3>Nguyễn Văn Tín
          <small>20/20</small>
        </h3>
        <p>Don't give up</p>
      </div>
    </div>

  </div>
  
@endsection
