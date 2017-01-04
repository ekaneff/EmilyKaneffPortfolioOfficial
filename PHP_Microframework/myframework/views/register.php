<div class="container">
<h2>Register</h2>
<form action="/register/registerUser" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email" name="username" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  <button type="submit" class="btn btn-info">Register</button>
</form>

</div>