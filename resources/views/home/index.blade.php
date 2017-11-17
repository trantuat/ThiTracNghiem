@extends('layouts.home.app')
@section('title_page')
<title>Trang chủ</title>
@endsection
@section('carousel')
<div id="myCarousel" class="carousel slide " data-ride="carousel" style = "width: 100%; margin-bottom:0px;" >
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
       
      </div>
    </div>
  </div>
  
  <div class="carousel-item" >
    <img class="third-slide" src="img/slide-5.jpg" alt="Second slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-right">
        <h1>Thất bại đơn giản chỉ là cơ hội để bắt đầu lại mọi thứ thông minh hơn</h1>
        
      </div>
    </div>
  </div>
  <div class="carousel-item">
    <img class="third-slide" src="img/slide-4.jpg" alt="Fourth slide">
    <div class="container">
      <div class="carousel-caption d-none d-md-block text-right">
        <h1>Thà học muộn còn hơn không bao giờ học</h1>
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
    <div id="content" style="background: #EFEFEF;">
        <div class="container">
            <div class="row text-center" style="margin-bottom: 0;">
                <h3>LUYỆN THI TRẮC NGHIỆM 2017</h3>
            </div>
            <div class="row screen-desktop">
                <div class="col-md-12">
                    <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            <div class="item active" >
                                <div class="row">
                                <?php 
                                $i=0;
                                $j=1;
                                while ($i<4){
                                ?>   
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                    <span class="icons <?php echo 'c'.$j ;?>">
                                                        <?php
                                                            switch ($data[$i]['topic_name']){
                                                                case "Toán": echo "<img class='subject-icon' src='img/toan.png' title='Toán'/>"; break;
                                                                case "Vật Lý": echo "<img class='subject-icon' src='img/ly.png' title='Lý'/>"; break;
                                                                case "Hóa Học": echo "<img class='subject-icon' src='img/hoa.png' title='Hoá'/>"; break;
                                                                case "Sinh Học": echo "<img class='subject-icon' src='img/sinh.png' title='Sinh'/>"; break;
                                                                
                                                            }
                                                        ?>
                                                    </span>
                                                
                                                    <div class="box-area">
                                                        <h3 class="subject-title">
                                                        <?php
                                                            switch ($data[$i]['topic_name']){
                                                                case "Toán": echo "Toán Học"; break;
                                                                case "Vật Lý": echo "Vật Lý"; break;
                                                                case "Hóa Học": echo "Hóa Học"; break;
                                                                case "Sinh Học": echo "Sinh học"; break;
                                                                
                                                            }
                                                        ?>
                                                        </h3>
                                                        <p class="p-subject">
                                                            Hệ thống câu hỏi <b><?php echo $data[$i]['topic_name'] ?></b> đa dạng phong phú, được xắp sếp ngẫu nhiên từ dễ đến khó, bấm <b>"Thi Ngay"</b> để trải nghiệm
                                                        </p>
                                                        <p class="exam-now">
                                                            <?php 
                                                                echo "<center><a href='/Login' ><button class='btn btn-success'>Thi ngay</button></a></center>";
                                                                $i++;
                                                                $j++;
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <?php 
                                    while ($i>=4 && $i<8){
                                    ?>   
                                    <div class="col-md-3">
                                        <div class="skill-home">
                                            <div class="skill-home-solid">
                                                <div class="text-center col-md-12 subject-card">
                                                <span class="icons <?php echo 'c'.$j ;?>">
                                                    <?php
                                                        switch ($data[$i]['topic_name']){
                                                            case "Tiếng Anh": echo "<img class='subject-icon' src='img/anh.png' title='Anh'/>"; break;
                                                            case "Lịch Sử": echo "<img class='subject-icon' src='img/lichsu.png' title='Sử'/>"; break;
                                                            case "Địa Lý": echo "<img class='subject-icon' src='img/dialy.png' title='Địa'/>"; break;
                                                            case "Ngữ Văn": echo "<img class='subject-icon' src='img/nguvan.png' title='Ngữ Văn'/>"; break;
                                                        }
                                                    ?>
                                                </span>
                                                    <div class="box-area">
                                                    <h3 class="subject-title">
                                                    <?php
                                                    switch ($data[$i]['topic_name']){
                                                        case "Tiếng Anh": echo "Tiếng Anh"; break;
                                                        case "Lịch Sử": echo "Lịch Sử"; break;
                                                        case "Địa Lý": echo "Địa Lý"; break;
                                                        case "Ngữ Văn": echo "Ngữ Văn"; break;
                                                        
                                                    }
                                                    ?></h3> 
                                                    <p class="p-subject">
                                                    Hệ thống câu hỏi <b><?php echo $data[$i]['topic_name']?></b> đa dạng phong phú, được xắp sếp ngẫu nhiên từ dễ đến khó, bấm <b>"Thi Ngay"</b> để trải nghiệm
                                                    
                                                    </p>
                                                    <p class="exam-now">
                                                    <?php 
                                                         echo "<center><a href='/Login' ><button class='btn btn-success '>Thi ngay</button></a></center>";
                                                        $i++;
                                                        $j--;
                                                    ?>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <a data-slide="prev" href="http://789.vn/#media" class="left carousel-control">‹</a>
                        <a data-slide="next" href="http://789.vn/#media" class="right carousel-control">›</a>
                    </div>
                </div>
            </div>  
            <div class="row screen-mobile">
                    <div class="col-md-12">
                        <div class="carousel slide media-carousel" id="media-mobile">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="skill-home">
                                                <div class="skill-home-solid">
                                                    <div class="text-center col-md-12 subject-card">
                                                <span class="icons c1">
                                                
                                                    <img class="subject-icon" src="img/toan.png" title="Toán">
                                                </span>
                                                        <div class="box-area">
                                                            <h3 class="subject-title">Toán học</h3>
                                                            <p class="p-subject">
                                                                Đề thi THPT Quốc gia gồm 50 câu, thời gian thi 90 phút
                                                            </p>
                                                            <p class="exam-now">
                                                                <center><a href="#" ><button class='btn btn-success '>Thi ngay</button></a></center>"
                                                                
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
                                        <div class="col-sm-12">
                                            <div class="skill-home">
                                                <div class="skill-home-solid">
                                                    <div class="text-center col-md-12 subject-card">
                                                    <span class="icons c2">
                                                        
                                                        <img class="subject-icon" src="img/dialy.png" title="Địa lý">
                                                    </span> <div class="box-area">
                                                        <h3 class="subject-title">Địa lý</h3> <p class="p-subject">
                                                        Đề thi THPT Quốc gia gồm 40 câu, thời gian thi 50 phút
                                                    </p>
                                                    <p class="exam-now">
                                                        <center><a href="#" ><button class='btn btn-success '>Thi ngay</button></a></center>
                                                    </p>
                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a data-slide="prev" href="http://789.vn/#media" class="left carousel-control screen-desktop">‹</a>
                            <a data-slide="next" href="http://789.vn/#media" class="right carousel-control screen-desktop">›</a>
                            <a data-slide="prev" href="http://789.vn/#media-mobile" class="left carousel-control screen-mobile">‹</a>
                            <a data-slide="next" href="http://789.vn/#media-mobile" class="right carousel-control screen-mobile">›</a>
                        </div>
                    </div>          
    </div>
</div>
   
<section class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="aligncenter">
                    <h3 class="aligncenter">Tại sao bạn nên Luyện thi trắc nghiệm với NTT Team?</h3>
                    <div class=" screen-d why ">
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-online">
                            <img src="{{URL::asset('img/why_3.png')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Thi trực tuyến mọi lúc mọi nơi, dễ dàng thao tác.</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-bank">
                            <img src="{{URL::asset('img/why_1.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Ngân hàng câu hỏi phong phú, đa dạng cách thức ra đề thi, được xây dựng bởi hơn 50 chuyên gia hàng đầu trong lĩnh vực giáo dục</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-bank">
                            <img src="{{URL::asset('img/why_2.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Câu hỏi được sắp xếp rõ ràng thành từng chương, theo từng khối lớp, có đáp án và lời giải chi tiết cho từng câu</p>
                            <br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 why-icon why-icon-people">
                            <img src="{{URL::asset('img/why_4.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Nội dung bám sát chương trình thi của Bộ giáo dục và đào tạo, được cập nhật và hiệu chỉnh hàng ngày</p>
                            <br>
                        </div>
                        
                    </div>

                    <div class="screen-m why aligncenter">
                        <div class="col-md-12 col-sm-12 col-xs-6 why-icon why-icon-online" >
                            <img src="{{URL::asset('img/why_3.png')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Thi trực tuyến mọi lúc mọi nơi, dễ dàng thao tác.</p>
                            <br>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6 why-icon why-icon-bank">
                            <img src="{{URL::asset('img/why_1.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Ngân hàng câu hỏi phong phú, đa dạng cách thức ra đề thi, được xây dựng bởi hơn 50 chuyên gia hàng đầu trong lĩnh vực giáo dục</p>
                            <br>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6 why-icon why-icon-program">
                            <img src="{{URL::asset('img/answer.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
                            <p>Câu hỏi được sắp xếp rõ ràng thành từng chương, theo từng khối lớp, có đáp án và lời giải chi tiết cho từng câu</p>
                            <br>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6 why-icon why-icon-people">
                            <img src="{{URL::asset('img/why_4.jpg')}}" width="150px" height="150px" class="rounded-circle" style="margin: 30px 0px 40px 0px">
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
