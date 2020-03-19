<!-- <div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</div> -->

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <?= $this->Flash->render() ?>
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login</h3>
                        <?= $this->Form->create() ?>
                        <fieldset class="p-4">
                            <legend><?= __('Please enter your emailID and password') ?></legend>
                            <?= $this->Form->control('email', ['required' => true, 'class'=>"border p-3 w-100 my-2"]) ?>
                            <?= $this->Form->control('password', ['required' => true,'class'=>"border p-3 w-100 my-2"]) ?>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <?= $this->Form->submit('Login',[ 'class'=>'d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3']); ?>
                            <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
                            <a class="mt-3 d-inline-block text-primary" href="register.html">Register Now</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>