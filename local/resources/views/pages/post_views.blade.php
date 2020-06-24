@extends('layout.index')
@section('tittle','Home')
@section('content')
<div id="content-main">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-9" data-aos="fade-up" data-aos-once="true">
            <div class="section-title">
              
              <h2>Bài Viết Hay</h2>
            </div>
            <?php
                $i=0;
            ?>
            @foreach($list_post_views as $post_views)

            <div 
                @if($i==0)
                 class="post-entry-2 d-flex bg-light p-2"
                 @else
                 class="post-entry-2 d-flex p-2"
                 @endif
            >
            <?php $i++;?>
              <div class="humbnail-news order-md-2" style="background-image: url('public/upload/post/{{ $post_views->Image }}')"></div>
              <div class="contents order-md-1 pl-2">
                <h2><a href="chi-tiet/{{ $post_views->id }}/{{ $post_views->Slug }}.html">{{ $post_views->Name }}</a></h2>
                <p class="mb-3">{{ $post_views->Description }}</p>
                <div class="post-meta">
                  <span class="d-block"><a href="chi-tiet/{{ $post_views->id }}/{{ $post_views->Slug }}.html">Đọc thêm</a></span>
                  <span class="date-read">{{ date("d-m-Y", strtotime($post_views->created_at)) }}<span class="mx-1">&bullet;</span>{{ $post_views->View_Count }} Lượt Xem </span>
                </div>
              </div>
            </div>
            @endforeach

          </div>
          <div class="col-lg-3" data-aos="fade-up" data-aos-once="true">
            <div class="section-title">
              <h2>Bài Viết Mới</h2>
            </div>
            <?php $i=1; ?>

            @foreach($list_post_new as $post_new)
            <div class="trend-entry d-flex">
              <div class="number align-self-start">0<?php echo($i++) ?></div>
              <div class="trend-contents">
                 <h2><a href="chi-tiet/{{ $post_new->id }}/{{ $post_new->Slug }}.html">{{ $post_new->Name }}</a></h2>
                <div class="post-meta">
                  <span class="d-block"><a href="chi-tiet/{{ $post_new->id }}/{{ $post_new->Slug }}.html">Đọc thêm</a></span>
                   <span class="date-read">{{ date("d-m-Y", strtotime($post_new->created_at)) }}<span class="mx-1">&bullet;</span>{{ $post_new->View_Count }} Lượt Xem </span>
                </div>
              </div>
            </div>
            @endforeach

            
          </div>
        </div>

        <div class="row">
          {{ $list_post_views->links() }}
        </div>
      </div>
    </div>
	<!-- END section -->

</div>
@endsection