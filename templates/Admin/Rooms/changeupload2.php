<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 


            <script type="text/javascript">
                $(document).ready(
        function(){
            $('button:submit').attr('disabled',true);
            $('input:file').change(
                function(){
                    if ($(this).val()){
                        $('button:submit').removeAttr('disabled'); 
                    }
                    else {
                        $('input:submit').attr('disabled',true);
                    }
                });
        });
            </script>
    </head>

<?= $this->Form->create($rooms,['type'=>'file','enctype'=>'multipart/form-data']) ?>
        Images Upload (secondary) : <center>
        <?=  $this->Form->input('images', array('name'=>'images[]','type' => 'file','multiple')); ?>
    	<?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']   ) ?>
            <?= $this->Form->end() ?>
        </center>
</html>