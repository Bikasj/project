
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Contact Us</h3>
			</div>
		</div>
	</div>

</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Contact Us</h5>
                    <h1 class="pt-3">Hello, what's on your mind?</h1>
                    <p class="pt-3 pb-5">Tell us what you feel about our customers and our website.</p>
                </div>
            </div>
            <div class="col-md-6">
                    <?= $this->Form->create($contact) ?>     
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" placeholder="Name *" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" name="email" placeholder="Email *" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-2">
                                       <input type="text"  name="phone" placeholder="Phone *" class="form-control" required> 
                                    </div>
                                    <textarea name="address" id="" style="width: 250px;
  											height: 130px;"  placeholder="Address *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            		<textarea name="message" id=""  placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <?= $this->Form->button('Submit' ,['class'=>'btn btn-primary mt-2 float-right'])?>
                               <?= $this->Form->end() ?>
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>