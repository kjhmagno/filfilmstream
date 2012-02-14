;(function($) {
	$.ffs_base = {
		layout : null,
		layoutOpts : {
			defaults : {
				resizable : false
			},
			west : {
				size : 300
			},
			east : {
				size : 300
			}
		},

		setupLayout : function() {
			$.ffs_base.layout = $("body").layout($.ffs_base.layoutOpts);

			if ($("#catalog").length)
				$("#catalog").accordion({ fillSpace : true });

			$.ffs_base.accessMenu();
		},

		styleFormElements : function(formNode) {
			formNode.find('input[type="text"], textarea, select').each(function(index) {
				$(this).addClass("ui-state-default");
			});
		},

		accessMenu : function() {
			if ($("#login").length) {
				$("#login").button({
					icons : { primary : "ui-icon-locked" }
				});

				if ($("#loginModal").length) {
					loginModal = $("#loginModal");
					loginLoading = $("#loginLoading");

					if (loginLoading.is(":visible"))
						loginLoading.hide();

					$("#login").click($.ffs_base.showLogin);
				}
			}

			if ($("#register").length) {
				$("#register").button({
					icons : { primary : "ui-icon-person" }
				});

				if ($("#registerModal").length) {
					registerModal = $("#registerModal");
					registerLoading = $("#registerLoading");

					if (registerLoading.is(":visible"))
						registerLoading.hide();

					$("#register").click($.ffs_base.showRegister);
				}
			}
		},

		showLogin : function() {
			loginDialog = $('<div/>', { id : "loginDialog" }).html(login);

			loginDialog.dialog({
				modal : true,
				resizable : false,
				title : "Account Login",
				width : 320
			});

			$.ffs_base.setupLoginForm();
		},

		setupLoginForm : function() {
			if ($("#loginForm").length) {
				loginForm = $("#loginForm");

				if ($("#loginSubmit").length)
					$("#loginSubmit").button();

				loginForm.submit($.ffs_base.submitLoginForm);
				$.ffs_base.styleFormElements(loginForm);
			}
		},

		submitLoginForm : function(event) {
			if ($("#loginError").length) {
				$("#loginError").hide();

				loginDialog.dialog("widget").animate({
					width : "320",
				}, 500);
			}

			if (!loginLoading.is(":visible"))
				loginLoading.fadeIn("fast");

			$.post(
				this.action, $(this).serialize(), function(data) {
					if (loginLoading.is(":visible"))
						loginLoading.fadeOut("fast");

					if (data.result) {
						console.log(data);
					} else {
						loginDialog.dialog("widget").animate({
							width : "580",
						}, 500, function() {
							$("<div/>", {
								id : "loginError", class : "ui-state-error ui-corner-all"
							}).css({
								"padding" : "0 1em", "float" : "right"
							}).html(data.message).fadeIn("slow").insertAfter(loginModal);
						});
					}
				}, "json");

			event.preventDefault();
		},

		showRegister : function() {
			registerDialog = $('<div/>', { id : "registerDialog" }).html(register);

			registerDialog.dialog({
				modal : true,
				resizable : false,
				title : "Account Registration",
				width : 320
			});

			$.ffs_base.setupRegisterForm();
		},

		setupRegisterForm: function() {
			if ($("#registerForm").length) {
				var registerForm = $("#registerForm");

				if ($("#address").length) {
					var address = $("#address");

					address.autoResize({
						onResize : function() {
							$(this).css({ "opacity" : 0.8 });
						},
	    				animateCallback : function() {
	        				$(this).css({ "opacity" : 1 });
						},
						animateDuration : 300,
						extraSpace : 0
					});
				}

				if ($("#birthdate").length)
					$("#birthdate").datepicker();

				if ($("#registerSubmit").length)
					$("#registerSubmit").button();

				registerForm.submit($.ffs_base.submitRegisterForm);
				$.ffs_base.styleFormElements(registerForm);
			}
		},

		submitRegisterForm : function(event) {
			if ($("#registerError").length) {
				$("#registerError").hide();

				registerDialog.dialog("widget").animate({
					width : "320",
				}, 500);
			}

			if (!registerLoading.is(":visible"))
				registerLoading.fadeIn("fast");

			$.post(
				this.action, $(this).serialize(), function(data) {
					if (registerLoading.is(":visible"))
						registerLoading.fadeOut("fast");

					if (data.result) {
						console.log(data);
					} else {
						registerDialog.dialog("widget").animate({
							width : "610",
						}, 500, function() {
							$("<div/>", {
								id : "registerError", class : "ui-state-error ui-corner-all"
							}).css({
								"padding" : "0 1em", "float" : "right"
							}).html(data.message).fadeIn("slow").insertAfter(registerModal);
						});
					}
				}, "json");

			event.preventDefault();
		},

		endLoading: function() {
			setTimeout(function() {
				$("#loadingOverlay").fadeOut("slow");
			}, 0);
		},

		startLoading: function() {
			var overlayNode = $("#loadingOverlay");

			if ("none" == overlayNode.css("display")) {
				overlayNode.css({
					"display" : "block",
					"opacity" : 1,
					"filter" : Alpha(Opacity=10)
				});
			}
		}
	}
})(jQuery);