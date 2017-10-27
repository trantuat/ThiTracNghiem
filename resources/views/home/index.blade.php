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
        <p><a class="btn btn-lg btn-success" href="Login" role="button">Thi Thử</a></p>
        <!-- <p>.</p> -->
      </div>
    </div>
  </div>
  
  <div class="carousel-item">
    <img class="third-slide" src="img/slide-5.jpg" alt="Second slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-right">
        <h1>Thất bại đơn giản chỉ là cơ hội để bắt đầu lại mọi thứ thông minh hơn</h1>
        <p><a class="btn btn-lg btn-success" href="Login" role="button">Thi Thử</a></p>
        <!-- <p>Thất bại đơn giản chỉ là cơ hội để bắt đầu lại mọi thứ thông minh hơn.</p> -->
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <img class="third-slide" src="img/slide-4.jpg" alt="Fourth slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-right">
        <h1>Thà học muộn còn hơn không bao giờ học</h1>
        <p><a class="btn btn-lg btn-success" href="Login" role="button">Thi Thử</a></p>
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

    <form method="post" action="thitracnghiem" id="frmExam" name="frmExam">
    <div id="content" style="background: #EFEFEF;">
        <div class="container">
            <div class="row text-center" style="margin-bottom: 0;">
                <h3>LUYỆN THI TRẮC NGHIỆM 2017</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c1">
                            
                                <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/toan.png" title="Toán"/>
                            </span>
                                                
                                                    <div class="box-area">
                                                        <h3 class="subject-title">Toán học</h3>
                                                        <p class="p-subject">
                                                            Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
                                                        </p>
                                                        <p class="exam-now">
                                                            <a href="javascript:examNow(&#39;1&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c2">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/ly.png" title="Lý">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Vật lý</h3>
                                                    <p class="p-subject">
                                                        Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p>
                                                    <p class="exam-now">
                                                        <a href="javascript:examNow(&#39;6&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c3">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/hoa.png" title="Hóa">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Hóa học</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p><p class="exam-now">
                                                        <a href="javascript:examNow(&#39;7&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c4">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/sinh.png" title="Sinh">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Sinh học</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p><p class="exam-now">
                                                        <a href="javascript:examNow(&#39;9&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c4 c5">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/anh.png" title="Anh văn">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Tiếng anh</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                                    </p><p class="exam-now">
                                                        <a href="javascript:examNow(&#39;8&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c3">
                                                        
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/lichsu.png" title="Lịch sử">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Lịch sử</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p><p class="exam-now">
                                                        <a href="javascript:examNow(&#39;10&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c2">
                                                        
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/dialy.png" title="Địa lý">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Địa lý</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p><p class="exam-now">
                                                        <a href="javascript:examNow(&#39;11&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c4">
                                                        <img class="rounded-circle subject-icon" src="https://www.caldicotschool.com/wp-content/uploads/2016/02/icons760_r11_c5-300x300.jpg" title="Tin học">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Tin học</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                </p><p class="exam-now">
                                                    <a href="javascript:examNow(&#39;9&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                <span class="icons c1">
                                                
                                                    <img class="rounded-circle subject-icon" src="https://i0.wp.com/www.acegamsat.com/wp-content/uploads/2016/06/GAMSAT-Essay-Questions.png?resize=400%2C400&ssl=1" title="Sinh học">
                                                </span>
                                                    <div class="box-area">
                                                        <h3 class="subject-title">Ngữ Văn</h3>
                                                        <p class="p-subject">
                                                            Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
                                                        </p>
                                                        <p class="exam-now">
                                                            <a href="javascript:examNow(&#39;1&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c2">
                                                        <img class="subject-icon" src="http://www.pacific.edu/Images/school-education/Icons%202016/Picture7.png" title="gdcd">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">GDCD</h3>
                                                    <p class="p-subject">
                                                        Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p>
                                                    <p class="exam-now">
                                                        <a href="javascript:examNow(&#39;6&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c3">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/hoa.png" title="Hóa">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Hóa học</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                </p><p class="exam-now">
                                                    <a href="javascript:examNow(&#39;7&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c4 c5">
                                                        <img class="subject-icon" src="http://789.vn/Content/nganhangdethi/img/anh.png" title="Anh văn">
                                                    </span> <div class="box-area">
                                                    <h3 class="subject-title">Tiếng anh</h3> <p class="p-subject">
                                                    Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 60 phút
                                                </p><p class="exam-now">
                                                    <a href="javascript:examNow(&#39;8&#39;)" class="btn btn-medium btn-theme btn-exam-now">Thi ngay</a>
                                                </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="http://789.vn/#media" class="left carousel-control">‹</a>
                        <a data-slide="next" href="http://789.vn/#media" class="right carousel-control">›</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="subjectId" name="subjectId">
    <input type="hidden" id="hidden_class" name="hidden_class" value="3">
    <input type="hidden" id="ExamType" name="ExamType" value="thptqg">
</form>
<script>
    function examNow(subjectId) {
        $('#subjectId').val(subjectId);
        $('#frmExam').submit();
    }
</script>
<section class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="aligncenter">
                    <h3 class="aligncenter">Tại sao bạn nên Luyện thi trắc nghiệm với TNT Team?</h3>
                    <div class="why">
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-online">
                            <img src="img/why_3.png" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Thi trực tuyến mọi lúc mọi nơi, dễ dàng thao tác.</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-bank">
                            <img src="img/why_1.jpg" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Ngân hàng câu hỏi phong phú, đa dạng cách thức ra đề thi, được xây dựng bởi hơn 50 chuyên gia hàng đầu trong lĩnh vực giáo dục</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-program">
                            <img src="img/why_rr.jpg" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Câu hỏi được sắp xếp rõ ràng thành từng chương, theo từng khối lớp, có đáp án và lời giải chi tiết cho từng câu</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-people">
                            <img src="img/why_4.jpg" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Nội dung bám sát chương trình thi của Bộ giáo dục và đào tạo, được cập nhật và hiệu chỉnh hàng ngày</p>
                            <br>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
