{{ form_open("process/login", loginForm) }}
<table>
	<tr>
		<td>{{ form_label("Username/Email", loginUsername.name) }}</td>
		<td>{{ form_input(loginUsername) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Password", loginPassword.name) }}</td>
		<td>{{ form_input(loginPassword) }}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>{{ form_checkbox(remember) }} Remember me</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>{{ form_submit(loginSubmit) }}
			<div id="loginLoading">
				<div class="loadingMessage">Loading...</div>
			</div>
		</td>	
	</tr>
</table>
{{ form_close() }}

{{ form_open("process/register", registerForm) }}
<table>
	<tr>
		<td>{{ form_label("Username", registerUsername.name) }}</td>
		<td>{{ form_input(registerUsername) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Password", registerPassword.name) }}</td>
		<td>{{ form_input(registerPassword) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Confirm Password", registerConfirmPassword.name) }}</td>
		<td>{{ form_input(registerConfirmPassword) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Email", email.name) }}</td>
		<td>{{ form_input(email) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Last name", lastName.name) }}</td>
		<td>{{ form_input(lastName) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("First name", firstName.name) }}</td>
		<td>{{ form_input(firstName) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Middle name", middleName.name) }}</td>
		<td>{{ form_input(middleName) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Birth date", birthdate.name) }}</td>
		<td>{{ form_input(birthdate) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Address", address.name) }}</td>
		<td>{{ form_textarea(address) }}</td>
	</tr>
	<tr>
		<td>{{ form_label("Gender", gender.name) }}</td>
		<td>{{ form_dropdown(gender.name, genderOptions) }}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>{{ form_submit(registerSubmit) }}
			<div id="registerLoading">
				<div class="loadingMessage">Loading...</div>
			</div>
		</td>
	</tr>
</table>
{{ form_close() }}