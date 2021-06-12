<?php 
/*// HEADER */
$title = "Robots.txt Generator";
$active='robots'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class="pe-md-4">
                        <h1 class="h2">Robots.txt Generator</h1>
                        <p>Search Engines are using robots (or so called User-Agents) to crawl your pages. The robots.txt file is a text file that defines which parts of a domain can be crawled by a robot. In addition, the robots.txt file can include a link to the XML-sitemap.</p>
                    </div>
                    <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-sm btn-primary" id="robotCraw">Generator</button>
                        </div>
                    </div>
                </div>


                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border" id="sRobots">
                    <div class="row gx-5">
                        <div class="col-lg">
							<h5 class="mb-3">User-agent</h5>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="*" id="sAll" checked />
										<label class="form-check-label" for="sAll">All</label>
									</div>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Googlebot,Googlebot-Image,Googlebot-Mobile,Googlebot-News,Googlebot-Video,Mediapartners-Google,AdsBot-Google,Feedfetcher-Google,AdsBot-Google-Mobile,AdsBot-Google([^-]|$)" data-name="Google Search" id="sGoogle" checked />
										<label class="form-check-label" for="sGoogle">Google</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Slurp" data-name="Yahoo! Search" id="sYahoo" checked />
										<label class="form-check-label" for="sYahoo">Yahoo</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Bingbot,adidxbot" data-name="Bing Search" id="sBing" checked />
										<label class="form-check-label" for="sBing">Bing</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="msnbot,msnbot-media" data-name="MSN Search" id="sMSN" checked />
										<label class="form-check-label" for="sMSN">MSN</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="DuckDuckBot" data-name="DuckDuckGo Search" id="sDuckDuckGo" checked />
										<label class="form-check-label" for="sDuckDuckGo">DuckDuckGo</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="baiduspider,baiduspider-image,baiduspider-mobile,baiduspider-news,baiduspider-video" data-name="Baidu Search" id="sBaidu" checked />
										<label class="form-check-label" for="sBaidu">Baidu</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="YandexBot,YandexImages,YandexAccessibilityBot,YandexMobileBot,YandexMetrika,YandexTurbo,YandexImageResizer,YandexVideo,YandexAdNet,YandexBlogs,YandexCalendar,YandexDirect" data-name="Yandex Search" id="sYandex" checked />
										<label class="form-check-label" for="sYandex">Yandex</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Facebot,facebookexternalhit,facebookexternalhit/1.1" data-name="Facebook Crawler" id="sFacebook" checked />
										<label class="form-check-label" for="sFacebook">Facebook</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="WhatsApp" data-name="WhatsApp Crawler" id="sWhatsApp" checked />
										<label class="form-check-label" for="sWhatsApp">WhatsApp</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="pinterest.com.bot,Pinterest/0.2" data-name="Pinterest Crawler" id="sPinterest" checked />
										<label class="form-check-label" for="sPinterest">Pinterest</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="ia_archiver" data-name="Alexa Crawler" id="sAlexa" checked />
										<label class="form-check-label" for="sAlexa">Alexa</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Teoma" data-name="Teoma Search" id="sTeoma" checked />
										<label class="form-check-label" for="sTeoma">Teoma</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="SEMrushBot,S[eE][mM]rushBot" data-name="SEMRush Crawler" id="sSEMRush" checked />
										<label class="form-check-label" for="sSEMRush">SEMRush</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="LinkedInBot" data-name="LinkedIn Crawler" id="sLinkedIn" checked />
										<label class="form-check-label" for="sLinkedIn">LinkedIn</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="rogerbot" data-name="MOZ Crawler" id="sMOZ" checked />
										<label class="form-check-label" for="sMOZ">MOZ</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Twitterbot,Twitterbot/0.1,Twitterbot/1.0" data-name="Twitter Crawler" id="sTwitter" checked />
										<label class="form-check-label" for="sTwitter">Twitter</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="Applebot" data-name="Apple Crawler" id="sApple" checked />
										<label class="form-check-label" for="sApple">Apple</label>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4 bot">
									<div class="form-check form-switch mb-1">
										<input class="form-check-input" type="checkbox" value="archive.org_bot" data-name="archive.org Crawler" id="sAchiveorg" checked />
										<label class="form-check-label" for="ssAchiveorg">archive.org</label>
									</div>
								</div>
							</div>
							<h5 class="mb-2">Default - All Robots are</h5>
							<div class="mb-4">
								<select id="inputAllow" class="form-select">
									<option value="allow" selected="">Allowed</option>
									<option value="disallow">Disallow</option>
                                </select>
							</div>
							<h5 class="mb-2">Crawl-delay</h5>
							<div class="mb-4">
								<select id="inputDelay" class="form-select">
									<option value="" selected="">Default - No Delay</option>
									<option value="5">5 seconds</option>
									<option value="10">10 seconds</option>
									<option value="20">20 seconds</option>
									<option value="60">60 seconds</option>
									<option value="120">120 seconds</option>
                                </select>
							</div>
							<h5 class="mb-2">Sitemap</h5>
							<div class="mb-4 mb-lg-0">
								<textarea id="inputSitemap" class="form-control" rows="5" style="min-height: 100px"></textarea>
							</div>
						</div>
                        <div class="col-lg">
							<h5 class="mb-3">Results</h5>
							<textarea class="form-control form-control-sm mb-3" id="robotsresult" rows="15"></textarea>
							<button class="btn btn-success" data-clipboard-target="#robotsresult">Copy</button>
						</div>
                    </div>
                </div>



            </main>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>