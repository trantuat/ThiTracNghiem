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
    <h1 class="my-4">TOP
    </h1>
   <!--  <p>Luyện thi trắc nghiệm là website được xây dựng nhằm giúp cho học sinh luyện tập quen dần với hình thức trắc nghiệm nhiều đáp án. Sau khi làm bài các bạn học sinh sẽ biết điểm, lỗ hổng kiến thức ở từng môn. Qua đó cũng cố và hệ thống cho ra những đáp án chính xác để học sinh có thể tự luyện tập và nâng cao kiến thức cho bản thân.</p> -->

    <!-- Team Members Row -->
    <!-- <div class="row">
      <div class="skill-home-solid clearfix col-lg-12 col-sm-offset-1">

        <div class="text-center col-sm-15">
          <span class="icons c1">              
          <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/toan.png" title="Toán">
          </span>
          <div class="box-area">
          <h3 class="subject-title">Toán học</h3>
            <p class="p-subject">
                 Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
            </p>
            <p class="exam-now">
            <a href="javascript:examNow('1')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
            </p>
          </div>
        </div>
        <div class="text-center col-sm-15">
          <span class="icons c1">              
          <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/sinh.png" title="Sinh">
          </span>
          <div class="box-area">
          <h3 class="subject-title">Sinh Học</h3>
            <p class="p-subject">
                 Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
            </p>
            <p class="exam-now">
            <a href="javascript:examNow('1')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
            </p>
          </div>
        </div>
        <div class="text-center col-sm-15">
          <span class="icons c1">              
          <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/anh.png" title="Anh văn">
          </span>
          <div class="box-area">
          <h3 class="subject-title">Tiếng Anh</h3>
            <p class="p-subject">
                 Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
            </p>
            <p class="exam-now">
            <a href="javascript:examNow('1')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
            </p>
          </div>
        </div>
        
        
        <div class="text-center col-sm-15">
                            <span class="icons c2">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/ly.png" title="Lý">
                            </span> <div class="box-area">
                                <h3 class="subject-title">Vật lý</h3>
                                <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p>
                                <p class="exam-now">
                                    <a href="javascript:examNow('6')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
        </div>
        <div class="text-center col-sm-15">
                            <span class="icons c3">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/hoa.png" title="Hóa">
                            </span> 
                            <div class="box-area">
                                <h3 class="subject-title">Hóa học</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('7')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
      </div>
      <div class="skill-home-solid clearfix col-lg-12 col-sm-offset-1">
        <div class="text-center col-sm-15">
                            <span class="icons c4">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/lichsu.png" title="Lịch sử">
                            </span> <div class="box-area">
                                <h3 class="subject-title">Lịch Sử</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('9')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
        <div class="text-center col-sm-15">
                            <span class="icons c4 c5">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/dialy.png" title="Địa lý">
                            </span> <div class="box-area">
                                <h3 class="subject-title">Địa lý</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('8')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
          <div class="text-center col-sm-15">
                            <span class="icons c4 c5">
                                <img class=" rounded-circle subject-icon" src="https://www.caldicotschool.com/wp-content/uploads/2016/02/icons760_r11_c5-300x300.jpg" title="Địa lý">
                            </span> <div class="box-area">
                                <h3 class="subject-title">Tin Học</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('8')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
          <div class="text-center col-sm-15">
                            <span class="icons c4 c5">
                                <img class="rounded-circle subject-icon" src="https://st2.depositphotos.com/3102403/7923/v/950/depositphotos_79232506-stock-illustration-flat-books-with-bookmarks-circle.jpg" title="Ngữ văn">
                            </span> <div class="box-area">
                                <h3 class="subject-title">Ngữ Văn</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('8')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
          <div class="text-center col-sm-15">
                            <span class="icons c4 c5">
                                <img class=" rounded-circle subject-icon" src="http://www.pacific.edu/Images/school-education/Icons%202016/Picture7.png" title="Địa lý">
                            </span> <div class="box-area">
                                <h3 class="subject-title">GDCD</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('8')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>              
      </div>
   
    </div>
    </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="aligncenter">
                    <h3 class="aligncenter">Tại sao bạn nên Luyện thi trắc nghiệm trực tuyến với 789.vn?</h3>
                    <div class="why">
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-online">
                            <p>Thi trực tuyến mọi lúc mọi nơi, dễ dàng thao tác, tương thích trên nhiều thiết bị smartphone</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-bank">
                            <p>Ngân hàng câu hỏi phong phú, đa dạng cách thức ra đề thi, được xây dựng bởi hơn 50 chuyên gia hàng đầu trong lĩnh vực giáo dục phổ thông</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-program">
                            <p>Câu hỏi được sắp xếp rõ ràng thành từng chương, theo từng khối lớp, có đáp án và lời giải chi tiết cho từng câu</p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-people">
                            <p>Nội dung bán sát chương trình thi của Bộ giáo dục và đào tạo, được cập nhật và hiệu chỉnh hàng ngày</p>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div> -->




            <section id="content">
        <div class="container">
            <div class="row">
                <div class="skill-home">
                    <div class="skill-home-solid clearfix col-lg-12">
                        <div class="text-center col-sm-15">
                            <span class="icons c1">
                            
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/toan.png" title="Toán"/>
                            </span>
                            <div class="box-area">
                                <h3 class="subject-title">Toán học</h3>
                                <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
                                </p>
                                <p class="exam-now">
                                    <a href="javascript:examNow('1')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
                        <div class="text-center col-sm-15">
                            <span class="icons c2">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/ly.png" title="Lý"/>
                            </span> <div class="box-area">
                                <h3 class="subject-title">Vật lý</h3>
                                <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p>
                                <p class="exam-now">
                                    <a href="javascript:examNow('6')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
                        <div class="text-center col-sm-15">
                            <span class="icons c3">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/hoa.png" title="Hóa" />
                            </span> <div class="box-area">
                                <h3 class="subject-title">Hóa học</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('7')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
                        <div class="text-center col-sm-15">
                            <span class="icons c4">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/sinh.png" title="Sinh" />
                            </span> <div class="box-area">
                                <h3 class="subject-title">Sinh học</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('9')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
                        <div class="text-center col-sm-15">
                            <span class="icons c4 c5">
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/anh.png" title="Anh văn" />
                            </span> <div class="box-area">
                                <h3 class="subject-title">Tiếng anh</h3> <p class="p-subject">
                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                </p><p class="exam-now">
                                    <a href="javascript:examNow('8')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="margin:5px;">&nbsp;</div>
                    <div class="skill-home-solid clearfix col-lg-12">
                        <table style="width:100%; border:none">
                            <tr>
                                <td class="td-home" style="text-align:center">
                                    <div class="text-center col-lg-6 col-sm-12 div-home div-home-1">
                                        <span class="icons c4 c6">
                                            
                                            <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/lichsu.png" title="Lịch sử" />
                                        </span> <div class="box-area">
                                            <h3 class="subject-title">Lịch sử</h3> <p class="p-subject">
                                                Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                            </p><p class="exam-now">
                                                <a href="javascript:examNow('10')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td-home" style="text-align:center">
                                    <div class="text-center col-lg-6 col-sm-12 div-home div-home-2">
                                        <span class="icons c4 c7">
                                            
                                            <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/dialy.png" title="Địa lý" />
                                        </span> <div class="box-area">
                                            <h3 class="subject-title">Địa lý</h3> <p class="p-subject">
                                                Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                            </p><p class="exam-now">
                                                <a href="javascript:examNow('11')" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>









  </div>
@endsection
