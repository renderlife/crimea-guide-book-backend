@if(session()->has('success'))
    <script type="text/javascript">
        $(function(){
            alertify.alert(" {!! session()->get('success') !!} ");
            alertify.success(" {!! session()->get('success') !!} ");
        });
    </script>
@elseif(session()->has('error'))
    <script type="text/javascript">
        $(function(){
            alertify.alert(" {!! session()->get('error') !!} ");
            alertify.error(" {!! session()->get('error') !!} ");
        });
    </script>
@elseif(session()->has('errors'))
    <?php
        $errors = session()->get('errors');
        $messages = '';
        var_dump($errors);
        foreach ($errors->all("<span>:message</span></br>") as $error) {
            $messages .= $error;
        }
    ?>
    <script type="text/javascript">
        $(function(){
            alertify.alert(" {!! $messages !!} ");
            alertify.error(" {!! $messages !!} ");
        });
    </script>
@endif
