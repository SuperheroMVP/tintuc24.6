@extends('layout.index')
@section('tittle','Home')
@section('content')
<div id="content-main">
	<div class="container mt-5">

		<div id="carouselExampleIndicators" class="carousel slide bg-light" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php $i=0; ?>
				@foreach($list_post_new as $post_new)
				<li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
                     @if($i==0)
                       class="active"
                       @endif
				></li>
				<?php $i++; ?>
                @endforeach
			</ol>
			<div class="carousel-inner ">
				<?php $i=0?>
				@foreach($list_post_new as $post_new)
				<div 

				 @if($i==0) 
				   class="carousel-item active"
                 @else 
                   class="carousel-item"
                   @endif
				 >
				 <?php $i++; ?>
					<!-- <img class="d-block w-100" src="images/imghover8.jpg" alt="First slide"> -->
					<div class="row" data-aos="fade-right" data-aos-once="true">
						<div class=" col-lg-6 col-md-6 col-sm-12" >
							<a href="chi-tiet/{{ $post_new->id }}/{{ $post_new->Slug }}.html"><div class="img-slide" style="background-image: url('public/upload/post/{{ $post_new->Image }}')"></div></a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 p-4">
							<div class="post-entry-slide d-flex">
								<div class="contents-slide">
									<h2><a href="chi-tiet/{{ $post_new->id }}/{{ $post_new->Slug }}.html">{{ $post_new->Name }}</a></h2>
									<div class="post-meta-slide">
										<p class="title-short-slide">{{ $post_new->Description }}</p>
										<span class="d-block read-more"><a href="chi-tiet/{{ $post_new->id }}/{{ $post_new->Slug }}.html">Đọc Thêm</a></span>
										<span class="date-read-slide">{{ $post_new->created_at }}t<span class="mx-1">&bullet;</span>{{ $post_new->View_Count }} Lượt xem<span class="icon-star2"></span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
		<div class="site-section">
			<div class="container">
				<div class="row mt-3 mb-3">
					<div class="col-lg-8" >
						@foreach($post_cate_2 as $cate_2)
						<div class="row">
							<div class="col-12">
								<div class="section-title">
									<a href="muc-bai-viet/{{ $cate_2->id }}/{{ $cate_2->Slug }}.html"><h2>{{ $cate_2->Name }}</h2></a>
								</div>
								<div class="section-title-child">
                                    <?php
											$cate_child =DB::table('postcategoryid')->where('ParentID',$cate_2->id)->get();
											$posts =DB::table('post')->where('PostCategory',$cate_2->id)->take(4)->get();
											$array = $posts->shift();
											$post_first = json_decode( json_encode($array), true); 
									?>
									@foreach($cate_child as $cate_child)
                                   	<span><a href="muc-bai-viet/{{ $cate_child->id }}/{{ $cate_child->Slug }}.html">{{ $cate_child->Name }}</a>/</span>	
                                   	@endforeach						
								</div>


							</div>
							
							<div class="col-md-6" data-aos="fade-right" data-aos-once="true">
								<div class="post-entry-1">
									<a><div class="animate"><img src="public/upload/post/{{ $post_first['Image'] }}" alt="Image" class="img-fluid"></div></a>
									<h2><a href="chi-tiet/{{ $post_first['id'] }}/{{ $post_first['Slug'] }}.html">{{ $post_first['Name'] }}</a></h2>
									<div class="post-meta">
										<p class="title-short">{{ $post_first['Description'] }}</p>
										<span class="d-block"><a href="chi-tiet/{{ $post_first['id'] }}/{{ $post_first['Slug'] }}.html">Đọc Thêm</a>
										<p class="date-read mt-1">{{ date("d-m-Y", strtotime($post_first['created_at'])) }}<span class="mx-1">&bullet;
										</span>{{ $post_first['View_Count'] }} Lượt Xem</p>
									</div>
								</div>

							</div>
							
							<div class="col-md-6" data-aos="fade-up" data-aos-once="true" data-aos-delay="400">
								<?php $i=0?>
								@foreach($posts as $post)
								<div 
								  
									 @if($i==0) 
									   class="post-entry-2 d-flex bg-light"
					                 @else 
					                   class="post-entry-2 d-flex "
					                  @endif
								  >
								  <?php $i++;?>
									<div class="thumbnail animate" style="background-image: url('public/upload/post/{{ $post->Image }}"></div>
									<div class="contents">
										<h2><a>{{ $post->Name }}</a></h2>
										<div class="post-meta">
											<span class="d-block"><a href="chi-tiet/{{ $post->id }}/{{ $post->Slug }}.html">Đọc Thêm</a></span>
                                             <p class="date-read mt-1">{{ date("d-m-Y", strtotime($post->created_at)) }}<span class="mx-1">&bullet;
										</span>{{ $post->View_Count}} Lượt Xem</p>
										</div>
									</div>
								</div>
                                @endforeach

                                <p>
									<a href="muc-bai-viet/{{ $cate_2->id }}/{{ $cate_2->Slug }}.html" class="view-more">Xem tất cả <span class="icon-keyboard_arrow_right"></span></a>
								  </p>
                              
							</div>
						</div>
						@endforeach
						
					</div><!-- col-lg-8 -->
					<div class="col-lg-4" data-aos="fade-up" data-aos-once="true">
						<div class="section-title">
							<h2>Bài Viết Hay</h2>
						</div>

                    <?php $stt=1 ?>
                    @foreach($list_post_view as $post_view)
						<div
						 @if($stt==1) 
						   class="trend-entry d-flex bg-light"
						 @else
                            class="trend-entry d-flex"
                         @endif
						 >
							<div class="number align-self-start">0<?php echo($stt ++);?></div>
							<div class="trend-contents">
								<h2><a href="chi-tiet/{{ $post_view->id }}/{{ $post_view->Slug }}.html">{{ $post_view->Name }}</a></h2>
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
	<div class="site-section subscribe bg-light" data-aos="fade-in" data-aos-once="true">
		<div class="container">
			<form action="#" class="row align-items-center">
				<div class="col-md-4">
					<a href="{{ asset('') }}"><img src="public/images/logo.png" alt=""></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
				</div>
				<div class="col-md-4">
					<h2>Liên Hệ</h2>
					<div class="box-contact-me " style="flex-direction: column;">
						<ul>
							<li><i class="fas fa-map-marker-alt"></i>:<span>Địa Chỉ:Xã Quyết Thắng-TP.Thái Nguyên.</span></li>
							<li><i class="fas fa-phone"></i>:<span>0987 352 124 (8h:00 – 21h:00)</span></li>
							<li><i class="fas fa-envelope"></i>:<span>Email:abc@gmail.com</span></li>
							<li><i class="fab fa-wordpress"></i>:<a href="{{ asset('') }}"><span>Website:www.tintuc.com</span></a></li>
						</ul>

					</div>
				</div>
				<div class="col-md-4 d-flex justify-content-end">
					<img class="img-footer" style="width: 200px;height: auto;" src="public/images/image.png" alt="">
				</div>

			</form>
		</div>
	</div>
</div>
@endsection