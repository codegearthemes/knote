/**
 * Scripts
 *
 * @author      CodegearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.1.0
 *
 */

window.knote = window.knote || {};
(function () {
	'use strict';

	knote.delegate = {
		on: function (event, callback, options) {
			if (!this.namespaces) // save the namespaces on the DOM element itself
				this.namespaces = {};

			this.namespaces[event] = callback;
			options = options || false;

			this.addEventListener(event.split('.')[0], callback, options);
			return this;
		},
		off: function (event) {
			if (!this.namespaces) { return }
			this.removeEventListener(event.split('.')[0], this.namespaces[event]);
			delete this.namespaces[event];
			return this;
		}
	};

	// Extend the DOM with these above custom methods
	window.on = Element.prototype.on = knote.delegate.on;
	window.off = Element.prototype.off = knote.delegate.off;

	knote.selectors = function () {
		knote.$cache = {
			// General
			$body: document.body,
			$html: document.querySelector('html'),
		};
	};

	knote.a11y = {
		trapFocus: function (options) {
			var eventsName = {
				focusin: options.namespace ? 'focusin.' + options.namespace : 'focusin',
				focusout: options.namespace
					? 'focusout.' + options.namespace
					: 'focusout',
				keydown: options.namespace
					? 'keydown.' + options.namespace
					: 'keydown.handleFocus'
			};

			// Get every possible visible focusable element
			var focusableEls = options.container.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex^="-"])');
			var elArray = [].slice.call(focusableEls);
			var focusableElements = elArray.filter(el => el.offsetParent !== null);

			var firstFocusable = focusableElements[0];
			var lastFocusable = focusableElements[focusableElements.length - 1];

			if (!options.elementToFocus) {
				options.elementToFocus = options.container;
			}

			options.container.setAttribute('tabindex', '-1');
			options.elementToFocus.focus();

			document.documentElement.off('focusin');
			document.documentElement.on(eventsName.focusout, function () {
				document.documentElement.off(eventsName.keydown);
			});

			document.documentElement.on(eventsName.focusin, function (evt) {
				if (evt.target !== lastFocusable && evt.target !== firstFocusable) return;

				document.documentElement.on(eventsName.keydown, function (evt) {
					_manageFocus(evt);
				});
			});

			function _manageFocus(evt) {
				if (evt.keyCode !== 9 || evt.key !== 'Tab') return;
				/**
				 * On the first focusable element and tab backward,
				 * focus the last element
				 */
				if (evt.shiftKey) {
					if (evt.target === firstFocusable) {
						evt.preventDefault();
						lastFocusable.focus();
					}
				} else {
					if (evt.target === lastFocusable)
						evt.preventDefault();
					firstFocusable.focus();
				}
			}
		},
		removeTrapFocus: function (options) {
			var eventName = options.namespace
				? 'focusin.' + options.namespace
				: 'focusin';

			if (options.container) {
				options.container.removeAttribute('tabindex');
			}

			document.documentElement.off(eventName);
		},

		lockMobileScrolling: function (namespace, element) {
			var el = element ? element : document.documentElement;
			document.documentElement.classList.add('lock-scroll');
			el.on('touchmove' + namespace, function () {
				return true;
			});
		},

		unlockMobileScrolling: function (namespace, element) {
			document.documentElement.classList.remove('lock-scroll');
			var el = element ? element : document.documentElement;
			el.off('touchmove' + namespace);
		}
	};

	// Add class when tab key starts being used to show outlines
	document.documentElement.on('keyup.tab', function (evt) {
		if (evt.key == 'Tab' || evt.keyCode === 9) {
			document.documentElement.classList.add('outline');
			document.documentElement.off('keyup.tab');
		}
	});

	knote.getHash = function () {
		return window.location.hash;
	};

	knote.header = function () {
		const header = document.querySelector('[data-header]');

		// Get all menu links
		const links = header.querySelectorAll('.menu a');

		links.forEach((element) => {
			element.addEventListener('focusin', toggleFocus, true);
			element.addEventListener('focusout', toggleFocus, true);
		});

		/**
		 * Sets or removes .focus class on an element.
		 */
		function toggleFocus(event) {
			let self = event.currentTarget;

			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('menu')) {

				// On li elements toggle the class .focus.
				if (self.classList.contains('sub-menu-toggle')) {
					self.classList.toggle('focus');
				}

				self = self.parentElement;
			}
		}

		if (header?.getAttribute('data-sticky')) {

			// Variable to keep track of the last scroll position
			let lastScrollPosition = window.scrollY;

			// Store the initial position of the header
			const initialHeaderPosition = header.offsetTop;

			const handleScroll = () => {

				if (header?.getAttribute('data-sticky-direction') == 'scroll') {
					const scrollHeight = window.scrollY || document.documentElement.scrollTop;
					const headerHeight = header.getBoundingClientRect().top + 1000;

					header.classList.toggle('sticky-active', scrollHeight > headerHeight);
				} else {
					// Sticky reversed scroll
				}
			};

			window.addEventListener('scroll', handleScroll);
		}

		const mainMenu = header.querySelector('[data-main-menu]');
		const handleMenuReverse = (childMenu) => () => {
			if (!knote.isInHorizontalViewport(childMenu)) {
				childMenu.classList.add('sub-menu-reverse');
			}
		};

		const handleMenuReverseFocus = (childMenu) => () => {
			if (!knote.isInHorizontalViewport(childMenu)) {
				childMenu.classList.add('sub-menu-reverse');
			}
		};

		if (mainMenu?.querySelectorAll('li').length > 0) {
			mainMenu.querySelectorAll('li').forEach((menuItem) => {
				let childMenu = menuItem.querySelector('.sub-menu');

				if (childMenu) {
					const handleReverse = handleMenuReverse(childMenu);
					const handleReverseFocus = handleMenuReverseFocus(childMenu);

					menuItem.addEventListener('mouseover', handleReverse);
					menuItem.addEventListener('focusin', handleReverseFocus);

					menuItem.addEventListener('mouseout', function () {
						childMenu.classList.remove('sub-menu-reverse');
					});

					menuItem.addEventListener('focusout', function () {
						childMenu.classList.remove('sub-menu-reverse');
					});
				}
			});
		}
	};

	knote.searchToggle = function () {
		const searchForm = document.querySelector('[data-search-form]');
		const searchButtons = document.querySelectorAll('[data-search-toggle]');

		searchButtons.forEach((searchButton) => {
			searchButton.addEventListener('click', function () {
				searchForm.classList.toggle('active');

				knote.a11y.trapFocus({
					container: searchForm,
					namespace: 'search_focus'
				});
			})
		});
	};

	knote.drawersInit = function () {
		const drawersToInitialize = [
			{ id: 'drawer-navigation-menu', position: 'left' },
			{ id: 'drawer-widget-minicart', position: 'right' }
			// Add more objects for other drawers if needed
		];

		drawersToInitialize.forEach(drawer => {
			knote[`${drawer.position}Drawer`] = new knote.Drawer(drawer.id, drawer.position);
		});
	};

	knote.subMenuToggle = function () {
		const subNavToggleElements = document.querySelectorAll('[data-submenu-toggle]');

		subNavToggleElements.forEach(subNavToggle => {
			subNavToggle.addEventListener('click', function (event) {
				event.preventDefault();
				this.closest('li').classList.toggle('expanded');
			});
		});
	};

	knote.quantityInit = function () {
		document.addEventListener('click', function (event) {
			const target = event.target;
			const quantityButton = target.closest('.quantity button');

			if (quantityButton && quantityButton.closest('.quantity')) {
				const quantityElement = quantityButton.closest('.quantity');
				const qtyInput = quantityElement.querySelector('.qty');

				if (!qtyInput) return;

				const val = parseFloat(qtyInput.value);
				const max = parseFloat(qtyInput.getAttribute('max'));
				const min = parseFloat(qtyInput.getAttribute('min'));
				const step = parseFloat(qtyInput.getAttribute('step'));

				if (quantityButton.classList.contains('plus')) {
					if (max && max <= val) {
						qtyInput.value = max;
					} else {
						qtyInput.value = val + step;
					}
				} else if (quantityButton.classList.contains('minus')) {
					if (min && min >= val) {
						qtyInput.value = min;
					} else if (val > 1) {
						qtyInput.value = val - step;
					}
				}
			}
		});
	};

	knote.collapsible = function () {
		const collapsibleTitles = document.querySelectorAll('[data-collapsible-title]');

		collapsibleTitles.forEach(collapsibleTitle => {
			collapsibleTitle.addEventListener('click', function () {
				this.classList.toggle('active');
				this.setAttribute('aria-expanded', this.classList.contains('active'));

				const collapsibleContent = this.nextElementSibling;
				if (collapsibleContent) {
					collapsibleContent.classList.toggle('hide');
				}
			});
		});
	};

	knote.footer = function () {

		const scrollElement = document.querySelector('[data-scrollup]');
		const containerElement = document.querySelector('[data-container-main]');
		const footerElement = document.querySelector('[data-footer-type="fixed"]');

		if (scrollElement) {

			document.addEventListener('scroll', () => {
				var scrollValue = window.scrollY;
				if (scrollValue > 500) {
					scrollElement.classList.add('active');
				} else {
					scrollElement.classList.remove('active');
				}

			});

			scrollElement.addEventListener('click', () => {
				document.documentElement.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			});

		}

		if (footerElement) {
			containerElement.style.marginBottom = footerElement.offsetHeight + 'px';
		}
	}

	/*==================================================
	Drawer modules
	===================================================*/
	knote.Drawer = (function () {
		function Drawer(id, position, options) {
			const defaults = {
				close: '.js-drawer-close',
				open: `.js-drawer-open-${position}`,
				openClass: 'js-drawer-open',
				dirOpenClass: `js-drawer-open-${position}`
			};

			this.$nodes = {
				page: document.querySelector('#page'),
				parent: document.querySelector('body, html')
			};

			this.$drawer = document.getElementById(`${id}`);

			if (!this.$drawer) {
				return false;
			}

			this.drawerIsOpen = false;

			this.$config = Object.assign(defaults, options);
			this.$focusOnOpen = this.$config.focusIdOnOpen ? document.getElementById(this.$config.focusIdOnOpen) : this.$drawer;

			this.init();
		}

		Drawer.prototype = Object.assign({}, Drawer.prototype, {
			init() {

				document.querySelectorAll(this.$config.open).forEach(openButton => {
					openButton.addEventListener('click', this.open.bind(this));
				});

				this.$drawer.querySelectorAll(this.$config.close).forEach(closeButton => {
					closeButton.addEventListener('click', this.close.bind(this));
				});
			},

			open(evt) {
				const externalCall = !evt;

				if (evt) {
					evt.preventDefault();
				}

				if (evt && evt.stopPropagation) {
					evt.stopPropagation();
					this.$activeSource = evt.currentTarget;
				}

				if (this.drawerIsOpen && !externalCall) {
					return this.close();
				}


				this.$nodes.parent.classList.add(this.$config.openClass, this.$config.dirOpenClass);
				this.drawerIsOpen = true;

				knote.a11y.trapFocus({
					container: this.$drawer,
					elementToFocus: this.$focusOnOpen,
					namespace: 'drawer_focus'
				});

				if (this.$activeSource && this.$activeSource.getAttribute('aria-expanded')) {
					this.$activeSource.setAttribute('aria-expanded', 'true');
				}

				this.unbindEvents();
			},

			close() {
				if (!this.drawerIsOpen) {
					return;
				}

				if (document.activeElement) {
					document.activeElement.blur();
				}

				this.$nodes.parent.classList.remove(this.$config.dirOpenClass, this.$config.openClass);

				this.drawerIsOpen = false;

				knote.a11y.removeTrapFocus(this.$drawer, 'drawer_focus')
				this.unbindEvents();
			},

		});

		Drawer.prototype.bindEvents = function () {
			window.addEventListener('keyup', (evt) => {
				if (evt.key === 'Escape') {
					this.close();
				}
			});

			// Clicking outside of the modal content also closes it
			this.$drawer.addEventListener('click', this.close.bind(this));
		};

		Drawer.prototype.unbindEvents = function () {
			window.removeEventListener('keyup', this.handleKeyUp);

			this.$drawer.removeEventListener('click', this.close.bind(this));
		};

		return Drawer;

	})();

	knote.isInVerticalViewport = function (el) {
		var rect = el.getBoundingClientRect();
		return rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight);
	}

	knote.isInHorizontalViewport = function (el) {
		var rect = el.getBoundingClientRect();
		return rect.left >= 0 && rect.right <= document.documentElement.clientWidth;
	};

	/*============================================================================
	Things that require DOM to be ready
	==============================================================================*/
	function DOMready(callback) {
		if (document.readyState != 'loading') callback();
		else document.addEventListener('DOMContentLoaded', callback);
	}

	knote.initGlobals = function () {
		const modules = [
			'selectors',
			'header',
			'searchToggle',
			'subMenuToggle',
			'drawersInit',
			'quantityInit',
			'collapsible',
			'footer'
		];

		modules.forEach(module => {
			if (typeof knote[module] === 'function') {
				knote[module]();
			}
		});

		// Smooth scroll for anchor links
		const anchors = document.querySelectorAll('a[href^="#"]:not([href="#"])');
		anchors.forEach((anchor) => {
			anchor?.addEventListener('click', function (e) {
				e.preventDefault();
				let target = this.getAttribute('href');
				document.querySelector(target)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
			});
		})
	};

	DOMready(function () {

		knote.initGlobals();

	});

})();
