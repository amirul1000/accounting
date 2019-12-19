<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu" data-keep-expanded="false"
			data-auto-scroll="true" data-slide-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler"></div> <!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<!--<li class="sidebar-search-wrapper">
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
				</li>-->
			<li class="start"><a href="../login/login_enter.php"> <i
					class="icon-home"></i> <span class="title">Home</span>
			</a></li>
			<li class="start active open"><a href="javascript:;"> <i
					class="fa fa-cogs"></i> <span class="title">Menu</span> <span
					class="selected"></span> <span class="arrow open"></span>
			</a> <!--<ul class="sub-menu">
						<li class="active">
							<a href="index.html">
							<i class="icon-bar-chart"></i>
							Default Dashboard</a>
						</li>
						<li>
							<a href="index_2.html">
							<i class="icon-bulb"></i>
							New Dashboard #1</a>
						</li>
						<li>
							<a href="index_3.html">
							<i class="icon-graph"></i>
							New Dashboard #2</a>
						</li>
					</ul>--></li>
			<li><a href="../change_password/change_password.php"> <i
					class="icon-puzzle"></i> <span class="title">Change Password</span>
			</a></li>
			<li><a href="../users/users.php?cmd=list"> <i class="icon-puzzle"></i>
					<span class="title">Profile</span>
			</a></li>
			<li><a href="../head/head.php?cmd=list"> <i class="icon-puzzle"></i>
					<span class="title">Account Head</span>
			</a></li>
			<li><a href="../account_year/account_year.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Account Year</span>
			</a></li>
			<li><a href="../account/account.php?cmd=list"> <i class="icon-puzzle"></i>
					<span class="title">Account</span>
			</a></li>
			<li><a href="../transactions/transactions.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Transactions</span>
			</a></li>
			<li><a href="../balance/balance.php?cmd=list"> <i class="icon-puzzle"></i>
					<span class="title">Balance</span>
			</a></li>
			<li><a href="../balance_year/balance_year.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Balance By Year</span>
			</a></li>
			<li><a href="../cash_statement/cash_statement.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Day Cash Statement</span>
			</a></li>
			<li><a href="../ledger/ledger.php?cmd=list"> <i class="icon-puzzle"></i>
					<span class="title">Ledger</span>
			</a></li>
			<li><a href="../trial_balance/trial_balance.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Trial balance</span>
			</a></li>
			<li><a href="../balance_sheet/balance_sheet.php?cmd=list"> <i
					class="icon-puzzle"></i> <span class="title">Balance sheet</span>
			</a></li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>