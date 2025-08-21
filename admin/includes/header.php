<div class="header-main" style="background: #b3d800; padding: 0.75rem 0;">
	<div class="logo-w3-agile" style="text-align:center;">
		<h1 style="margin:0;">
			<a href="dashboard.php" style="background: #0a2342; color: #fff; padding: 0.5rem 2rem; border-radius: 3px; font-size:2rem; font-family:'Barlow',sans-serif; text-decoration:none; display:inline-block;">
				CAR WASH
			</a>
		</h1>
	</div>
	<div class="profile_details w3l" style="float:right; margin-right:2rem;">
		<ul style="list-style:none; margin:0; padding:0;">
			<li class="dropdown" style="display:flex; align-items:center;">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background:#43db83; color:#fff; padding:0.75rem 2rem; border-radius:3px; display:flex; align-items:center; text-decoration:none;">
					<div class="profile_img" style="display:flex; align-items:center;">
						<span class="prfil-img" style="margin-right:1rem;">
							<img src="images/User-icon.png" alt="" style="width:48px; height:48px; border-radius:50%; border:2px solid #fff;">
						</span>
						<div class="user-name pb-5" style="margin-right:1rem;">
							<p style="margin:0; font-weight:700; font-size:1.1rem;">How you doin ?</p>
							<span style="font-style:italic; color:#f8f8f8;">Admin</span>
						</div>
						<em class="fa fa-angle-down text-dark" style="margin-left:0.5rem;"></em>
					</div>
				</a>
				<ul class="dropdown-menu drp-mnu" style="display:none; position:absolute; right:0; top:100%; background:#fff; color:#222; min-width:140px; box-shadow:0 2px 8px rgba(0,0,0,0.08); border-radius:4px; z-index:1000;">
					<li>
						<a href="logout.php" style="color:#222; padding:0.75rem 1.5rem; display:block; text-decoration:none;">
							<em class="fa fa-sign-out"></em> Logout
						</a>
					</li>
				</ul>
				<script>
					// Simple dropdown toggle
					document.addEventListener('DOMContentLoaded', function() {
						var dropdown = document.querySelector('.profile_details .dropdown');
						var toggle = dropdown.querySelector('.dropdown-toggle');
						var menu = dropdown.querySelector('.dropdown-menu');
						toggle.addEventListener('click', function(e) {
							e.preventDefault();
							menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
						});
						document.addEventListener('click', function(e) {
							if (!dropdown.contains(e.target)) {
								menu.style.display = 'none';
							}
						});
					});
				</script>
			</li>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>