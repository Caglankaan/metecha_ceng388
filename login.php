<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2> login here </h2>
                <form action="validation.php" method="post">
                    <div class= "form-group">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class= "form-group">
                        <label> Password </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary"> Login </button>
                </form>
            </div>
            <div class="col-md-6">
                <h2> Register here </h2>
                    <form action="registration.php" method="post">
                        <div class= "form-group">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class= "form-group">
                            <label> Surname </label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>
                        <div class= "form-group">
                            <label> Username </label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class= "form-group">
                            <label> Password </label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
        
                        <button type="submit" class="btn btn-primary"> Register </button>
                    </form>
            </div>
        </div>

    </div>
</body>
        