
<h1>Login Page</h1>
<div> class ="container"</div>


<h5> Enter the Required Credentials for login </h5>

<form action ="{{url('/submit')}}" method = "post" >
    @csrf
<input type='text' name ="login_name" placeholder="Enter your login id"/>
<br> <br>

<input type='text' name ="password" placeholder="Enter your password"/>

<input type="file" name="image">
<br> <br>


<button type="submit" > Submit </button>
</form>

</body>
</html>
