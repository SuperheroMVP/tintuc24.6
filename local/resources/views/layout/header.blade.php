<header>
	<div class="header-top">
		<div class="container">
		<div class="row">
			<div class="logo col-lg-4 col-md-6 col-sm-6 col-6">
				<a href="{{ asset('') }}"><img src="public/images/logo.png" alt=""></a>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
				<div class="login-box">
					@if(Auth::check())
					   <a class="color-main" href="nguoidung"><i class="fas fa-user"></i>{{Auth::user()->name}}</a> / <span><a href="dangxuat">Đăng Xuất</a></span>
					  
					@else
					  <a class="color-main" href="dangnhap">Đăng Nhập</a> / <span><a href="dangki">Đăng Kí</a></span>
					@endif
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
				<div class="search-form">
					<form action="timkiem" method="post">
						@csrf
						<input type="text" name="tukhoa" placeholder="Tìm kiếm...">
						<button type="submit"><span><i class="fas fa-search"></i></span></button>
					</form>
				</div>
			</div>
		</div>
		<div class="icon-toogle ">
			<div class="icon-hamburger">
				<div class="hamburger"></div>
		</div>
	</div>
	</div>
	<div class="header-menu">
			<div class="container">
				<div class="row">
					<div class="menu-main col-lg-12 col-sm-11 text-left">
						<nav>
							<ul>
								<li><a href="{{ asset('') }}" class="active">Trang Chủ</a></li>
								<?php
								   $cate_child =DB::table('postcategoryid')->where('ParentID',0)->get();
								?>
                                @foreach($cate_child as $cate_child_first)
									<li class="sub-menu"><a href="muc-bai-viet/{{ $cate_child_first->id }}/{{ $cate_child_first->Slug }}.html">{{ $cate_child_first->Name }}</a>
										<ul>
											<?php
											    $cate_child_second =DB::table('postcategoryid')->where('ParentID',$cate_child_first->id)->get();
											?>
											@foreach($cate_child_second as $menu_2)
											<li><a href="muc-bai-viet/{{ $menu_2->id }}/{{ $menu_2->Slug }}.html">{{ $menu_2->Name }}</a></li>
											@endforeach
										</ul>
									</li>
									

								@endforeach
								<li><a href="bai-viet-hay">Bài Viết</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
    </div>
</header>