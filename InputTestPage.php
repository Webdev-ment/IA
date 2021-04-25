<HTML>
<head>
<Title>Input Test Page</Title>
</head>
<body>
    <div class="col-md-4">
        <form action="PatientController.php" method="POST">
        First Name: <input type="text" name="fname" placeholder="Enter Name..."></input>
        Last Name: <input type="text" name="lname" placeholder="Enter Name..."></input>
        Gender: <input type="text" name="gender" placeholder="Enter Gender..."></input>
        Date of Birth: <input type="date" name="dob"><!-- Format: YYYY-MM-DD --></input>
        Age: <input type="text" name="age" placeholder="Enter Age..."></input>
        Address: <input type="text" name="address" placeholder="Enter Address..."></input>
        Email: <input type="text" name="email" placeholder="Enter Email..."></input>
        Phone Number: <input type="text" name="phone" placeholder="Enter Phone Number..."></input>

        
        <input type="submit" name="insert" value="Insert"></input>
        <input type="submit" name="view" value="View"></input>
        </form>
    </div>
</body>
</HTML>