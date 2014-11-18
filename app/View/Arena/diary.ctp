<html>
    
    
        <p>Last actions done :<br/>
            <ul>
                <?php 
                    foreach($arr as $date => $value) {
                        echo "<li>$date : $value </li>";
                    }
                    
                    pr($raw);
                ?>
        </ul>
        </p>
    
</html>