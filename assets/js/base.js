;(function($) {
	$.ffs_base = {
		layout : null,
		layoutOpts : {
			defaults : {
				resizable : false
			},
			west : {
				size : "20%"
			},
			east : {
				size : "20%"
			}
		},

		setupLayout : function() {
			$.ffs_base.layout = $("body").layout($.ffs_base.layoutOpts);

			if ($("#catalog").length)
				$("#catalog").accordion({ fillSpace : true });

			$.ffs_base.accessMenu();
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
			if ($("#loginDialog").length)
				$("#loginDialog").remove();

			loginDialog = $('<div/>', { id : "loginDialog" }).html(login);

			$("#loginDialog:ui-dialog").dialog("destroy");

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
			}
		},

		submitLoginForm : function(event) {
			if ($("#loginError").length) {
				$("#loginError").remove();

				loginDialog.dialog("widget").animate({ width : "320" }, {
					duration : 500,
					step : function() {
						loginDialog.dialog('option', 'position', 'center');
					}
				});
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
						loginDialog.dialog("widget").animate({ width : "580" }, {
							duration : 500,
							step : function() {
								loginDialog.dialog('option', 'position', 'center');
							},
							complete : function() {
								$("<div/>", {
									id : "loginError", class : "ui-state-error ui-corner-all"
								}).css({
									"padding" : "0 1em", "float" : "right"
								}).html(data.message).fadeIn("slow").insertAfter(loginModal);
							}
						});
					}
				}, "json");

			event.preventDefault();
		},

		showRegister : function() {
			if ($("#registerDialog").length)
				$("#registerDialog").remove();

			registerDialog = $('<div/>', { id : "registerDialog" }).html(register);

			$("#registerDialog:ui-dialog").dialog("destroy");

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

				if ($("#birth_date").length) {
					$("#birth_date").datepicker({
						dateFormat : 'yy-mm-dd'
					});
				}

				if ($("#registerSubmit").length)
					$("#registerSubmit").button();

				registerForm.submit($.ffs_base.submitRegisterForm);
			}
		},

		submitRegisterForm : function(event) {
			if ($("#registerError").length) {
				$("#registerError").remove();

				registerDialog.dialog("widget").animate({ width : "320", }, {
					duration : 500,
					step : function() {
						registerDialog.dialog('option', 'position', 'center');
					}
				});
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
						registerDialog.dialog("widget").animate({ width : "650" }, {
							duration : 500,
							step : function() {
								registerDialog.dialog('option', 'position', 'center');
							},
							complete : function() {
								$("<div/>", {
									id : "registerError", class : "ui-state-error ui-corner-all"
								}).css({
									"padding" : "0 1em", "float" : "right"
								}).html(data.message).fadeIn("slow").insertAfter(registerModal);
							}
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