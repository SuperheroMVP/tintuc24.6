@extends('layout.index')
@section('tittle','chitietbaiviet')
{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e8c9b23386ff3e8"></script> --}}
@section('content')
<link rel="stylesheet" href="public/css/chitietbaiviet.css">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1874113312718707&autoLogAppEvents=1"></script>
<div id="content-main">
	<div class="site-section">
		<div class="container">
			<div class="row mt-3 mb-3">
				<div class="col-lg-8 single-content">
					<h1 class="mb-4">
						<p class="baiviet">Bài Viết: <span class="name-post">{{ $post->Name }}</span></p>
					</h1>
					<p class="mb-5">
						<img src="public/upload/post/{{ $post->Image }}" alt="Image" class="img-fluid">
					</p>  

					<div class="post-meta d-flex mb-5">
						<div class="vcard">
							{{-- <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span> --}}
							<span class="date-read">{{ $post->created_at }}<span class="mx-1">&bullet;</span> {{ $post->View_Count }} Lượt Xem <span class="icon-star2"></span></span>
{{-- 
							<div class="fb-share-button" data-href="https://localhost/tintuc2" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Flocalhost%2Ftintuc2&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> --}}
							<div class="fb-like" data-href="http://localhost/tintuc/" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
						</div>
					</div>

					<p>{!! $post->Content !!}</p>
					<div class="title-share">
						Nếu thấy hay thì đừng ngại
					</div>
					<div class="share-link">
						<!-- Facebook Share Button -->
						<a class="button_share share facebook" href="http://www.facebook.com/sharer/sharer.php?u=chi-tiet/{{ $post->id }}/{{ $post->Slug }}.html"><i class="fab fa-facebook-f"></i> Facbook</a>
						<!-- Googple Plus Share Button -->
						<a class="button_share share gplus" href="https://plus.google.com/share?url=chi-tiet/{{ $post->id }}/{{ $post->Slug }}.html"><i class="fab fa-google-plus-square"></i>Google+</a>
						<!-- Twitter Share Button -->
						<a class="button_share share twitter" href="http://www.twitter.com/sharer/sharer.php?u=chi-tiet/{{ $post->id }}/{{ $post->Slug }}.html"><i class="fab fa-twitter"></i> Tweeter</a>

					</div>




					<div class="pt-5">
						<!-- <p>Categories:  <a href="#">Design</a>, <a href="#">Events</a>  Tags: <a href="#">#html</a>, <a href="#">#trends</a></p> -->
					</div>
					<div class="container post-same">
						<h2 class="title-post-same">Bài Viết Tương Tự</h2>
						<div class="row">
							@foreach($post_same as $same)
							<div class="col-md-4">	
							    <div class="img-post-same">
							    	<a href="chi-tiet/{{ $same->id }}/{{ $same->Slug }}.html"><img style="width: 200px;max-height: 100px;" src="public/upload/post/{{ $same->Image }}" alt=""></a>
							    </div>					
								<div class="tittle-post-same"><a>{{ $same->Name }}</a></div>
								<div class="post-meta">
									<span class="d-block"><a href="chi-tiet/{{ $same->id }}/{{ $same->Slug }}.html">Đọc Thêm</a></span>
									<p class="date-read mt-1">{{ date("d-m-Y", strtotime($same->created_at)) }}<span class="mx-1">&bullet;
									</span>{{ $same->View_Count}} Lượt Xem</p>
								</div>
							</div>

							@endforeach
						</div>

					</div>


					@if(Auth::check())

					<div class="pt-5">
						<div class="section-title">
							<h2 class="mb-5">{{ count($list_comment) }} Bình luận</h2>
						</div>
						<ul class="comment-list">
							@foreach($post->comment as $cm)
							<li class="comment">
								<div class="comment-body">
									<h3>{{ $cm->user->name }}</h3>
									<div class="meta">{{ $cm->created_at }}</div>
									<p>{{ $cm->Content }}</p>
{{-- 									@if( Auth::user()->authority==1)
									<p><a href="#" class="reply">Reply</a></p>
									@endif	 --}}
								</div>
							</li>
							@endforeach

						</ul>
						<!-- END comment-list -->

						<div class="comment-form-wrap pt-5">
							<div class="section-title">
								<h2 class="mb-5">Nhập bình luận của bạn</h2>
							</div>
							@include('../admin.message')
							<form action="comment/{{$post->id }}" method="post" class="p-5 bg-light">
								@csrf
								<div class="form-group">
									<label for="message">Bình Luận</label>
									<textarea name="Content" id="message" cols="30" rows="8" required="" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="Gửi bình luận" class="btn btn-success py-3">
								</div>

							</form>
						</div>
					</div>
					@else <div style="font-size: 20px;color: #8bc34a;">Đăng Nhập Để Bình Luận Nhé!</div>
					@endif
					<div class="fb-comments" data-href="https://localhost/tintuc2" data-numposts="5" data-width=""></div>
{{-- 					Để tránh tình trạng tất cả các trang cùng comment thì bạn phải làm cho giá trị trong data-href ở đoạn code thứ 2 biến đổi theo từng trang, để làm vậy bạn sẽ dùng javascript nhé!
Đây là đoạn js mình dùng cho website của mình, bạn thử xem nó có thành công trên trang của bạn không nhé: --}}
 <script>
document.getElementsByClassName("fb-comments")[0].setAttribute("data-href", window.location.href);
</script>
				</div>
				<div class="col-lg-4">
					<div class="section-title">
						<h2>Bài Viết Hay</h2>
					</div>
					<?php $stt=1 ?>
					@foreach($list_post_view as $post_view)
					<div class="trend-entry d-flex">
						<div class="number align-self-start">0<?php echo($stt ++);?></div>
						<div class="trend-contents">
							<h2><a href="chi-tiet/{{ $post_view->id }}/{{ $post_view->Slug }}.html">{{ $post_view->Name }}</a></h2>
							<div class="post-meta">
								<span class="d-block"><a href="chi-tiet/{{ $post_view->id }}/{{ $post_view->Slug }}.html">Đọc Thêm</a></span>
								<span class="date-read">{{ $post_view->created_at }}<span class="mx-1">&bullet;</span> {{ $post_view->View_Count }}luợt xem <span class="icon-star2"></span></span>
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
