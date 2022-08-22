<div class="tasks-title mt-3">
    <h2>Add new task</h2>
</div>

<form class="new-task-form">
    <div class="form-group">
        <label for="usernameInput">Username</label>
        <input type="text" class="form-control new-task-form__form-element" name="username"
               id="usernameInput" aria-describedby="emailHelp" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="emailInput">Email address</label>
        <input type="email" class="form-control new-task-form__form-element" name="email"
               id="emailInput" aria-describedby="emailHelp" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="textInput">Text</label>
        <textarea class="form-control new-task-form__form-element" name="text"
                   id="textInput" placeholder="Add text" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>