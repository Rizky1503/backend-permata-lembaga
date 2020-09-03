<div id="m_ver_menu"  class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "  m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		<li class="m-menu__item  {{ set_active('Dashboard.index') }}" aria-haspopup="true" >
			<a  href="{{ route('Dashboard.index') }}" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-line-graph"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Dashboard
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Master Data
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item m-menu__item--submenu {{ set_active_toolbar(['Master.index','Master.mataPelajaran']) }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-layers"></i>
				<span class="m-menu__link-text">
					Master
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
						<span class="m-menu__link">
							<span class="m-menu__link-text">
								Master
							</span>
						</span>
					</li>
					<li class="m-menu__item {{ set_active(['Master.index','Master.mataPelajaran']) }}" aria-haspopup="true" >
						<a  href="{{route('Master.index')}}" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Bank Soal
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>	
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Transaksi
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item  {{ set_active('Dashboard.index') }}" aria-haspopup="true" >
			<a  href="{{ route('Dashboard.index') }}" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-line-graph"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Order
						</span>
						<span class="m-menu__link-badge">
							<span class="m-badge m-badge--danger">
								2
							</span>
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Content
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item {{ set_active(['Content.tambahMateri.index']) }}" aria-haspopup="true" >
			<a  href="" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-diagram"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Tambah Materi
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__item m-menu__item--submenu {{ set_active_toolbar(['Content.SoalGabungan.index', 'Content.SoalBab.index',]) }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
			<a  href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-layers"></i>
				<span class="m-menu__link-text">
					Upload Soal
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu ">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
						<span class="m-menu__link">
							<span class="m-menu__link-text">
								Upload Soal
							</span>
						</span>
					</li>
					<li class="m-menu__item {{ set_active(['Content.SoalGabungan.index']) }}" aria-haspopup="true" >
						<a  href="" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Gabungan
							</span>
						</a>
					</li>
					<li class="m-menu__item {{ set_active(['Content.SoalBab.index']) }}" aria-haspopup="true" >
						<a  href="" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Bab
							</span>
						</a>
					</li>									
				</ul>
			</div>
		</li>
		<li class="m-menu__item {{ set_active(['Content.Ringkasan.index']) }}" aria-haspopup="true" >
			<a  href="" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-diagram"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Upload Ringkasan
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__item {{ set_active(['Content.Video.index']) }}" aria-haspopup="true" >
			<a  href="" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-diagram"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Upload Video
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Report
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item {{ set_active(['Analisis.index']) }}" aria-haspopup="true" >
			<a  href="" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-diagram"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Pelanggan
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__item {{ set_active(['Analisis.index']) }}" aria-haspopup="true" >
			<a  href="" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-diagram"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Materi
						</span>
					</span>
				</span>
			</a>
		</li>		
	</ul>
</div>	