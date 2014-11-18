<div class="contain-to-grid">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1>WebArena</h1>
      </li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
       
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li class='active'>
          <?php
            echo $this->Html->link('Sight ', array(
              'controller' => 'Arena',
              'action'=>'sight'));
          ?>
        </li>
        <li>
          <?php
            echo $this->Html->link('Character', array(
              'controller' => 'Arena',
              'action'=>'character'));
          ?>
        </li>
        <li>
          <?php
            echo $this->Html->link('Diary', array(
              'controller' => 'Arena',
              'action'=>'diary'));
          ?>
        </li>
      </ul>
    </section>
  </nav>
</div>