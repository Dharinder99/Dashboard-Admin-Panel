          <h1 class ="text center">User Registration Page</h1>
             
          <h1> Enter your details for Registration</h1>



<form action ="{{url('/submit')}}" method = "post" >
  @csrf
<input type='text' name ="first_name" placeholder="Enter your login name"/>
<br> <br> <br>
<input type='text' name ="email_id" placeholder="Enter your Email id"/>
<br> <br> <br>
<input type='password' name ="password" placeholder="Enter your password"/>
<br> <br> <br>


<button type="Register" > Register </button>
</form>

</body>
</html>
