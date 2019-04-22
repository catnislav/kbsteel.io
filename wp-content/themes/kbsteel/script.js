(function($){

	/* jQuery plugins / jQuery плагины */

		/* Plugin cycle */
			if ( $('body').hasClass('home')) {
				var sliderSettings = { 
					fx:      'fade', 
					speed:    1200, 
					timeout:  2400,
					pager:  '#slider-nav'
				}
				$('#slider').before('<div class="slider-nav" id="slider-nav">').cycle(sliderSettings);
			}

		/* Plugin magnific-popup */
			var popupSettings = {
				type:'inline',
				mainClass: 'mfp-fade',
				removalDelay: 300,
				midClick: true,
				closeMarkup: '<a href="#" class="mfp-close">&#10006;</a>',
				fixedContentPos: false,
				tLoading: '...',
				tError: ':(',
				closeBtnInside: true,
				autoFocusLast: false,
				focus: '.name',
				// callbacks: {
				// 	elementParse: function(item) {
				// 		window.location.hash = item.src;
				// 	},
				// }
			}
			$('#button-popup').magnificPopup(popupSettings);

		/* Plugin masked input */
			$('.phonemask').mask('+38 (000) 000-00-00', {
				clearIfNotMatch: true,
				// placeholder: "+38 (___) ___-__-__",
				selectOnFocus: true,
				// onInvalid: function() {
				// 	$(this).val('+38 ');
				// }
				// onChange: function() {
				// 	console.log($('.phonemask').val().length);
				// }
			});
			$('.phonemask').on('focus blur', function(e) {
				if (e.type === 'focus') {
					if($(this).val() === '') {
						$(this).val('+38 ');
					}
				}
			});


	/* Handwritten code / Написанный код */

		/* Fade out page transition / Переход затуханием страницы */

			// window.onbeforeunload = function (event) {
			// 	document.body.style.opacity = 0;
			// 	// console.log(event.target.URL);
			// 	// return false;
			// }

			// $(window).on('beforeunload', function(e) {
			// 	$('body').css('opacity', 0);
			// });

		/* Prevent default empty link behavior / Отменить действие пустых ссылок */
			$(document).on('click', '[href="#"]', function(e) {
				e.preventDefault();
			});
			// .current-page-ancestor
			$(document).on('click', '.current_page_item > a', function(e) {
				e.preventDefault();
			});

		/* Clone menu for smaller screens / Клонирование центрального меню */
			$('#menu-center li')
				.clone()
				.removeClass('justify-content-center')
				.addClass('justify-content-end')
				.removeAttr('id')
				.prependTo('#menu-side')
				// .wrap('<h3></h3>')
				.wrapAll('<ul class="menu-center d-flex flex-column d-lg-none"></ul>');

		/* Open drop-down menu / Открытие выпадающего меню */
			var buttonMenu = $('#button-menu'),
					active;
				$('#button-menu').on('click', function(e){
					e.preventDefault();
					if (!active) {
						active = true;
						$('#menu-side').slideToggle(300, function(){
							if (!buttonMenu.hasClass('active')) {
								buttonMenu.addClass('active');
							} else {
								buttonMenu.removeClass('active');
							}
							active = false;
						});
					} 		
				});

		/* Ajax-email / Ajax eмейл без перезагрузки страницы */
			var sending;
			$('form').submit(function(e){
				// $('#message').addClass('success d-flex');
				e.preventDefault();

				var form = $(this),
						inputs = $('input', form),
						mfp = $.magnificPopup.instance,
						// pattern = /\S+@\S+/, // like the HTML5 email "required"
						pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
						i;

				for (i = 0; i < inputs.length-1; i++) {
					if (inputs[i].value.length === 0) {
						inputs[i].focus();
						return false;
					} else if (inputs[i].classList[0] === 'phonemask') {
						if (inputs[i].value.length < 19) {
							inputs[i].focus();
							return false;
						}
					} else if (inputs[i].classList[0] === 'email') {
						if (inputs[i].value.match(pattern) == null) {
							inputs[i].focus();
							return false;
						}
					}
				}

				if (!sending) {
					sending = true;

					$('form').append($('<div>',{class: "spinner", style: "display: block;"}));

					$.ajax({
						method: form.attr('method'),
						// url: form.attr('action'),
						url: ajax_mail.url,
						data: form.serialize(),
					}).done(function(data, textStatus, jqXHR) {
						$('.submit').blur();
						$('.spinner').fadeOut(300, function(){
							$(this).remove();
						});
						console.log(jqXHR);
						$('.message').html('<h3>' + data + '</h3>');
						$('.message').addClass('success d-flex');
						// $('#message').addClass('success').fadeIn(300);
						setTimeout(function() {
							if (mfp.isOpen) {
								$.magnificPopup.close();
							}
							setTimeout(function() {
								$('.message').hide().removeClass('success d-flex');
								form.trigger('reset');
							}, 300);
						}, 3000);
						return false;
					}).fail(function() {
						$('.spinner').fadeOut(300, function(){
							$(this).remove();
						});
					}).always(function() {
						sending = false;
					});

				}
			});

		/* Single product page / Страница продукта внутри */
			if ( $('main').hasClass('page-product-single')) {

			/* Preload images / Предзагрузка изображений */
				$.preloadImages = function() {
					for (var i = 0; i < arguments.length; i++) {
						$("<img />").attr("src", arguments[i]);
					}
				}
				var images = $('.texture img');
				for (var i = 0; i < images.length; i++) {
					$.preloadImages(images[i].dataset.src);
				}

			/* Hover or click event for texture / Наведение или нажатие для текстур */

				var isTouchDevice = 'ontouchstart' in document.documentElement,
						eventTypeIn, eventTypeOut,
						removePopup = function() {
							$('.popup-texture').fadeOut(300, function() {
								$(this).remove();
							});
						};

				if (isTouchDevice) {
					eventTypeIn = 'click';
					eventTypeOut = 'scroll';
					$(document).on(eventTypeOut, function() {
						removePopup();
					});
				} else {
					eventTypeIn = 'mouseenter'
					eventTypeOut = 'mouseleave'
					$('.texture').on(eventTypeOut, 'div', function(e) {
						if(!$(e.toElement).hasClass('popup-texture')) {
							removePopup();
						}
					});
					$(document).on(eventTypeOut, '.popup-texture', function() {
						removePopup();
					});
				}

				$('.texture').on(eventTypeIn, 'div', function(event) {
					if (event.type === eventTypeIn) {
					var th = $('img', this),
							src = th.data('src'),
							alt = th.attr('alt'),
							img = $('<img />').attr({
			          'src': src,
			          'alt': alt + "+",
			          'class': 'popup-texture'
			        });

						if ($('.popup-texture').length === 0) {
							img.appendTo('body').fadeIn(300);
						} else {
							removePopup();
							img.appendTo('body').fadeIn(300);
						}
					}
				});

			}

})(jQuery);
