<html>
    <div class="">
        <div class="">
            <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <ul class="title-area">
                    <li class="name">
                        <h1>WEB ARENA</h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a> <!-- Non responsive :(   WHYYYYY ? -->
                    </li>
                </ul>

                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">

                    </ul>

                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li>
                            <?php
                            echo $this->Html->link('Home', array(
                                'controller' => 'Arena',
                                'action' => 'index'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Login', array(
                                'controller' => 'Arena',
                                'action' => 'login'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Sight ', array(
                                'controller' => 'Arena',
                                'action' => 'sight'));
                            ?>
                        </li>
                        <li class='active'>
                            <?php
                            echo $this->Html->link('Character', array(
                                'controller' => 'Arena',
                                'action' => 'character'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Diary', array(
                                'controller' => 'Arena',
                                'action' => 'diary'));
                            ?>
                        </li>
                    </ul>
                </section>
            </nav>
        </div>
    </div>
</html>