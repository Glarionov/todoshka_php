{include "../patrials/page_top.tpl"}

<div class="container mt-5">
    <form class="login-page" action="/login" method="post">
        <div class="form-group">
            <label for="loginInput">Login</label>
            <input type="text" class="form-control login-page__form-element" name="login"
                   id="loginInput" aria-describedby="emailHelp" placeholder="Enter login" required>
        </div>
        <div class="form-group">
            <label for="passwordInput">Password</label>
            <input type="password" class="form-control login-page_form-element" name="password"
                   id="passwordInput" aria-describedby="emailHelp" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        {if !empty($errorMessage)}
            <div class="text-danger mt-2 temp-message">
                {$errorMessage}
            </div>
        {/if}
    </form>

</div>


{include "../patrials/page_bottom.tpl"}