/*!
 * fancyBox - jQuery Plugin
 * version: 2.1.3 (Tue, 23 Oct 2012)
 * @requires jQuery v1.6 or later
 *
 * Examples at http://fancyapps.com/fancybox/
 * License: www.fancyapps.com/fancybox/#license
 *
 * Copyright 2012 Janis Skarnelis - janis@fancyapps.com
 *
 */

(function (window, document, $, undefined) {
	"use strict";

	var W = $(window),
		D = $(document),
		F = $.fancybox = function () {
			F.open.apply( this, arguments );
		},
		didUpdate = null,
		isTouch	  = document.createTouch !== undefined,

		isQuery	= function(obj) {
			return obj && obj.hasOwnProperty && obj instanceof $;
		},
		isString = function(str) {
			return str && $.type(str) === "string";
		},
		isPercentage = function(str) {
			return isString(str) && str.indexOf('%') > 0;
		},
		isScrollable = function(el) {
			return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));
		},
		getScalar = function(orig, dim) {
			var value = parseInt(orig, 10) || 0;

			if (dim && isPercentage(orig)) {
				value = F.getViewport()[ dim ] / 100 * value;
			}

			return Math.ceil(value);
		},
		getValue = function(value, dim) {
			return getScalar(value, dim) + 'px';
		};

	$.extend(F, {
		// The current version of fancyBox
		version: '2.1.3',

		defaults: {
			padding : 15,
			margin  : 20,

			width     : 800,
			height    : 600,
			minWidth  : 100,
			minHeight : 100,
			maxWidth  : 9999,
			maxHeight : 9999,

			autoSize   : true,
			autoHeight : false,
			autoWidth  : false,

			autoResize  : true,
			autoCenter  : !isTouch,
			fitToView   : true,
			aspectRatio : false,
			topRatio    : 0.5,
			leftRatio   : 0.5,

			scrolling : 'auto', // 'auto', 'yes' or 'no'
			wrapCSS   : '',

			arrows     : true,
			closeBtn   : true,
			closeClick : false,
			nextClick  : false,
			mouseWheel : true,
			autoPlay   : false,
			playSpeed  : 3000,
			preload    : 3,
			modal      : false,
			loop       : true,

			ajax  : {
				dataType : 'html',
				headers  : { 'X-fancyBox': true }
			},
			iframe : {
				scrolling : 'auto',
				preload   : true
			},
			swf : {
				wmode: 'transparent',
				allowfullscreen   : 'true',
				allowscriptaccess : 'always'
			},

			keys  : {
				next : {
					13 : 'left', // enter
					34 : 'up',   // page down
					39 : 'left', // right arrow
					40 : 'up'    // down arrow
				},
				prev : {
					8  : 'right',  // backspace
					33 : 'down',   // page up
					37 : 'right',  // left arrow
					38 : 'down'    // up arrow
				},
				close  : [27], // escape key
				play   : [32], // space - start/stop slideshow
				toggle : [70]  // letter "f" - toggle fullscreen
			},

			direction : {
				next : 'left',
				prev : 'right'
			},

			scrollOutside  : true,

			// Override some properties
			index   : 0,
			type    : null,
			href    : null,
			content : null,
			title   : null,

			// HTML templates
			tpl: {
				wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
				image    : '<img class="fancybox-image" src="{href}" alt="" />',
				iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + ($.browser.msie ? ' allowtransparency="true"' : '') + '></iframe>',
				error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
				closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
				next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
				prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
			},

			// Properties for each animation type
			// Opening fancyBox
			openEffect  : 'fade', // 'elastic', 'fade' or 'none'
			openSpeed   : 250,
			openEasing  : 'swing',
			openOpacity : true,
			openMethod  : 'zoomIn',

			// Closing fancyBox
			closeEffect  : 'fade', // 'elastic', 'fade' or 'none'
			closeSpeed   : 250,
			closeEasing  : 'swing',
			closeOpacity : true,
			closeMethod  : 'zoomOut',

			// Changing next gallery item
			nextEffect : 'elastic', // 'elastic', 'fade' or 'none'
			nextSpeed  : 250,
			nextEasing : 'swing',
			nextMethod : 'changeIn',

			// Changing previous gallery item
			prevEffect : 'elastic', // 'elastic', 'fade' or 'none'
			prevSpeed  : 250,
			prevEasing : 'swing',
			prevMethod : 'changeOut',

			// Enable default helpers
			helpers : {
				overlay : true,
				title   : true
			},

			// Callbacks
			onCancel     : $.noop, // If canceling
			beforeLoad   : $.noop, // Before loading
			afterLoad    : $.noop, // After loading
			beforeShow   : $.noop, // Before changing in current item
			afterShow    : $.noop, // After opening
			beforeChange : $.noop, // Before changing gallery item
			beforeClose  : $.noop, // Before closing
			afterClose   : $.noop  // After closing
		},

		//Current state
		group    : {}, // Selected group
		opts     : {}, // Group options
		previous : null,  // Previous element
		coming   : null,  // Element being loaded
		current  : null,  // Currently loaded element
		isActive : false, // Is activated
		isOpen   : false, // Is currently open
		isOpened : false, // Have been fully opened at least once

		wrap  : null,
		skin  : null,
		outer : null,
		inner : null,

		player : {
			timer    : null,
			isActive : false
		},

		// Loaders
		ajaxLoad   : null,
		imgPreload : null,

		// Some collections
		transitions : {},
		helpers     : {},

		/*
		 *	Static methods
		 */

		open: function (group, opts) {
			if (!group) {
				return;
			}

			if (!$.isPlainObject(opts)) {
				opts = {};
			}

			// Close if already active
			if (false === F.close(true)) {
				return;
			}

			// Normalize group
			if (!$.isArray(group)) {
				group = isQuery(group) ? $(group).get() : [group];
			}

			// Recheck if the type of each element is `object` and set content type (image, ajax, etc)
			$.each(group, function(i, element) {
				var obj = {},
					href,
					title,
					content,
					type,
					rez,
					hrefParts,
					selector;

				if ($.type(element) === "object") {
					// Check if is DOM element
					if (element.nodeType) {
						element = $(element);
					}

					if (isQuery(element)) {
						obj = {
							href    : element.data('fancybox-href') || element.attr('href'),
							title   : element.data('fancybox-title') || element.attr('title'),
							isDom   : true,
							element : element
						};

						if ($.metadata) {
							$.extend(true, obj, element.metadata());
						}

					} else {
						obj = element;
					}
				}

				href  = opts.href  || obj.href || (isString(element) ? element : null);
				title = opts.title !== undefined ? opts.title : obj.title || '';

				content = opts.content || obj.content;
				type    = content ? 'html' : (opts.type  || obj.type);

				if (!type && obj.isDom) {
					type = element.data('fancybox-type');

					if (!type) {
						rez  = element.prop('class').match(/fancybox\.(\w+)/);
						type = rez ? rez[1] : null;
					}
				}

				if (isString(href)) {
					// Try to guess the content type
					if (!type) {
						if (F.isImage(href)) {
							type = 'image';

						} else if (F.isSWF(href)) {
							type = 'swf';

						} else if (href.charAt(0) === '#') {
							type = 'inline';

						} else if (isString(element)) {
							type    = 'html';
							content = element;
						}
					}

					// Split url into two pieces with source url and content selector, e.g,
					// "/mypage.html #my_id" will load "/mypage.html" and display element having id "my_id"
					if (type === 'ajax') {
						hrefParts = href.split(/\s+/, 2);
						href      = hrefParts.shift();
						selector  = hrefParts.shift();
					}
				}

				if (!content) {
					if (type === 'inline') {
						if (href) {
							content = $( isString(href) ? href.replace(/.*(?=#[^\s]+$)/, '') : href ); //strip for ie7

						} else if (obj.isDom) {
							content = element;
						}

					} else if (type === 'html') {
						content = href;

					} else if (!type && !href && obj.isDom) {
						type    = 'inline';
						content = element;
					}
				}

				$.extend(obj, {
					href     : href,
					type     : type,
					content  : content,
					title    : title,
					selector : selector
				});

				group[ i ] = obj;
			});

			// Extend the defaults
			F.opts = $.extend(true, {}, F.defaults, opts);

			// All options are merged recursive except keys
			if (opts.keys !== undefined) {
				F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : false;
			}

			F.group = group;

			return F._start(F.opts.index);
		},

		// Cancel image loading or abort ajax request
		cancel: function () {
			var coming = F.coming;

			if (!coming || false === F.trigger('onCancel')) {
				return;
			}

			F.hideLoading();

			if (F.ajaxLoad) {
				F.ajaxLoad.abort();
			}

			F.ajaxLoad = null;

			if (F.imgPreload) {
				F.imgPreload.onload = F.imgPreload.onerror = null;
			}

			if (coming.wrap) {
				coming.wrap.stop(true, true).trigger('onReset').remove();
			}

			F.coming = null;

			// If the first item has been canceled, then clear everything
			if (!F.current) {
				F._afterZoomOut( coming );
			}
		},

		// Start closing animation if is open; remove immediately if opening/closing
		close: function (event) {
			F.cancel();

			if (false === F.trigger('beforeClose')) {
				return;
			}

			F.unbindEvents();

			if (!F.isActive) {
				return;
			}

			if (!F.isOpen || event === true) {
				$('.fancybox-wrap').stop(true).trigger('onReset').remove();

				F._afterZoomOut();

			} else {
				F.isOpen = F.isOpened = false;
				F.isClosing = true;

				$('.fancybox-item, .fancybox-nav').remove();

				F.wrap.stop(true, true).removeClass('fancybox-opened');

				F.transitions[ F.current.closeMethod ]();
			}
		},

		// Manage slideshow:
		//   $.fancybox.play(); - toggle slideshow
		//   $.fancybox.play( true ); - start
		//   $.fancybox.play( false ); - stop
		play: function ( action ) {
			var clear = function () {
					clearTimeout(F.player.timer);
				},
				set = function () {
					clear();

					if (F.current && F.player.isActive) {
						F.player.timer = setTimeout(F.next, F.current.playSpeed);
					}
				},
				stop = function () {
					clear();

					$('body').unbind('.player');

					F.player.isActive = false;

					F.trigger('onPlayEnd');
				},
				start = function () {
					if (F.current && (F.current.loop || F.current.index < F.group.length - 1)) {
						F.player.isActive = true;

						$('body').bind({
							'afterShow.player onUpdate.player'   : set,
							'onCancel.player beforeClose.player' : stop,
							'beforeLoad.player' : clear
						});

						set();

						F.trigger('onPlayStart');
					}
				};

			if (action === true || (!F.player.isActive && action !== false)) {
				start();
			} else {
				stop();
			}
		},

		// Navigate to next gallery item
		next: function ( direction ) {
			var current = F.current;

			if (current) {
				if (!isString(direction)) {
					direction = current.direction.next;
				}

				F.jumpto(current.index + 1, direction, 'next');
			}
		},

		// Navigate to previous gallery item
		prev: function ( direction ) {
			var current = F.current;

			if (current) {
				if (!isString(direction)) {
					direction = current.direction.prev;
				}

				F.jumpto(current.index - 1, direction, 'prev');
			}
		},

		// Navigate to gallery item by index
		jumpto: function ( index, direction, router ) {
			var current = F.current;

			if (!current) {
				return;
			}

			index = getScalar(index);

			F.direction = direction || current.direction[ (index >= current.index ? 'next' : 'prev') ];
			F.router    = router || 'jumpto';

			if (current.loop) {
				if (index < 0) {
					index = current.group.length + (index % current.group.length);
				}

				index = index % current.group.length;
			}

			if (current.group[ index ] !== undefined) {
				F.cancel();

				F._start(index);
			}
		},

		// Center inside viewport and toggle position type to fixed or absolute if needed
		reposition: function (e, onlyAbsolute) {
			var current = F.current,
				wrap    = current ? current.wrap : null,
				pos;

			if (wrap) {
				pos = F._getPosition(onlyAbsolute);

				if (e && e.type === 'scroll') {
					delete pos.position;

					wrap.stop(true, true).animate(pos, 200);

				} else {
					wrap.css(pos);

					current.pos = $.extend({}, current.dim, pos);
				}
			}
		},

		update: function (e) {
			var type = (e && e.type),
				anyway = !type || type === 'orientationchange';

			if (anyway) {
				clearTimeout(didUpdate);

				didUpdate = null;
			}

			if (!F.isOpen || didUpdate) {
				return;
			}

			didUpdate = setTimeout(function() {
				var current = F.current;

				if (!current || F.isClosing) {
					return;
				}

				F.wrap.removeClass('fancybox-tmp');

				if (anyway || type === 'load' || (type === 'resize' && current.autoResize)) {
					F._setDimension();
				}

				if (!(type === 'scroll' && current.canShrink)) {
					F.reposition(e);
				}

				F.trigger('onUpdate');

				didUpdate = null;

			}, (anyway && !isTouch ? 0 : 300));
		},

		// Shrink content to fit inside viewport or restore if resized
		toggle: function ( action ) {
			if (F.isOpen) {
				F.current.fitToView = $.type(action) === "boolean" ? action : !F.current.fitToView;

				// Help browser to restore document dimensions
				if (isTouch) {
					F.wrap.removeAttr('style').addClass('fancybox-tmp');

					F.trigger('onUpdate');
				}

				F.update();
			}
		},

		hideLoading: function () {
			D.unbind('.loading');

			$('#fancybox-loading').remove();
		},

		showLoading: function () {
			var el, viewport;

			F.hideLoading();

			el = $('<div id="fancybox-loading"><div></div></div>').click(F.cancel).appendTo('body');

			// If user will press the escape-button, the request will be canceled
			D.bind('keydown.loading', function(e) {
				if ((e.which || e.keyCode) === 27) {
					e.preventDefault();

					F.cancel();
				}
			});

			if (!F.defaults.fixed) {
				viewport = F.getViewport();

				el.css({
					position : 'absolute',
					top  : (viewport.h * 0.5) + viewport.y,
					left : (viewport.w * 0.5) + viewport.x
				});
			}
		},

		getViewport: function () {
			var locked = (F.current && F.current.locked) || false,
				rez    = {
					x: W.scrollLeft(),
					y: W.scrollTop()
				};

			if (locked) {
				rez.w = locked[0].clientWidth;
				rez.h = locked[0].clientHeight;

			} else {
				// See http://bugs.jquery.com/ticket/6724
				rez.w = isTouch && window.innerWidth  ? window.innerWidth  : W.width();
				rez.h = isTouch && window.innerHeight ? window.innerHeight : W.height();
			}

			return rez;
		},

		// Unbind the keyboard / clicking actions
		unbindEvents: function () {
			if (F.wrap && isQuery(F.wrap)) {
				F.wrap.unbind('.fb');
			}

			D.unbind('.fb');
			W.unbind('.fb');
		},

		bindEvents: function () {
			var current = F.current,
				keys;

			if (!current) {
				return;
			}

			// Changing document height on iOS devices triggers a 'resize' event,
			// that can change document height... repeating infinitely
			W.bind('orientationchange.fb' + (isTouch ? '' : ' resize.fb') + (current.autoCenter && !current.locked ? ' scroll.fb' : ''), F.update);

			keys = current.keys;

			if (keys) {
				D.bind('keydown.fb', function (e) {
					var code   = e.which || e.keyCode,
						target = e.target || e.srcElement;

					// Skip esc key if loading, because showLoading will cancel preloading
					if (code === 27 && F.coming) {
						return false;
					}

					// Ignore key combinations and key events within form elements
					if (!e.ctrlKey && !e.altKey && !e.shiftKey && !e.metaKey && !(target && (target.type || $(target).is('[contenteditable]')))) {
						$.each(keys, function(i, val) {
							if (current.group.length > 1 && val[ code ] !== undefined) {
								F[ i ]( val[ code ] );

								e.preventDefault();
								return false;
							}

							if ($.inArray(code, val) > -1) {
								F[ i ] ();

								e.preventDefault();
								return false;
							}
						});
					}
				});
			}

			if ($.fn.mousewheel && current.mouseWheel) {
				F.wrap.bind('mousewheel.fb', function (e, delta, deltaX, deltaY) {
					var target = e.target || null,
						parent = $(target),
						canScroll = false;

					while (parent.length) {
						if (canScroll || parent.is('.fancybox-skin') || parent.is('.fancybox-wrap')) {
							break;
						}

						canScroll = isScrollable( parent[0] );
						parent    = $(parent).parent();
					}

					if (delta !== 0 && !canScroll) {
						if (F.group.length > 1 && !current.canShrink) {
							if (deltaY > 0 || deltaX > 0) {
								F.prev( deltaY > 0 ? 'down' : 'left' );

							} else if (deltaY < 0 || deltaX < 0) {
								F.next( deltaY < 0 ? 'up' : 'right' );
							}

							e.preventDefault();
						}
					}
				});
			}
		},

		trigger: function (event, o) {
			var ret, obj = o || F.coming || F.current;

			if (!obj) {
				return;
			}

			if ($.isFunction( obj[event] )) {
				ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1));
			}

			if (ret === false) {
				return false;
			}

			if (obj.helpers) {
				$.each(obj.helpers, function (helper, opts) {
					if (opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event])) {
						opts = $.extend(true, {}, F.helpers[helper].defaults, opts);

						F.helpers[helper][event](opts, obj);
					}
				});
			}

			$.event.trigger(event + '.fb');
		},

		isImage: function (str) {
			return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i);
		},

		isSWF: function (str) {
			return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i);
		},

		_start: function (index) {
			var coming = {},
				obj,
				href,
				type,
				margin,
				padding;

			index = getScalar( index );
			obj   = F.group[ index ] || null;

			if (!obj) {
				return false;
			}

			coming = $.extend(true, {}, F.opts, obj);

			// Convert margin and padding properties to array - top, right, bottom, left
			margin  = coming.margin;
			padding = coming.padding;

			if ($.type(margin) === 'number') {
				coming.margin = [margin, margin, margin, margin];
			}

			if ($.type(padding) === 'number') {
				coming.padding = [padding, padding, padding, padding];
			}

			// 'modal' propery is just a shortcut
			if (coming.modal) {
				$.extend(true, coming, {
					closeBtn   : false,
					closeClick : false,
					nextClick  : false,
					arrows     : false,
					mouseWheel : false,
					keys       : null,
					helpers: {
						overlay : {
							closeClick : false
						}
					}
				});
			}

			// 'autoSize' property is a shortcut, too
			if (coming.autoSize) {
				coming.autoWidth = coming.autoHeight = true;
			}

			if (coming.width === 'auto') {
				coming.autoWidth = true;
			}

			if (coming.height === 'auto') {
				coming.autoHeight = true;
			}

			/*
			 * Add reference to the group, so it`s possible to access from callbacks, example:
			 * afterLoad : function() {
			 *     this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
			 * }
			 */

			coming.group  = F.group;
			coming.index  = index;

			// Give a chance for callback or helpers to update coming item (type, title, etc)
			F.coming = coming;

			if (false === F.trigger('beforeLoad')) {
				F.coming = null;

				return;
			}

			type = coming.type;
			href = coming.href;

			if (!type) {
				F.coming = null;

				//If we can not determine content type then drop silently or display next/prev item if looping through gallery
				if (F.current && F.router && F.router !== 'jumpto') {
					F.current.index = index;

					return F[ F.router ]( F.direction );
				}

				return false;
			}

			F.isActive = true;

			if (type === 'image' || type === 'swf') {
				coming.autoHeight = coming.autoWidth = false;
				coming.scrolling  = 'visible';
			}

			if (type === 'image') {
				coming.aspectRatio = true;
			}

			if (type === 'iframe' && isTouch) {
				coming.scrolling = 'scroll';
			}

			// Build the neccessary markup
			coming.wrap = $(coming.tpl.wrap).addClass('fancybox-' + (isTouch ? 'mobile' : 'desktop') + ' fancybox-type-' + type + ' fancybox-tmp ' + coming.wrapCSS).appendTo( coming.parent || 'body' );

			$.extend(coming, {
				skin  : $('.fancybox-skin',  coming.wrap),
				outer : $('.fancybox-outer', coming.wrap),
				inner : $('.fancybox-inner', coming.wrap)
			});

			$.each(["Top", "Right", "Bottom", "Left"], function(i, v) {
				coming.skin.css('padding' + v, getValue(coming.padding[ i ]));
			});

			F.trigger('onReady');

			// Check before try to load; 'inline' and 'html' types need content, others - href
			if (type === 'inline' || type === 'html') {
				if (!coming.content || !coming.content.length) {
					return F._error( 'content' );
				}

			} else if (!href) {
				return F._error( 'href' );
			}

			if (type === 'image') {
				F._loadImage();

			} else if (type === 'ajax') {
				F._loadAjax();

			} else if (type === 'iframe') {
				F._loadIframe();

			} else {
				F._afterLoad();
			}
		},

		_error: function ( type ) {
			$.extend(F.coming, {
				type       : 'html',
				autoWidth  : true,
				autoHeight : true,
				minWidth   : 0,
				minHeight  : 0,
				scrolling  : 'no',
				hasError   : type,
				content    : F.coming.tpl.error
			});

			F._afterLoad();
		},

		_loadImage: function () {
			// Reset preload image so it is later possible to check "complete" property
			var img = F.imgPreload = new Image();

			img.onload = function () {
				this.onload = this.onerror = null;

				F.coming.width  = this.width;
				F.coming.height = this.height;

				F._afterLoad();
			};

			img.onerror = function () {
				this.onload = this.onerror = null;

				F._error( 'image' );
			};

			img.src = F.coming.href;

			if (img.complete !== true) {
				F.showLoading();
			}
		},

		_loadAjax: function () {
			var coming = F.coming;

			F.showLoading();

			F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
				url: coming.href,
				error: function (jqXHR, textStatus) {
					if (F.coming && textStatus !== 'abort') {
						F._error( 'ajax', jqXHR );

					} else {
						F.hideLoading();
					}
				},
				success: function (data, textStatus) {
					if (textStatus === 'success') {
						coming.content = data;

						F._afterLoad();
					}
				}
			}));
		},

		_loadIframe: function() {
			var coming = F.coming,
				iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, new Date().getTime()))
					.attr('scrolling', isTouch ? 'auto' : coming.iframe.scrolling)
					.attr('src', coming.href);

			// This helps IE
			$(coming.wrap).bind('onReset', function () {
				try {
					$(this).find('iframe').hide().attr('src', '//about:blank').end().empty();
				} catch (e) {}
			});

			if (coming.iframe.preload) {
				F.showLoading();

				iframe.one('load', function() {
					$(this).data('ready', 1);

					// iOS will lose scrolling if we resize
					if (!isTouch) {
						$(this).bind('load.fb', F.update);
					}

					// Without this trick:
					//   - iframe won't scroll on iOS devices
					//   - IE7 sometimes displays empty iframe
					$(this).parents('.fancybox-wrap').width('100%').removeClass('fancybox-tmp').show();

					F._afterLoad();
				});
			}

			coming.content = iframe.appendTo( coming.inner );

			if (!coming.iframe.preload) {
				F._afterLoad();
			}
		},

		_preloadImages: function() {
			var group   = F.group,
				current = F.current,
				len     = group.length,
				cnt     = current.preload ? Math.min(current.preload, len - 1) : 0,
				item,
				i;

			for (i = 1; i <= cnt; i += 1) {
				item = group[ (current.index + i ) % len ];

				if (item.type === 'image' && item.href) {
					new Image().src = item.href;
				}
			}
		},

		_afterLoad: function () {
			var coming   = F.coming,
				previous = F.current,
				placeholder = 'fancybox-placeholder',
				current,
				content,
				type,
				scrolling,
				href,
				embed;

			F.hideLoading();

			if (!coming || F.isActive === false) {
				return;
			}

			if (false === F.trigger('afterLoad', coming, previous)) {
				coming.wrap.stop(true).trigger('onReset').remove();

				F.coming = null;

				return;
			}

			if (previous) {
				F.trigger('beforeChange', previous);

				previous.wrap.stop(true).removeClass('fancybox-opened')
					.find('.fancybox-item, .fancybox-nav')
					.remove();
			}

			F.unbindEvents();

			current   = coming;
			content   = coming.content;
			type      = coming.type;
			scrolling = coming.scrolling;

			$.extend(F, {
				wrap  : current.wrap,
				skin  : current.skin,
				outer : current.outer,
				inner : current.inner,
				current  : current,
				previous : previous
			});

			href = current.href;

			switch (type) {
				case 'inline':
				case 'ajax':
				case 'html':
					if (current.selector) {
						content = $('<div>').html(content).find(current.selector);

					} else if (isQuery(content)) {
						if (!content.data(placeholder)) {
							content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter( content ).hide() );
						}

						content = content.show().detach();

						current.wrap.bind('onReset', function () {
							if ($(this).find(content).length) {
								content.hide().replaceAll( content.data(placeholder) ).data(placeholder, false);
							}
						});
					}
				break;

				case 'image':
					content = current.tpl.image.replace('{href}', href);
				break;

				case 'swf':
					content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>';
					embed   = '';

					$.each(current.swf, function(name, val) {
						content += '<param name="' + name + '" value="' + val + '"></param>';
						embed   += ' ' + name + '="' + val + '"';
					});

					content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + '></embed></object>';
				break;
			}

			if (!(isQuery(content) && content.parent().is(current.inner))) {
				current.inner.append( content );
			}

			// Give a chance for helpers or callbacks to update elements
			F.trigger('beforeShow');

			// Set scrolling before calculating dimensions
			current.inner.css('overflow', scrolling === 'yes' ? 'scroll' : (scrolling === 'no' ? 'hidden' : scrolling));

			// Set initial dimensions and start position
			F._setDimension();

			F.reposition();

			F.isOpen = false;
			F.coming = null;

			F.bindEvents();

			if (!F.isOpened) {
				$('.fancybox-wrap').not( current.wrap ).stop(true).trigger('onReset').remove();

			} else if (previous.prevMethod) {
				F.transitions[ previous.prevMethod ]();
			}

			F.transitions[ F.isOpened ? current.nextMethod : current.openMethod ]();

			F._preloadImages();
		},

		_setDimension: function () {
			var viewport   = F.getViewport(),
				steps      = 0,
				canShrink  = false,
				canExpand  = false,
				wrap       = F.wrap,
				skin       = F.skin,
				inner      = F.inner,
				current    = F.current,
				width      = current.width,
				height     = current.height,
				minWidth   = current.minWidth,
				minHeight  = current.minHeight,
				maxWidth   = current.maxWidth,
				maxHeight  = current.maxHeight,
				scrolling  = current.scrolling,
				scrollOut  = current.scrollOutside ? current.scrollbarWidth : 0,
				margin     = current.margin,
				wMargin    = getScalar(margin[1] + margin[3]),
				hMargin    = getScalar(margin[0] + margin[2]),
				wPadding,
				hPadding,
				wSpace,
				hSpace,
				origWidth,
				origHeight,
				origMaxWidth,
				origMaxHeight,
				ratio,
				width_,
				height_,
				maxWidth_,
				maxHeight_,
				iframe,
				body;

			// Reset dimensions so we could re-check actual size
			wrap.add(skin).add(inner).width('auto').height('auto').removeClass('fancybox-tmp');

			wPadding = getScalar(skin.outerWidth(true)  - skin.width());
			hPadding = getScalar(skin.outerHeight(true) - skin.height());

			// Any space between content and viewport (margin, padding, border, title)
			wSpace = wMargin + wPadding;
			hSpace = hMargin + hPadding;

			origWidth  = isPercentage(width)  ? (viewport.w - wSpace) * getScalar(width)  / 100 : width;
			origHeight = isPercentage(height) ? (viewport.h - hSpace) * getScalar(height) / 100 : height;

			if (current.type === 'iframe') {
				iframe = current.content;

				if (current.autoHeight && iframe.data('ready') === 1) {
					try {
						if (iframe[0].contentWindow.document.location) {
							inner.width( origWidth ).height(9999);

							body = iframe.contents().find('body');

							if (scrollOut) {
								body.css('overflow-x', 'hidden');
							}

							origHeight = body.height();
						}

					} catch (e) {}
				}

			} else if (current.autoWidth || current.autoHeight) {
				inner.addClass( 'fancybox-tmp' );

				// Set width or height in case we need to calculate only one dimension
				if (!current.autoWidth) {
					inner.width( origWidth );
				}

				if (!current.autoHeight) {
					inner.height( origHeight );
				}

				if (current.autoWidth) {
					origWidth = inner.width();
				}

				if (current.autoHeight) {
					origHeight = inner.height();
				}

				inner.removeClass( 'fancybox-tmp' );
			}

			width  = getScalar( origWidth );
			height = getScalar( origHeight );

			ratio  = origWidth / origHeight;

			// Calculations for the content
			minWidth  = getScalar(isPercentage(minWidth) ? getScalar(minWidth, 'w') - wSpace : minWidth);
			maxWidth  = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, 'w') - wSpace : maxWidth);

			minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, 'h') - hSpace : minHeight);
			maxHeight = getScalar(isPercentage(maxHeight) ? getScalar(maxHeight, 'h') - hSpace : maxHeight);

			// These will be used to determine if wrap can fit in the viewport
			origMaxWidth  = maxWidth;
			origMaxHeight = maxHeight;

			if (current.fitToView) {
				maxWidth  = Math.min(viewport.w - wSpace, maxWidth);
				maxHeight = Math.min(viewport.h - hSpace, maxHeight);
			}

			maxWidth_  = viewport.w - wMargin;
			maxHeight_ = viewport.h - hMargin;

			if (current.aspectRatio) {
				if (width > maxWidth) {
					width  = maxWidth;
					height = getScalar(width / ratio);
				}

				if (height > maxHeight) {
					height = maxHeight;
					width  = getScalar(height * ratio);
				}

				if (width < minWidth) {
					width  = minWidth;
					height = getScalar(width / ratio);
				}

				if (height < minHeight) {
					height = minHeight;
					width  = getScalar(height * ratio);
				}

			} else {
				width = Math.max(minWidth, Math.min(width, maxWidth));

				if (current.autoHeight && current.type !== 'iframe') {
					inner.width( width );

					height = inner.height();
				}

				height = Math.max(minHeight, Math.min(height, maxHeight));
			}

			// Try to fit inside viewport (including the title)
			if (current.fitToView) {
				inner.width( width ).height( height );

				wrap.width( width + wPadding );

				// Real wrap dimensions
				width_  = wrap.width();
				height_ = wrap.height();

				if (current.aspectRatio) {
					while ((width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight) {
						if (steps++ > 19) {
							break;
						}

						height = Math.max(minHeight, Math.min(maxHeight, height - 10));
						width  = getScalar(height * ratio);

						if (width < minWidth) {
							width  = minWidth;
							height = getScalar(width / ratio);
						}

						if (width > maxWidth) {
							width  = maxWidth;
							height = getScalar(width / ratio);
						}

						inner.width( width ).height( height );

						wrap.width( width + wPadding );

						width_  = wrap.width();
						height_ = wrap.height();
					}

				} else {
					width  = Math.max(minWidth,  Math.min(width,  width  - (width_  - maxWidth_)));
					height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_)));
				}
			}

			if (scrollOut && scrolling === 'auto' && height < origHeight && (width + wPadding + scrollOut) < maxWidth_) {
				width += scrollOut;
			}

			inner.width( width ).height( height );

			wrap.width( width + wPadding );

			width_  = wrap.width();
			height_ = wrap.height();

			canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight;
			canExpand = current.aspectRatio ? (width < origMaxWidth && height < origMaxHeight && width < origWidth && height < origHeight) : ((width < origMaxWidth || height < origMaxHeight) && (width < origWidth || height < origHeight));

			$.extend(current, {
				dim : {
					width	: getValue( width_ ),
					height	: getValue( height_ )
				},
				origWidth  : origWidth,
				origHeight : origHeight,
				canShrink  : canShrink,
				canExpand  : canExpand,
				wPadding   : wPadding,
				hPadding   : hPadding,
				wrapSpace  : height_ - skin.outerHeight(true),
				skinSpace  : skin.height() - height
			});

			if (!iframe && current.autoHeight && height > minHeight && height < maxHeight && !canExpand) {
				inner.height('auto');
			}
		},

		_getPosition: function (onlyAbsolute) {
			var current  = F.current,
				viewport = F.getViewport(),
				margin   = current.margin,
				width    = F.wrap.width()  + margin[1] + margin[3],
				height   = F.wrap.height() + margin[0] + margin[2],
				rez      = {
					position: 'absolute',
					top  : margin[0],
					left : margin[3]
				};

			if (current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w) {
				rez.position = 'fixed';

			} else if (!current.locked) {
				rez.top  += viewport.y;
				rez.left += viewport.x;
			}

			rez.top  = getValue(Math.max(rez.top,  rez.top  + ((viewport.h - height) * current.topRatio)));
			rez.left = getValue(Math.max(rez.left, rez.left + ((viewport.w - width)  * current.leftRatio)));

			return rez;
		},

		_afterZoomIn: function () {
			var current = F.current;

			if (!current) {
				return;
			}

			F.isOpen = F.isOpened = true;

			F.wrap.css('overflow', 'visible').addClass('fancybox-opened');

			F.update();

			// Assign a click event
			if ( current.closeClick || (current.nextClick && F.group.length > 1) ) {
				F.inner.css('cursor', 'pointer').bind('click.fb', function(e) {
					if (!$(e.target).is('a') && !$(e.target).parent().is('a')) {
						e.preventDefault();

						F[ current.closeClick ? 'close' : 'next' ]();
					}
				});
			}

			// Create a close button
			if (current.closeBtn) {
				$(current.tpl.closeBtn).appendTo(F.skin).bind( isTouch ? 'touchstart.fb' : 'click.fb', function(e) {
					e.preventDefault();

					F.close();
				});
			}

			// Create navigation arrows
			if (current.arrows && F.group.length > 1) {
				if (current.loop || current.index > 0) {
					$(current.tpl.prev).appendTo(F.outer).bind('click.fb', F.prev);
				}

				if (current.loop || current.index < F.group.length - 1) {
					$(current.tpl.next).appendTo(F.outer).bind('click.fb', F.next);
				}
			}

			F.trigger('afterShow');

			// Stop the slideshow if this is the last item
			if (!current.loop && current.index === current.group.length - 1) {
				F.play( false );

			} else if (F.opts.autoPlay && !F.player.isActive) {
				F.opts.autoPlay = false;

				F.play();
			}
		},

		_afterZoomOut: function ( obj ) {
			obj = obj || F.current;

			$('.fancybox-wrap').trigger('onReset').remove();

			$.extend(F, {
				group  : {},
				opts   : {},
				router : false,
				current   : null,
				isActive  : false,
				isOpened  : false,
				isOpen    : false,
				isClosing : false,
				wrap   : null,
				skin   : null,
				outer  : null,
				inner  : null
			});

			F.trigger('afterClose', obj);
		}
	});

	/*
	 *	Default transitions
	 */

	F.transitions = {
		getOrigPosition: function () {
			var current  = F.current,
				element  = current.element,
				orig     = current.orig,
				pos      = {},
				width    = 50,
				height   = 50,
				hPadding = current.hPadding,
				wPadding = current.wPadding,
				viewport = F.getViewport();

			if (!orig && current.isDom && element.is(':visible')) {
				orig = element.find('img:first');

				if (!orig.length) {
					orig = element;
				}
			}

			if (isQuery(orig)) {
				pos = orig.offset();

				if (orig.is('img')) {
					width  = orig.outerWidth();
					height = orig.outerHeight();
				}

			} else {
				pos.top  = viewport.y + (viewport.h - height) * current.topRatio;
				pos.left = viewport.x + (viewport.w - width)  * current.leftRatio;
			}

			if (F.wrap.css('position') === 'fixed' || current.locked) {
				pos.top  -= viewport.y;
				pos.left -= viewport.x;
			}

			pos = {
				top     : getValue(pos.top  - hPadding * current.topRatio),
				left    : getValue(pos.left - wPadding * current.leftRatio),
				width   : getValue(width  + wPadding),
				height  : getValue(height + hPadding)
			};

			return pos;
		},

		step: function (now, fx) {
			var ratio,
				padding,
				value,
				prop       = fx.prop,
				current    = F.current,
				wrapSpace  = current.wrapSpace,
				skinSpace  = current.skinSpace;

			if (prop === 'width' || prop === 'height') {
				ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start);

				if (F.isClosing) {
					ratio = 1 - ratio;
				}

				padding = prop === 'width' ? current.wPadding : current.hPadding;
				value   = now - padding;

				F.skin[ prop ](  getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) ) );
				F.inner[ prop ]( getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) - (skinSpace * ratio) ) );
			}
		},

		zoomIn: function () {
			var current  = F.current,
				startPos = current.pos,
				effect   = current.openEffect,
				elastic  = effect === 'elastic',
				endPos   = $.extend({opacity : 1}, startPos);

			// Remove "position" property that breaks older IE
			delete endPos.position;

			if (elastic) {
				startPos = this.getOrigPosition();

				if (current.openOpacity) {
					startPos.opacity = 0.1;
				}

			} else if (effect === 'fade') {
				startPos.opacity = 0.1;
			}

			F.wrap.css(startPos).animate(endPos, {
				duration : effect === 'none' ? 0 : current.openSpeed,
				easing   : current.openEasing,
				step     : elastic ? this.step : null,
				complete : F._afterZoomIn
			});
		},

		zoomOut: function () {
			var current  = F.current,
				effect   = current.closeEffect,
				elastic  = effect === 'elastic',
				endPos   = {opacity : 0.1};

			if (elastic) {
				endPos = this.getOrigPosition();

				if (current.closeOpacity) {
					endPos.opacity = 0.1;
				}
			}

			F.wrap.animate(endPos, {
				duration : effect === 'none' ? 0 : current.closeSpeed,
				easing   : current.closeEasing,
				step     : elastic ? this.step : null,
				complete : F._afterZoomOut
			});
		},

		changeIn: function () {
			var current   = F.current,
				effect    = current.nextEffect,
				startPos  = current.pos,
				endPos    = { opacity : 1 },
				direction = F.direction,
				distance  = 200,
				field;

			startPos.opacity = 0.1;

			if (effect === 'elastic') {
				field = direction === 'down' || direction === 'up' ? 'top' : 'left';

				if (direction === 'down' || direction === 'right') {
					startPos[ field ] = getValue(getScalar(startPos[ field ]) - distance);
					endPos[ field ]   = '+=' + distance + 'px';

				} else {
					startPos[ field ] = getValue(getScalar(startPos[ field ]) + distance);
					endPos[ field ]   = '-=' + distance + 'px';
				}
			}

			// Workaround for http://bugs.jquery.com/ticket/12273
			if (effect === 'none') {
				F._afterZoomIn();

			} else {
				F.wrap.css(startPos).animate(endPos, {
					duration : current.nextSpeed,
					easing   : current.nextEasing,
					complete : function() {
						// This helps FireFox to properly render the box
						setTimeout(F._afterZoomIn, 20);
					}
				});
			}
		},

		changeOut: function () {
			var previous  = F.previous,
				effect    = previous.prevEffect,
				endPos    = { opacity : 0.1 },
				direction = F.direction,
				distance  = 200;

			if (effect === 'elastic') {
				endPos[ direction === 'down' || direction === 'up' ? 'top' : 'left' ] = ( direction === 'up' || direction === 'left' ? '-' : '+' ) + '=' + distance + 'px';
			}

			previous.wrap.animate(endPos, {
				duration : effect === 'none' ? 0 : previous.prevSpeed,
				easing   : previous.prevEasing,
				complete : function () {
					$(this).trigger('onReset').remove();
				}
			});
		}
	};

	/*
	 *	Overlay helper
	 */

	F.helpers.overlay = {
		defaults : {
			closeClick : true,  // if true, fancyBox will be closed when user clicks on the overlay
			speedOut   : 200,   // duration of fadeOut animation
			showEarly  : true,  // indicates if should be opened immediately or wait until the content is ready
			css        : {},    // custom CSS properties
			locked     : !isTouch,  // if true, the content will be locked into overlay
			fixed      : true   // if false, the overlay CSS position property will not be set to "fixed"
		},

		overlay : null,   // current handle
		fixed   : false,  // indicates if the overlay has position "fixed"

		// Public methods
		create : function(opts) {
			opts = $.extend({}, this.defaults, opts);

			if (this.overlay) {
				this.close();
			}

			this.overlay = $('<div class="fancybox-overlay"></div>').appendTo( 'body' );
			this.fixed   = false;

			if (opts.fixed && F.defaults.fixed) {
				this.overlay.addClass('fancybox-overlay-fixed');

				this.fixed = true;
			}
		},

		open : function(opts) {
			var that = this;

			opts = $.extend({}, this.defaults, opts);

			if (this.overlay) {
				this.overlay.unbind('.overlay').width('auto').height('auto');

			} else {
				this.create(opts);
			}

			if (!this.fixed) {
				W.bind('resize.overlay', $.proxy( this.update, this) );

				this.update();
			}

			if (opts.closeClick) {
				this.overlay.bind('click.overlay', function(e) {
					if ($(e.target).hasClass('fancybox-overlay')) {
						if (F.isActive) {
							F.close();
						} else {
							that.close();
						}
					}
				});
			}

			this.overlay.css( opts.css ).show();
		},

		close : function() {
			$('.fancybox-overlay').remove();

			W.unbind('resize.overlay');

			this.overlay = null;

			if (this.margin !== false) {
				$('body').css('margin-right', this.margin);

				this.margin = false;
			}

			if (this.el) {
				this.el.removeClass('fancybox-lock');
			}
		},

		// Private, callbacks

		update : function () {
			var width = '100%', offsetWidth;

			// Reset width/height so it will not mess
			this.overlay.width(width).height('100%');

			// jQuery does not return reliable result for IE
			if ($.browser.msie) {
				offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);

				if (D.width() > offsetWidth) {
					width = D.width();
				}

			} else if (D.width() > W.width()) {
				width = D.width();
			}

			this.overlay.width(width).height(D.height());
		},

		// This is where we can manipulate DOM, because later it would cause iframes to reload
		onReady : function (opts, obj) {
			$('.fancybox-overlay').stop(true, true);

			if (!this.overlay) {
				this.margin = D.height() > W.height() || $('body').css('overflow-y') === 'scroll' ? $('body').css('margin-right') : false;
				this.el     = document.all && !document.querySelector ? $('html') : $('body');

				this.create(opts);
			}

			if (opts.locked && this.fixed) {
				obj.locked = this.overlay.append( obj.wrap );
				obj.fixed  = false;
			}

			if (opts.showEarly === true) {
				this.beforeShow.apply(this, arguments);
			}
		},

		beforeShow : function(opts, obj) {
			if (obj.locked) {
				this.el.addClass('fancybox-lock');

				if (this.margin !== false) {
					$('body').css('margin-right', getScalar( this.margin ) + obj.scrollbarWidth);
				}
			}

			this.open(opts);
		},

		onUpdate : function() {
			if (!this.fixed) {
				this.update();
			}
		},

		afterClose: function (opts) {
			// Remove overlay if exists and fancyBox is not opening
			// (e.g., it is not being open using afterClose callback)
			if (this.overlay && !F.isActive) {
				this.overlay.fadeOut(opts.speedOut, $.proxy( this.close, this ));
			}
		}
	};

	/*
	 *	Title helper
	 */

	F.helpers.title = {
		defaults : {
			type     : 'float', // 'float', 'inside', 'outside' or 'over',
			position : 'bottom' // 'top' or 'bottom'
		},

		beforeShow: function (opts) {
			var current = F.current,
				text    = current.title,
				type    = opts.type,
				title,
				target;

			if ($.isFunction(text)) {
				text = text.call(current.element, current);
			}

			if (!isString(text) || $.trim(text) === '') {
				return;
			}

			title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + '</div>');

			switch (type) {
				case 'inside':
					target = F.skin;
				break;

				case 'outside':
					target = F.wrap;
				break;

				case 'over':
					target = F.inner;
				break;

				default: // 'float'
					target = F.skin;

					title.appendTo('body');

					if ($.browser.msie) {
						title.width( title.width() );
					}

					title.wrapInner('<span class="child"></span>');

					//Increase bottom margin so this title will also fit into viewport
					F.current.margin[2] += Math.abs( getScalar(title.css('margin-bottom')) );
				break;
			}

			title[ (opts.position === 'top' ? 'prependTo'  : 'appendTo') ](target);
		}
	};

	// jQuery plugin initialization
	$.fn.fancybox = function (options) {
		var index,
			that     = $(this),
			selector = this.selector || '',
			run      = function(e) {
				var what = $(this).blur(), idx = index, relType, relVal;

				if (!(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey) && !what.is('.fancybox-wrap')) {
					relType = options.groupAttr || 'data-fancybox-group';
					relVal  = what.attr(relType);

					if (!relVal) {
						relType = 'rel';
						relVal  = what.get(0)[ relType ];
					}

					if (relVal && relVal !== '' && relVal !== 'nofollow') {
						what = selector.length ? $(selector) : that;
						what = what.filter('[' + relType + '="' + relVal + '"]');
						idx  = what.index(this);
					}

					options.index = idx;

					// Stop an event from bubbling if everything is fine
					if (F.open(what, options) !== false) {
						e.preventDefault();
					}
				}
			};

		options = options || {};
		index   = options.index || 0;

		if (!selector || options.live === false) {
			that.unbind('click.fb-start').bind('click.fb-start', run);

		} else {
			D.undelegate(selector, 'click.fb-start').delegate(selector + ":not('.fancybox-item, .fancybox-nav')", 'click.fb-start', run);
		}

		this.filter('[data-fancybox-start=1]').trigger('click');

		return this;
	};

	// Tests that need a body at doc ready
	D.ready(function() {
		if ( $.scrollbarWidth === undefined ) {
			// http://benalman.com/projects/jquery-misc-plugins/#scrollbarwidth
			$.scrollbarWidth = function() {
				var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body'),
					child  = parent.children(),
					width  = child.innerWidth() - child.height( 99 ).innerWidth();

				parent.remove();

				return width;
			};
		}

		if ( $.support.fixedPosition === undefined ) {
			$.support.fixedPosition = (function() {
				var elem  = $('<div style="position:fixed;top:20px;"></div>').appendTo('body'),
					fixed = ( elem[0].offsetTop === 20 || elem[0].offsetTop === 15 );

				elem.remove();

				return fixed;
			}());
		}

		$.extend(F.defaults, {
			scrollbarWidth : $.scrollbarWidth(),
			fixed  : $.support.fixedPosition,
			parent : $('body')
		});
	});

}(window, document, jQuery));
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(1x).1v(4(){X();N();I();1j();1b();$("#1w").1y(\'h\',4(){7($(g).b("j")==\'1q\'){$.d("项目未开始！")}a{$.d("项目已结束！")}})});4 1b(){$(".1K").n("h",4(){6 8=$(g).b("j");$(".1A[j="+8+"]").1M("1E")})}$.1D=4(8){6 u=$(8).1B();7(m.y){m.y.1C();6 Q=m.y.S("1G",u);7(Q===1H)$.Y("已经拷贝到剪切板");a $.d("拷贝失败")}a 7(1L.1I.1J("1N")!=-1){m.P=u}a 7(m.Z){1s{Z.1u.1t.1z("1r")}1F(e){$.d("非29内核，无法拷贝")}6 w=c.H[\'@E.z/L/24;1\'].C(c.v.10);7(!w)B;6 o=c.H[\'@E.z/L/27;1\'].C(c.v.26);7(!o)B;o.25(\'J/W\');6 q=T U();6 23=T U();6 q=c.H["@E.z/28-2d;1"].C(c.v.2c);6 D=u;q.2b=D;o.2a("J/W",q,D.22*2);6 V=c.v.10;7(!w)B 20;w.S(o,21,V.1T);$.Y("已经拷贝到剪切板")}};4 X(){$(".1S").n("h",4(){P.1O=$(g).b("A")})}4 N(){$(".1P").n("h",4(){6 s=$(g).t("s").b("j");$.1Q.1U(s)})}4 I(){$(".0").n("h",4(){0($(g).b("8"))})}4 0(8){6 p=1n+"/F.1i?1l=1o&1m=1p&8="+8;$.1f({A:p,1g:"17",15:"14",12:4(9){7(9.f==1){$(".0").5("r");$(".0").5("x");$(".0").5("O");$(".0").5("K");$(".0").5("M");$(".0").5("R");$(".0").l("x");$(".0").b("j","x");$(".0").t("13 11").1h("取消关注")}a 7(9.f==2){$(".0").5("r");$(".0").5("x");$(".0").5("O");$(".0").5("K");$(".0").5("M");$(".0").5("R");$(".0").l("r");$(".0").b("j","r");$(".0").t("13 11").1h("立即关注")}a 7(9.f==3){$.d(9.1d)}a{1a()}},16:4(9){}})}4 1j(){$(".k").n("h",4(){k($(g).b("8"))})}4 k(8){6 p=1n+"/F.1i?1l=1o&1m=1p&8="+8;$.1f({A:p,1g:"17",15:"14",12:4(9){7(9.f==1){$(".k").b("18","取消关注").5("1e").l("19")}a 7(9.f==2){$(".k").b("18","关注").5("19").l("1e")}a 7(9.f==3){$.d(9.1d)}a{1a()}},16:4(9){}})}4 1V(G){6 i=$(G).F();$(G).l("1c").1k().5("1c");$(".1Z").t("s").1Y(i).1X(1W).1k().1R()}',62,138,'focus_deal||||function|removeClass|var|if|id|ajaxobj|else|attr|Components|showErr||status|this|click||rel|attention_focus_deal|addClass|window|bind|trans|ajaxurl|str|blue|img|find|txt|interfaces|clip|gray|clipboardData|org|url|return|createInstance|copytext|mozilla|index|obj|classes|bind_focus|text|gray_hover|widget|blue_active|bind_zoom|blue_hover|location|judge|gray_active|setData|new|Object|clipid|unicode|bind_buy_link|showSuccess|netscape|nsIClipboard|span|success|div|POST|type|error|json|title|qxgz|show_pop_login|bind_faq|active|info|gz|ajax|dataType|html|php|attention_bind_focus|siblings|ctl|act|APP_ROOT|deal|focus|preheat|UniversalXPConnect|try|PrivilegeManager|security|ready|J_btn_end|document|on|enablePrivilege|faq_answer|val|clearData|copyText|slow|catch|Text|true|userAgent|indexOf|faq_question|navigator|toggle|Opera|href|image_item|fancybox|hide|buy_deal_item|kGlobalClipboard|open|scrollTo|300|fadeIn|eq|img_show|false|null|length|len|clipboard|addDataFlavor|nsITransferable|transferable|supports|IE|setTransferData|data|nsISupportsString|string'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(S).T(2(){A();$(".X").U(2(){$(4).5(".v").B()},2(){$(4).5(".v").z()})});2 A(){$(".v").h("k",2(){c o=$(4).s("i");c W=$(4).7().7().7();$.P("确认要删除该记录吗？",2(){c e=Q R();e.u=1;$.u({E:o,G:"K",N:e,O:"H",C:2(0){3(0.w==1){V();d.y()}g{3(0.p!=""){$.x(0.p,2(){3(0.b!=""){d.i=0.b}})}g{3(0.b!=""){d.i=0.b}}}},F:2(0){3(0.m!=\'\')D(0.m)}})});r n});$(".13").h("k",2(){3($(4).7().7().5(".q").Y("16")=="17")$(4).7().7().5(".q").B();g $(4).7().7().5(".q").z()});$("6[8=\'l\']").5(".14").9("发表评论");$("6[8=\'l\']").5("Z[8=\'10\']").s("11",n);$("6[8=\'l\']").5("f[8=\'a\']").h("M k",2(){3($.j($(4).9())==""||$.j($(4).9())=="发表评论"){$(4).9("")}});$("6[8=\'l\']").5("f[8=\'a\']").h("15",2(){3($.j($(4).9())==""||$.j($(4).9())=="发表评论"){$(4).9("发表评论")}});$(".t").h("k",2(){c 6=$(4).7().7();c a=$.j($(6).5("f[8=\'a\']").9());3(a==""||a=="发表评论"){$(6).5("f[8=\'a\']").9("");$(6).5("f[8=\'a\']").M();r n}3($(6).5(".t L I").J()=="发送中"){r n}c o=$(6).s("12");c e=$(6).18();$(6).5(".t L I").J("发送中");$.u({E:o,G:"K",N:e,O:"H",C:2(0){3(0.w==1){d.y()}g{3(0.p!=""){$.x(0.p,2(){3(0.b!=""){d.i=0.b}})}g{3(0.b!=""){d.i=0.b}}}},F:2(0){3(0.m!=\'\')D(0.m)}})})}',62,71,'ajaxobj||function|if|this|find|form|parent|name|val|content|jump|var|location|query|textarea|else|bind|href|trim|click|comment_form|responseText|false|ajaxurl|info|reply_box|return|attr|send_btn|ajax|delcomment|status|showErr|reload|hide|bind_comment_form|show|success|alert|url|error|dataType|POST|span|html|json|div|focus|data|type|showConfirm|new|Object|document|ready|hover|close_pop|comment_box|comment_item|css|input|syn_weibo|checked|action|replycomment|comment_form_content|blur|display|none|serialize'.split('|'),0,{}))
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';(6(a){a.2C.1X=6(b){8 a.2C.1X.2I={2N:"1X",2J:"1O",2u:!1,2Z:3E,2X:3F,1Z:36,1P:0,2f:".3G 2F",2V:".3D",2v:1l,2x:"2y",2L:1,2S:1,2W:"3C",1F:!1,2K:".3y",2H:".3z",32:".3A",2A:!1,2E:!0,1j:"2n",2s:1l,2j:1l,2O:1l,30:".3B",2l:!0,2r:!0,2p:!1},17.2i(6(){s c=a.34({},a.2C.1X.2I,b),d=a(17),e=c.2J,f=a(c.2K,d),g=a(c.2H,d),h=a(c.32,d),i=a(c.30,d),j=a(c.2f,d),k=j.2B(),l=a(c.2V,d),m=l.19().2B(),n=c.2O,o=a(c.2v,d),p=1t(c.1P),q=1t(c.2Z),r=1t(c.2X);1t(c.1Z);s P,t=1t(c.2L),u=1t(c.2S),v="1s"==c.2u||0==c.2u?!1:!0,w="1s"==c.2A||0==c.2A?!1:!0,x="1s"==c.1F||0==c.1F?!1:!0,y="1s"==c.2E||0==c.2E?!1:!0,z="1s"==c.2l||0==c.2l?!1:!0,A="1s"==c.2r||0==c.2r?!1:!0,B="1s"==c.2p||0==c.2p?!1:!0,C=0,D=0,E=0,F=0,G=c.1j,H=1l,I=1l,J=1l,K=c.2W,L=j.20(d.1I("."+K)),M=p=1P=-1==L?p:L,N=p,O=m>=u?0!=m%t?m%t:t:0,Q="1A"==e||"1T"==e?!0:!1,R=6(){a.2Y(c.2s)&&c.2s(p,k,d,a(c.2f,d),l,o,f,g)},S=6(){a.2Y(c.2j)&&c.2j(p,k,d,a(c.2f,d),l,o,f,g)},T=6(){j.1r(K),A&&j.1b(1P).1f(K)};13("3K"==c.2N)8 A&&j.1r(K).1b(p).1f(K),j.1o(6(){P=a(17).1I(c.2v);s b=j.20(a(17));I=1G(6(){1H(p=b,j.1r(K).1b(p).1f(K),R(),e){11"1O":P.1d(!0,!0).16({1u:"1N"},q,G,S);18;11"1D":P.1d(!0,!0).16({1h:"1N"},q,G,S)}},c.1Z)},6(){1H(1M(I),e){11"1O":P.16({1u:"1E"},q,G);18;11"1D":P.16({1h:"1E"},q,G)}}),B&&d.1o(6(){1M(J)},6(){J=1G(T,q)}),2c 0;13(0==k&&(k=m),Q&&(k=2),x){13(m>=u)13("24"==e||"1Y"==e)k=0!=m%t?(0^m/t)+1:m/t;1w{s U=m-u;k=1+1t(0!=U%t?U/t+1:U/t),0>=k&&(k=1)}1w k=1;j.2k("");s V="";13(1==c.1F||"3j"==c.1F)1C(s W=0;k>W;W++)V+="<2F>"+(W+1)+"</2F>";1w 1C(s W=0;k>W;W++)V+=c.1F.1k("$",W+1);j.2k(V);s j=j.19()}13(m>=u){l.19().2i(6(){a(17).1c()>E&&(E=a(17).1c(),D=a(17).3i(!0)),a(17).1h()>F&&(F=a(17).1h(),C=a(17).3h(!0))});s X=l.19(),Y=6(){1C(s a=0;u>a;a++)X.1b(a).1J().1f("1J").3d(l);1C(s a=0;O>a;a++)X.1b(m-a-1).1J().1f("1J").3e(l)};1H(e){11"2D":l.12({1g:"1n",1c:D,1h:C}).19().12({1g:"3f",1c:E,14:0,15:0,3g:"3m"});18;11"15":l.2h(\'<1p 27="28" 29="1z:1x; 1g:1n; 1h:\'+u*C+\'1a"></1p>\').12({15:-(p*t)*C,1g:"1n",2a:"0",2g:"0"}).19().12({1h:F});18;11"14":l.2h(\'<1p 27="28" 29="1z:1x; 1g:1n; 1c:\'+u*D+\'1a"></1p>\').12({1c:m*D,14:-(p*t)*D,1g:"1n",1z:"1x",2a:"0",2g:"0"}).19().12({"2U":"14",1c:E});18;11"24":11"1A":Y(),l.2h(\'<1p 27="28" 29="1z:1x; 1g:1n; 1c:\'+u*D+\'1a"></1p>\').12({1c:(m+u+O)*D,1g:"1n",1z:"1x",2a:"0",2g:"0",14:-(O+p*t)*D}).19().12({"2U":"14",1c:E});18;11"1Y":11"1T":Y(),l.2h(\'<1p 27="28" 29="1z:1x; 1g:1n; 1h:\'+u*C+\'1a"></1p>\').12({1h:(m+u+O)*C,1g:"1n",2a:"0",2g:"0",15:-(O+p*t)*C}).19().12({1h:F})}}s Z=6(a){s b=a*t;8 a==k?b=m:-1==a&&0!=m%t&&(b=-m%t),b},$=6(b){s c=6(c){1C(s d=c;u+c>d;d++)b.1b(d).1I("2T["+n+"]").2i(6(){s b=a(17);13(b.1y("2o",b.1y(n)).2Q(n),l.1I(".1J")[0])1C(s c=l.19(),d=0;c.2B()>d;d++)c.1b(d).1I("2T["+n+"]").2i(6(){a(17).1y(n)==b.1y("2o")&&a(17).1y("2o",a(17).1y(n)).2Q(n)})})};1H(e){11"1O":11"2D":11"15":11"14":11"1D":c(p*t);18;11"24":11"1Y":c(O+Z(N));18;11"1A":11"1T":s d="1A"==e?l.12("14").1k("1a",""):l.12("15").1k("1a",""),f="1A"==e?D:C,g=O;13(0!=d%f){s h=9.2e(0^d/f);g=1==p?O+h:O+h-1}c(g)}},1m=6(a){13(!A||M!=p||a||Q){13(Q?p>=1?p=1:0>=p&&(p=0):(N=p,p>=k?p=0:0>p&&(p=k-1)),R(),1l!=n&&$(l.19()),o[0]&&(P=o.1b(p),1l!=n&&$(o),"1D"==e?(o.2P(P).1d(!0,!0).33(q),P.1D(q,G,6(){l[0]||S()})):(o.2P(P).1d(!0,!0).1E(),P.16({1u:"1N"},q,6(){l[0]||S()}))),m>=u)1H(e){11"1O":l.19().1d(!0,!0).1b(p).16({1u:"1N"},q,G,6(){S()}).31().1E();18;11"2D":l.19().1d(!0,!0).1b(p).16({1u:"1N"},q,G,6(){S()}).31().16({1u:"1E"},q,G);18;11"15":l.1d(!0,!1).16({15:-p*t*C},q,G,6(){S()});18;11"14":l.1d(!0,!1).16({14:-p*t*D},q,G,6(){S()});18;11"24":s b=N;l.1d(!0,!0).16({14:-(Z(N)+O)*D},q,G,6(){-1>=b?l.12("14",-(O+(k-1)*t)*D):b>=k&&l.12("14",-O*D),S()});18;11"1Y":s b=N;l.1d(!0,!0).16({15:-(Z(N)+O)*C},q,G,6(){-1>=b?l.12("15",-(O+(k-1)*t)*C):b>=k&&l.12("15",-O*C),S()});18;11"1A":s c=l.12("14").1k("1a","");0==p?l.16({14:++c},0,6(){l.12("14").1k("1a","")>=0&&l.12("14",-m*D)}):l.16({14:--c},0,6(){-(m+O)*D>=l.12("14").1k("1a","")&&l.12("14",-O*D)});18;11"1T":s d=l.12("15").1k("1a","");0==p?l.16({15:++d},0,6(){l.12("15").1k("1a","")>=0&&l.12("15",-m*C)}):l.16({15:--d},0,6(){-(m+O)*C>=l.12("15").1k("1a","")&&l.12("15",-O*C)})}j.1r(K).1b(p).1f(K),M=p,y||(g.1r("2M"),f.1r("2G"),0==p&&f.1f("2G"),p==k-1&&g.1f("2M")),h.2k("<2R>"+(p+1)+"</2R>/"+k)}};A&&1m(!0),B&&d.1o(6(){1M(J)},6(){J=1G(6(){p=1P,A?1m():"1D"==e?P.33(q,T):P.16({1u:"1E"},q,T),M=p},3T)});s 1S=6(a){H=3b(6(){w?p--:p++,1m()},a?a:r)},1K=6(a){H=3b(1m,a?a:r)},1R=6(){z||(1L(H),1S())},1U=6(){(y||p!=k-1)&&(p++,1m(),Q||1R())},26=6(){(y||0!=p)&&(p--,1m(),Q||1R())},22=6(){1L(H),Q?1K():1S(),i.1r("23")},21=6(){1L(H),i.1f("23")};13(v?Q?(w?p--:p++,1K(),z&&l.1o(21,22)):(1S(),z&&d.1o(21,22)):(Q&&(w?p--:p++),i.1f("23")),i.1V(6(){i.3V("23")?22():21()}),"2y"==c.2x?j.1o(6(){s a=j.20(17);I=1G(6(){p=a,1m(),1R()},c.1Z)},6(){1M(I)}):j.1V(6(){p=j.20(17),1m(),1R()}),Q){13(g.1W(1U),f.1W(26),y){s 2w,2m=6(){2w=1G(6(){1L(H),1K(0^r/10)},36)},2z=6(){1M(2w),1L(H),1K()};g.1W(2m),g.35(2z),f.1W(2m),f.35(2z)}"2y"==c.2x&&(g.1o(1U,6(){}),f.1o(26,6(){}))}1w g.1V(1U),f.1V(26)})}})(1i),1i.1j.3W=1i.1j.2n,1i.34(1i.1j,{37:"38",2n:6(a,b,c,d,e){8 1i.1j[1i.1j.37](a,b,c,d,e)},3U:6(a,b,c,d,e){8 d*(b/=e)*b+c},38:6(a,b,c,d,e){8-d*(b/=e)*(b-2)+c},3X:6(a,b,c,d,e){8 1>(b/=e/2)?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},3Z:6(a,b,c,d,e){8 d*(b/=e)*b*b+c},41:6(a,b,c,d,e){8 d*((b=b/e-1)*b*b+1)+c},40:6(a,b,c,d,e){8 1>(b/=e/2)?d/2*b*b*b+c:d/2*((b-=2)*b*b+2)+c},3Y:6(a,b,c,d,e){8 d*(b/=e)*b*b*b+c},3R:6(a,b,c,d,e){8-d*((b=b/e-1)*b*b*b-1)+c},3q:6(a,b,c,d,e){8 1>(b/=e/2)?d/2*b*b*b*b+c:-d/2*((b-=2)*b*b*b-2)+c},3p:6(a,b,c,d,e){8 d*(b/=e)*b*b*b*b+c},3o:6(a,b,c,d,e){8 d*((b=b/e-1)*b*b*b*b+1)+c},3r:6(a,b,c,d,e){8 1>(b/=e/2)?d/2*b*b*b*b*b+c:d/2*((b-=2)*b*b*b*b+2)+c},3s:6(a,b,c,d,e){8-d*9.3c(b/e*(9.1e/2))+d+c},3v:6(a,b,c,d,e){8 d*9.1Q(b/e*(9.1e/2))+c},3u:6(a,b,c,d,e){8-d/2*(9.3c(9.1e*b/e)-1)+c},3t:6(a,b,c,d,e){8 0==b?c:d*9.1q(2,10*(b/e-1))+c},3n:6(a,b,c,d,e){8 b==e?c+d:d*(-9.1q(2,-10*b/e)+1)+c},3S:6(a,b,c,d,e){8 0==b?c:b==e?c+d:1>(b/=e/2)?d/2*9.1q(2,10*(b-1))+c:d/2*(-9.1q(2,-10*--b)+2)+c},3l:6(a,b,c,d,e){8-d*(9.2b(1-(b/=e)*b)-1)+c},3k:6(a,b,c,d,e){8 d*9.2b(1-(b=b/e-1)*b)+c},3w:6(a,b,c,d,e){8 1>(b/=e/2)?-d/2*(9.2b(1-b*b)-1)+c:d/2*(9.2b(1-(b-=2)*b)+1)+c},3x:6(a,b,c,d,e){s f=1.1B,g=0,h=d;13(0==b)8 c;13(1==(b/=e))8 c+d;13(g||(g=.3*e),9.2e(d)>h){h=d;s f=g/4}1w s f=g/(2*9.1e)*9.2t(d/h);8-(h*9.1q(2,10*(b-=1))*9.1Q((b*e-f)*2*9.1e/g))+c},3L:6(a,b,c,d,e){s f=1.1B,g=0,h=d;13(0==b)8 c;13(1==(b/=e))8 c+d;13(g||(g=.3*e),9.2e(d)>h){h=d;s f=g/4}1w s f=g/(2*9.1e)*9.2t(d/h);8 h*9.1q(2,-10*b)*9.1Q((b*e-f)*2*9.1e/g)+d+c},3J:6(a,b,c,d,e){s f=1.1B,g=0,h=d;13(0==b)8 c;13(2==(b/=e/2))8 c+d;13(g||(g=e*.3*1.5),9.2e(d)>h){h=d;s f=g/4}1w s f=g/(2*9.1e)*9.2t(d/h);8 1>b?-.5*h*9.1q(2,10*(b-=1))*9.1Q((b*e-f)*2*9.1e/g)+c:.5*h*9.1q(2,-10*(b-=1))*9.1Q((b*e-f)*2*9.1e/g)+d+c},3M:6(a,b,c,d,e,f){8 2c 0==f&&(f=1.1B),d*(b/=e)*b*((f+1)*b-f)+c},3N:6(a,b,c,d,e,f){8 2c 0==f&&(f=1.1B),d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},3Q:6(a,b,c,d,e,f){8 2c 0==f&&(f=1.1B),1>(b/=e/2)?d/2*b*b*(((f*=1.3a)+1)*b-f)+c:d/2*((b-=2)*b*(((f*=1.3a)+1)*b+f)+2)+c},39:6(a,b,c,d,e){8 d-1i.1j.2q(a,e-b,0,d,e)+c},2q:6(a,b,c,d,e){8 1/2.1v>(b/=e)?d*7.2d*b*b+c:2/2.1v>b?d*(7.2d*(b-=1.5/2.1v)*b+.1v)+c:2.5/2.1v>b?d*(7.2d*(b-=2.25/2.1v)*b+.3P)+c:d*(7.2d*(b-=2.3O/2.1v)*b+.3I)+c},3H:6(a,b,c,d,e){8 e/2>b?.5*1i.1j.39(a,2*b,0,d,e)+c:.5*1i.1j.2q(a,2*b-e,0,d,e)+.5*d+c}});',62,250,'||||||function||return|Math|||||||||||||||||||var|||||||||||||||||||||||||||||||||||case|css|if|left|top|animate|this|break|children|px|eq|width|stop|PI|addClass|position|height|jQuery|easing|replace|null|_|relative|hover|div|pow|removeClass|false|parseInt|opacity|75|else|hidden|attr|overflow|leftMarquee|70158|for|slideDown|hide|autoPage|setTimeout|switch|find|clone|bb|clearInterval|clearTimeout|show|fade|defaultIndex|sin|cb|ab|topMarquee|db|click|mousedown|slide|topLoop|triggerTime|index|gb|fb|pauseState|leftLoop||eb|class|tempWrap|style|padding|sqrt|void|5625|abs|titCell|margin|wrap|each|endFun|html|mouseOverStop|ib|swing|src|returnDefault|easeOutBounce|defaultPlay|startFun|asin|autoPlay|targetCell|hb|trigger|mouseover|jb|opp|size|fn|fold|pnLoop|li|prevStop|nextCell|defaults|effect|prevCell|scroll|nextStop|type|switchLoad|not|removeAttr|span|vis|img|float|mainCell|titOnClassName|interTime|isFunction|delayTime|playStateCell|siblings|pageStateCell|slideUp|extend|mouseup|150|def|easeOutQuad|easeInBounce|525|setInterval|cos|appendTo|prependTo|absolute|display|outerHeight|outerWidth|true|easeOutCirc|easeInCirc|none|easeOutExpo|easeOutQuint|easeInQuint|easeInOutQuart|easeInOutQuint|easeInSine|easeInExpo|easeInOutSine|easeOutSine|easeInOutCirc|easeInElastic|prev|next|pageState|playState|on|effect_bd|3000|4000|effect_hd|easeInOutBounce|984375|easeInOutElastic|menu|easeOutElastic|easeInBack|easeOutBack|625|9375|easeInOutBack|easeOutQuart|easeInOutExpo|300|easeInQuad|hasClass|jswing|easeInOutQuad|easeInQuart|easeInCubic|easeInOutCubic|easeOutCubic'.split('|'),0,{}))
