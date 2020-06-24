@extends('layout.index')
@section('tittle','Home')
@section('content')
<div id="content-main">
	<div class="site-section">
		<div class="container">
			<div class="row mt-2 mb-2">
				<?php
                    function changecolor($str,$tukhoa)
                    {
                    	return str_replace($tukhoa,"<span style='color:red'>$tukhoa</span>", $str);
                    }
				?>
				<div class="col-lg-8">
					<div class="row">
						<div class="col-12">
							<div class="section-title mb-2">
								<h2>Tìm kiếm:{{ $tukhoa}}</h2><span class="count-post">Tìm thấy: {{ count($list_post_looking) }} bài viết</span>
							</div>
						</div>
						<div class="col-md-12">
							@foreach($list_post_looking as $post)
							<div class="post-entry-1 mt-1">
								<a href="chi-tiet/{{ $post->id }}/{{$post->Slug }}.html"><img src="public/upload/post/{{ $post->Image }}" alt="Image" class="img-fluid-post"></a>
								<h2><a href="chi-tiet/{{ $post->id }}/{{$post->Slug }}.html">{!! changecolor($post->Name,$tukhoa) !!}</a></h2>
								<p class="title-short">{!! changecolor($post->Description,$tukhoa) !!}</p>
								<div class="post-meta">
									<span class="d-block"><a href="chi-tiet/{{ $post->id }}/{{$post->Slug }}.html">Đọc Thêm</a></span>
									<span class="date-read">{{ $post->created_at }}<span class="mx-1">&bullet;</span>{{ $post->View_Count }} Luợt Xem<span class="icon-star2"></span></span>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="row">
						{{ $list_post_looking->links() }}
					</div>

				</div><!-- col-lg-8 -->
				<div class="col-lg-4">
					<div class="section-title">
						<h2>Bài Viết Hay</h2>
					</div>
                    <?php $stt=1 ?>
                    @foreach($list_post_view as $post_view)
						<div class="trend-entry d-flex">
							<div class="number align-self-start">0<?php echo($stt ++);?></div>
							<div class="trend-contents">
								<h2><a href="chi-tiet/{{ $post_view->id }}/{{ $post_view->Slug }}.html">{{ $post_view->Description }}</a></h2>
								<div class="post-meta">
									<span class="d-block"><a href="chi-tiet/{{ $post_view->id }}/{{ $post_view->Slug }}.html">Đọc Thêm</a></span>
									<span class="date-read">{{ date("d-m-Y", strtotime($post_view->created_at)) }}<span class="mx-1">&bullet;</span> {{ $post_view->View_Count }}luợt xem </span>
								</div>
							</div>
						</div>
					@endforeach

						<p>
							<a href="bai-viet-hay" class="view-more">Xem tất cả <span class="icon-keyboard_arrow_right"></span></a>
						</p>

				</div><!-- col-lg-4 -->
			</div><!-- end roư main -->	
		</div><!-- site-scction -->	
	</div>
	<!-- END section -->

</div>
@endsection