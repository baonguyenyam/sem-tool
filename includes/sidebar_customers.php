
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	<span>TOOLS</span>
</h6>
<ul class="nav flex-column">
	<li class="nav-item">
		<a class="nav-link <?= $active === 'favicon' ? 'active' : '' ?>" href="favicon-generator">
		<i class="bi bi-command fa-lg fa-fw me-1"></i> Favicon Generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'domain' ? 'active' : '' ?>" href="domain">
		<i class="bi bi-globe fa-lg fa-fw me-1"></i> WHOIS Domain Lookup
		</a>
	</li>
</ul>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	<span>ADDONS...</span>
</h6>
<ul class="nav flex-column mb-2">
	<li class="nav-item">
		<a class="nav-link" href="banner-creator/index.html" target="_blank">
		<i class="bi bi-camera fa-lg fa-fw me-1"></i> Banner Creator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'crawler' ? 'active' : '' ?>" href="crawler">
		<i class="bi bi-lightning fa-lg fa-fw me-1"></i> Crawler List
		</a>
	</li>
	
</ul>
