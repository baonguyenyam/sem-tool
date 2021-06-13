
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	<span>TOOLS</span>
</h6>
<ul class="nav flex-column">
	<li class="nav-item">
		<a class="nav-link <?= $active === 'keyword' ? 'active' : '' ?>" href="keywork-generator">
		<i class="bi bi-type-h1 fa-lg fa-fw me-1"></i> Keywords generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'post' ? 'active' : '' ?>" href="post-generator">
		<i class="bi bi-stickies fa-lg fa-fw me-1"></i> WordPress posts generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'content' ? 'active' : '' ?>" href="content-generator">
		<i class="bi bi-bullseye fa-lg fa-fw me-1"></i> Content SEO generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'qr' ? 'active' : '' ?>" href="qr-generator">
		<i class="bi bi-upc-scan fa-lg fa-fw me-1"></i> QR Code generator
		</a>
	</li>
	<!-- <li class="nav-item">
		<a class="nav-link <?= $active === 'image' ? 'active' : '' ?>" href="image-generator">
		<i class="bi bi-camera fa-lg fa-fw me-1"></i> Image generator
		</a>
	</li> -->
	<li class="nav-item">
		<a class="nav-link <?= $active === 'favicon' ? 'active' : '' ?>" href="favicon-generator">
		<i class="bi bi-command fa-lg fa-fw me-1"></i> Favicon generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'robots' ? 'active' : '' ?>" href="robots-generator">
		<i class="bi bi-bug fa-lg fa-fw me-1"></i> robots.txt generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'plugingen' ? 'active' : '' ?>" href="plugin-generator">
		<i class="bi bi-cloud-download fa-lg fa-fw me-1"></i> Plugin Generator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="banner-creator/index.html" target="_blank">
		<i class="bi bi-camera fa-lg fa-fw me-1"></i> Banner Creator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'ping' ? 'active' : '' ?>" href="ping">
		<i class="bi bi-arrow-left-right fa-lg fa-fw me-1"></i> Ping to search engines
		</a>
	</li>
</ul>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	<span>ADDONS...</span>
</h6>
<ul class="nav flex-column mb-2">
	<li class="nav-item">
		<a class="nav-link <?= $active === 'html' ? 'active' : '' ?>" href="html-validator">
		<i class="bi bi-check2-all fa-lg fa-fw me-1"></i> HTML Validator
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'chrome' ? 'active' : '' ?>" href="chrome-extensions">
		<i class="bi bi-box-seam fa-lg fa-fw me-1"></i>  Chrome extensions
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'plugins' ? 'active' : '' ?>" href="wp-plugins">
		<i class="bi bi-archive fa-lg fa-fw me-1"></i> WordPress plugins
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?= $active === 'crawler' ? 'active' : '' ?>" href="crawler">
		<i class="bi bi-lightning fa-lg fa-fw me-1"></i> Crawler list
		</a>
	</li>
</ul>
