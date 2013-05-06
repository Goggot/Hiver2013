<table border="0" width="100%">
    <tr style="background-color: gray;">
        <th>Error level</th>
        <th>The line number where the error was raised</th>
        <th>Error message</th>
    </tr>
    
    <tr>
        <td><?php echo $pErr['ErrNo']; ?></td>
        <td><?php echo $pErr['ErrLine']; ?></td>
        <td><?php echo $pErr['ErrStr']; ?></td>
    </tr>
    
    <tr style="background-color: gray;">
        <th colspan="3">Filename</th>
    </tr>
    
    <tr>
        <td><?php echo $pErr['ErrFile']; ?></td>
    </tr>
    
    <tr style="background-color: gray;">
        <th colspan="3">
            <a href="#">Clic here to see the context of this error</a>
        </th>
    </tr>
    
    <?php echo $context_table; ?>
</table>
        
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".slideToggle").hide();
        
        $("a").click(function(e) {
            $(".slideToggle").slideToggle("fast");
        });
    });
</script>
