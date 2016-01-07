<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>     
        <table border="1">
            <?php
            /*
             * Create table with 10 rows
             */ 
            for($tr = 1; $tr <= 10; $tr++):
            ?>
            <tr>
                <?php 
                /*
                 * Create 10 columns for each row
                 */
                for($td = 1; $td <= 10; $td++):
                ?>
                <?php
                /*
                 * Generate random color
                 */
                    $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
                ?>
                <?php if ( isset($randColor) ) : ?>
                <td style="background-color:<?php echo $randColor ?>"><?php echo $randColor ?><br/>
                    <span style="color: #ffffff"><?php echo $randColor ?></span>
                </td>
                <?php endif; ?>
                <?php endfor; ?>                
            </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>
