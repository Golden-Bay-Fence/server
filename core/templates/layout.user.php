<!DOCTYPE html>
<html class="ng-csp" data-placeholder-focus="false" lang="<?php p($_['language']); ?>" data-locale="<?php p($_['locale']); ?>" >
	<head data-user="<?php p($_['user_uid']); ?>" data-user-displayname="<?php p($_['user_displayname']); ?>" data-requesttoken="<?php p($_['requesttoken']); ?>">
		<meta charset="utf-8">
		<title>
			<?php
				p(!empty($_['application'])?$_['application'].' - ':'');
				p($theme->getTitle());
			?>
		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<?php if ($theme->getiTunesAppId() !== '') { ?>
		<meta name="apple-itunes-app" content="app-id=<?php p($theme->getiTunesAppId()); ?>">
		<?php } ?> 
	
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="<?php p((!empty($_['application']) && $_['appid'] != 'files')? $_['application']:$theme->getTitle()); ?>">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="<?php p($theme->getColorPrimary()); ?>">
		<link rel="icon" href="<?php print_unescaped(image_path($_['appid'], 'favicon.ico')); /* IE11+ supports png */ ?>">
		<link rel="apple-touch-icon" href="<?php print_unescaped(image_path($_['appid'], 'favicon-touch.png')); ?>">
		<link rel="apple-touch-icon-precomposed" href="<?php print_unescaped(image_path($_['appid'], 'favicon-touch.png')); ?>">
		<link rel="mask-icon" sizes="any" href="<?php print_unescaped(image_path($_['appid'], 'favicon-mask.svg')); ?>" color="<?php p($theme->getColorPrimary()); ?>">
		<link rel="manifest" href="<?php print_unescaped(image_path($_['appid'], 'manifest.json')); ?>">
		<?php emit_css_loading_tags($_); ?>
		<?php emit_script_loading_tags($_); ?>
		<?php print_unescaped($_['headers']); ?>
	</head>

	<?php
	$gbfagent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($gbfagent, 'GBFUSER') !== false) { ?>
		<style>		@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
html, body {
    min-width: 760px !important;
    min-height: 600px !important;
}
.ui-titlebar {
    position: fixed;
    z-index: 99999;
    display: flex;
    box-sizing: border-box;
	width:100.2%;
	height: 32px;
	background: #232629;
	user-select: none;
	cursor: default;
    padding: 0%;
    margin: 0px;
    margin-bottom: 0px !important;
    margin-right:- 0px !important;
    -webkit-app-region: drag;
} 
.ui-titleicon {
	flex-grow: 1;
	max-width: 32px;
	max-height: 32px;
}
.ui-titletext {
	flex-grow: 2;
	max-height: 32px;
	width: auto;
	font: 12px/32px "Segoe UI", Arial, sans-serif;
	color: #ffffff;
	text-indent: 10px;

    font-family: "Open Sans", sans-serif !important;
    font-weight: 800 !important;
    letter-spacing: 0.225em !important;
    text-transform: uppercase !important;
}
.ui-titlecontrols {
	max-width: 144px;
	max-height: 32px;
	flex-grow: 1;
}
.ui-btn {
	margin: 0;
	width: 48px;
	height:32px;
	border: 0;
	outline: 0;
	background: transparent;
    -webkit-app-region: no-drag;
	--border-radius: 0px !important;
    --border-radius-large: 0px !important;
    --border-radius-pill: 0px !important;
}
.ui-btn:hover {
	background: rgba(255,255,255,.1);
}
.ui-btn.close:hover {
	background: #e81123;
}
.ui-btn svg path, 
.ui-btn svg rect, 
.ui-btn svg polygon {
	fill: #ffffff;
}
.ui-btn svg {
  width: 10px;
  height: 10px;
}
#app-navigation {
      margin-top: 32px !important;
      padding-bottom: 32px !important;
    }

	#app-navigation-vue, .vue-recycle-scroller.direction-vertical, .vue-recycle-scroller__item-wrapper {
      margin-top: 32px !important;
      padding-bottom: 32px !important;
    }

	#search {
		margin-top: 32px !important;
	}

	.leaflet-bottom, .leaflet-right, .leaflet-left {
		padding-bottom: 32px !important;
	}

	#app-sidebar {
      margin-top: 32px !important;
      padding-bottom: 32px !important;
    }
    
    #app-content {
      margin-top: 32px !important;
	  padding-bottom: 32px !important;
    }
    
    #body-user {
      background-color: white !important;
    }

    #header {
      margin-top: 32px !important;
      margin-bottom: 32px !important;
    }
	#board-wrapper {
      margin-top: 32px !important;
      margin-bottom: 32px !important;
    }
	#app-content-vue {
      margin-top: 32px !important;
    }
	#app-sidebar-vue {
      margin-top: 32px !important;
    }
    ::-webkit-scrollbar {
      display: none;
    }
	</style>
		<?php } ?>


	<body id="<?php p($_['bodyid']);?>">

	<?php
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($agent, 'GBFUSER') !== false) { ?>
<!-- TITLE BAR -->
<div class="ui-titlebar">
        <!--<div class="ui-titleicon"></div>-->
        <div class="ui-titletext">Golden Bay Fence Cloud</div>
        <div class="ui-titlecontrols">
            <button class="ui-btn minimize" id="uiminibt">
                <svg x="0px" y="0px" viewBox="0 0 10.2 1"><rect x="0" y="50%" width="10.2" height="1" /></svg>
            </button><button class="ui-btn maximize" id="uimaxbt">
                <svg viewBox="0 0 10 10"><path d="M0,0v10h10V0H0z M9,9H1V1h8V9z" /></svg>
            </button><button class="ui-btn close" id="uiclsbt">
                <svg viewBox="0 0 10 10"><polygon points="10.2,0.7 9.5,0 5.1,4.4 0.7,0 0,0.7 4.4,5.1 0,9.5 0.7,10.2 5.1,5.8 9.5,10.2 10.2,9.5 5.8,5.1" /></svg>
            </button>
        </div>
    </div>
    <!-- END TITLE BAR -->
<?php } ?>

	<?php include 'layout.noscript.warning.php'; ?>

		<?php foreach ($_['initialStates'] as $app => $initialState) { ?>
			<input type="hidden" id="initial-state-<?php p($app); ?>" value="<?php p(base64_encode($initialState)); ?>">
		<?php }?>

		<a href="#app-content" class="button primary skip-navigation skip-content"><?php p($l->t('Skip to main content')); ?></a>
		<a href="#app-navigation" class="button primary skip-navigation"><?php p($l->t('Skip to navigation of app')); ?></a>

		<div id="notification-container">
			<div id="notification"></div>
		</div>
		<header role="banner" id="header">
			<div class="header-left">
				<a href="<?php print_unescaped(link_to('', 'index.php')); ?>"
					id="nextcloud">
					<div class="logo logo-icon">
						<h1 class="hidden-visually">
							<?php p($theme->getName()); ?> <?php p(!empty($_['application'])?$_['application']: $l->t('Apps')); ?>
						</h1>
					</div>
				</a>

				<ul id="appmenu" <?php if ($_['themingInvertMenu']) { ?>class="inverted"<?php } ?>>
					<?php foreach ($_['navigation'] as $entry): ?>
						<li data-id="<?php p($entry['id']); ?>" class="hidden" tabindex="-1">
							<a href="<?php print_unescaped($entry['href']); ?>"
								<?php if ($entry['active']): ?> class="active"<?php endif; ?>
								aria-label="<?php p($entry['name']); ?>">
									<svg width="24" height="20" viewBox="0 0 24 20" alt=""<?php if ($entry['unread'] !== 0) { ?> class="has-unread"<?php } ?>>
										<defs>
											<?php if ($_['themingInvertMenu']) { ?><filter id="invertMenuMain-<?php p($entry['id']); ?>"><feColorMatrix in="SourceGraphic" type="matrix" values="-1 0 0 0 1 0 -1 0 0 1 0 0 -1 0 1 0 0 0 1 0" /></filter><?php } ?>
											<mask id="hole">
												<rect width="100%" height="100%" fill="white"/>
												<circle r="4.5" cx="21" cy="3" fill="black"/>
											</mask>
										</defs>
										<image x="2" y="0" width="20" height="20" preserveAspectRatio="xMinYMin meet"<?php if ($_['themingInvertMenu']) { ?> filter="url(#invertMenuMain-<?php p($entry['id']); ?>)"<?php } ?> xlink:href="<?php print_unescaped($entry['icon'] . '?v=' . $_['versionHash']); ?>" style="<?php if ($entry['unread'] !== 0) { ?>mask: url("#hole");<?php } ?>" class="app-icon"></image>
										<circle class="app-icon-notification" r="3" cx="21" cy="3" fill="red"/>
									</svg>
								<div class="unread-counter" aria-hidden="true"><?php p($entry['unread']); ?></div>
								<span>
									<?php p($entry['name']); ?>
								</span>
							</a>
						</li>
					<?php endforeach; ?>
					<li id="more-apps" class="menutoggle"
						aria-haspopup="true" aria-controls="navigation" aria-expanded="false">
						<a href="#" aria-label="<?php p($l->t('More apps')); ?>">
							<div class="icon-more-white"></div>
							<span><?php p($l->t('More')); ?></span>
						</a>
					</li>
				</ul>

				<nav role="navigation">
					<div id="navigation" style="display: none;"  aria-label="<?php p($l->t('More apps menu')); ?>">
						<div id="apps">
							<ul>
								<?php foreach ($_['navigation'] as $entry): ?>
									<li data-id="<?php p($entry['id']); ?>">
									<a href="<?php print_unescaped($entry['href']); ?>"
										<?php if ($entry['active']): ?> class="active"<?php endif; ?>
										aria-label="<?php p($entry['name']); ?>">
										<svg width="20" height="20" viewBox="0 0 20 20" alt=""<?php if ($entry['unread'] !== 0) { ?> class="has-unread"<?php } ?>>
											<defs>
												<filter id="invertMenuMore-<?php p($entry['id']); ?>"><feColorMatrix in="SourceGraphic" type="matrix" values="-1 0 0 0 1 0 -1 0 0 1 0 0 -1 0 1 0 0 0 1 0"></feColorMatrix></filter>
												<mask id="hole">
													<rect width="100%" height="100%" fill="white"/>
													<circle r="4.5" cx="17" cy="3" fill="black"/>
												</mask>
											</defs>
											<image x="0" y="0" width="16" height="16" preserveAspectRatio="xMinYMin meet" filter="url(#invertMenuMore-<?php p($entry['id']); ?>)" xlink:href="<?php print_unescaped($entry['icon'] . '?v=' . $_['versionHash']); ?>" style="<?php if ($entry['unread'] !== 0) { ?>mask: url("#hole");<?php } ?>" class="app-icon"></image>
											<circle class="app-icon-notification" r="3" cx="17" cy="3" fill="red"/>
										</svg>
										<div class="unread-counter" aria-hidden="true"><?php p($entry['unread']); ?></div>
										<span class="app-title"><?php p($entry['name']); ?></span>
									</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</nav>

			</div>

			<div class="header-right">
				<div id="unified-search"></div>
				<div id="notifications"></div>
				<div id="contactsmenu">
					<div class="icon-contacts menutoggle" tabindex="0" role="button"
					aria-haspopup="true" aria-controls="contactsmenu-menu" aria-expanded="false">
						<span class="hidden-visually"><?php p($l->t('Contacts'));?></span>
					</div>
					<div id="contactsmenu-menu" class="menu"
						aria-label="<?php p($l->t('Contacts menu'));?>"></div>
				</div>
				<div id="settings">
					<div id="expand" tabindex="0" role="button" class="menutoggle"
						aria-label="<?php p($l->t('Settings'));?>"
						aria-haspopup="true" aria-controls="expanddiv" aria-expanded="false">
						<div class="avatardiv<?php if ($_['userAvatarSet']) {
				print_unescaped(' avatardiv-shown');
			} else {
				print_unescaped('" style="display: none');
			} ?>">
							<?php if ($_['userAvatarSet']): ?>
								<img alt="" width="32" height="32"
								src="<?php p(\OC::$server->getURLGenerator()->linkToRoute('core.avatar.getAvatar', ['userId' => $_['user_uid'], 'size' => 32, 'v' => $_['userAvatarVersion']]));?>"
								srcset="<?php p(\OC::$server->getURLGenerator()->linkToRoute('core.avatar.getAvatar', ['userId' => $_['user_uid'], 'size' => 64, 'v' => $_['userAvatarVersion']]));?> 2x, <?php p(\OC::$server->getURLGenerator()->linkToRoute('core.avatar.getAvatar', ['userId' => $_['user_uid'], 'size' => 128, 'v' => $_['userAvatarVersion']]));?> 4x"
								>
							<?php endif; ?>
						</div>
						<div id="expandDisplayName" class="icon-settings-white"></div>
					</div>
					<nav class="settings-menu" id="expanddiv" style="display:none;"
						aria-label="<?php p($l->t('Settings menu'));?>">
					<ul>
					<?php foreach ($_['settingsnavigation'] as $entry):?>
						<li data-id="<?php p($entry['id']); ?>">
							<a href="<?php print_unescaped($entry['href']); ?>"
								<?php if ($entry["active"]): ?> class="active"<?php endif; ?>>
								<img alt="" src="<?php print_unescaped($entry['icon'] . '?v=' . $_['versionHash']); ?>">
								<?php p($entry['name']) ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
					</nav>
				</div>
			</div>
		</header>

		<div id="sudo-login-background" class="hidden"></div>
		<form id="sudo-login-form" class="hidden" method="POST">
			<label>
				<?php p($l->t('This action requires you to confirm your password')); ?><br/>
				<input type="password" class="question" autocomplete="new-password" name="question" value=" <?php /* Hack against browsers ignoring autocomplete="off" */ ?>"
				placeholder="<?php p($l->t('Confirm your password')); ?>" />
			</label>
			<input class="confirm" value="<?php p($l->t('Confirm')); ?>" type="submit">
		</form>

		<div id="content" class="app-<?php p($_['appid']) ?>" role="main">
			<?php print_unescaped($_['content']); ?>
		</div>
		<?php
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($agent, 'GBFUSER') !== false) { ?>
<script type="text/javascript">
//add this to nc jsinsert app
document.getElementById('uiminibt').addEventListener('click', () => windowControls.minimize())
document.getElementById('uimaxbt').addEventListener('click', () => windowControls.maximize())
document.getElementById('uiclsbt').addEventListener('click', () => windowControls.close())
</script>
<?php } ?>
	</body>
</html>
