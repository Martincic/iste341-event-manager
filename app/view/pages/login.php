<!--
        //3 user types:
            1. ATTENDEE - allEvents & registrations page

            2. EVENT MANAGER - admin page for event manager

            3. ADMIN (extra: one master admin) - admin page to crud all
        //

        - USERS MUST LOG IN

        - passwords need to be HASHED using sha256

        - populate tables with data (nema register page??)
-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>LOG IN</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action='index.php?page=home' method='post' class="login-form">
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
