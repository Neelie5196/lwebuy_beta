<div class="col-xs-12 col-md-12 col-lg-12">
    <h2 class="bigh2 pagetitle hidden-xs hidden-sm">My Profile</h2>
    
    <h2 class="smh2 pagetitle hidden-md hidden-lg">My Profile</h2>
    
    <div class="row profilecontainer hidden-xs hidden-sm">
        <form class="form-inline left" action="user.php" method="post">
            <p>
                <label for="fname">First name</label><br/>
                <input type="text" class="formfield" id="fname" name="fname" required/>
            </p>

            <p>
                <label for="lname">Last name</label><br/>
                <input type="text" class="formfield" id="lname" name="lname" required/>
            </p>

            <p>
                <label for="contact">Contact number </label><br/>
                <input type="text" class="formfield" id="contact" name="contact" required/>
            </p>

            <p>
                <label for="email">Email </label><br/>
                <input type="email" class="formfield" id="email" name="email" required/>
            </p>

            <p><button class="btn btn-link btntab" onclick="funcShowChgPassword()" id="btnShowChg">Click here to change password</button></p>
            
            <div id="chgPass">
                <p>
                    <label for="password">Current Password </label><br/>
                    <input type="password" class="formfield" id="curpassword" name="curpassword"/>
                </p>

                <p>
                    <label for="password">New Password </label><br/>
                    <input type="password" class="formfield" id="newpassword" name="newpassword" onkeyup="checkPass()" />
                </p>

                <p>
                    <label for="repassword">Retype New Password </label><br/>
                    <input type="password" class="formfield" id="renewpassword" name="renewpassword" onkeyup="checkPass()" /><br/>
                    <span id="passno">Password does not match</span>
                </p>
                
                <p><button class="btn btn-link btntab" onclick="funcHideChgPassword()">Click here hide password section</button></p>
            </div>
            
            <p><button type="submit" class="btn btn-default btnAdd" name="saveprofile">Save</button></p>
        </form>
    </div>
    
    <div class="row profilecontainers hidden-md hidden-lg">
        <form class="form-inline left" action="user.php" method="post">
            <p>
                <label for="fname">First name</label><br/>
                <input type="text" class="formfield" id="fname" name="fname" required/>
            </p>

            <p>
                <label for="lname">Last name</label><br/>
                <input type="text" class="formfield" id="lname" name="lname" required/>
            </p>

            <p>
                <label for="contact">Contact number </label><br/>
                <input type="text" class="formfield" id="contact" name="contact" required/>
            </p>

            <p>
                <label for="email">Email </label><br/>
                <input type="email" class="formfield" id="email" name="email" required/>
            </p>
            
            <p><button class="btn btn-link btntab" onclick="funcShowChgPasswords()" id="btnShowChgs">Click here to change password</button></p>
            
            <div id="chgPasss">
                <p>
                    <label for="password">Current Password </label><br/>
                    <input type="password" class="formfield" id="curpasswords" name="curpassword"/>
                </p>

                <p>
                    <label for="password">New Password </label><br/>
                    <input type="password" class="formfield" id="newpasswords" name="newpassword" onkeyup="checkPasss()" />
                </p>

                <p>
                    <label for="repassword">Retype New Password </label><br/>
                    <input type="password" class="formfield" id="renewpasswords" name="renewpassword" onkeyup="checkPasss()" /><br/>
                    <span id="passnos">Password does not match</span>
                </p>
                
                <p><button class="btn btn-link btntab" onclick="funcHideChgPasswords()">Click here hide password section</button></p>
            </div>

            <p><button type="submit" class="btn btn-default btnAdd" name="saveprofile">Save</button></p>
        </form>
    </div>
</div>