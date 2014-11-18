<html>

    <nav class="top-bar">
        <ul class="title-area">
            <li class="name">
                 <h1><a href="#">WEB ARENA</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
            </li>
        </ul>

        <section class="top-bar-section">
            <ul class="right">
                <li class="active">
                    <?php
                        echo $this->Html->link(
                            'Login',
                            'login',
                            array()
                        );
                    ?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php
                        echo $this->Html->link(
                            'Home',
                            'index',
                            array()
                        );
                    ?>

                <!-- The section home will containes the following informations :

                - The slider containing all the characters of the current player
                - The journal informations
                - The Hall of Fame
                - The functionnality allowing the user to create a new character and to add an avatar to it

                -->

                </li>
                <li class="divider"></li>
                <li>
                    <?php
                        echo $this->Html->link(
                            'Sight',
                            'sight',
                            array()
                        );
                    ?>
                </li>
                <li class="divider"></li> <!-- The sight page is the global game panel -->
                <li>
                     <?php
                        echo $this->Html->link(
                            'Diary',
                            'diary',
                            array()
                        );
                    ?>
                </li>
                <!-- this page will allow the user to customize each characters (inventory ...) -->
                <li class="divider"></li>
                <li>
                 <?php
                    echo $this->Html->link(
                        'My characters',
                        'character',
                        array()
                    );
                ?>
                </li>
            </ul>
        </section>
    </nav>

    <!--

                echo $this->Html->link(
                    'Create character',
                    'createfighter',
                    array()
                ) . " "; 
    -->
                    
    
</html>